<?php
namespace parallelize_namespace;

class Kernel
{

    private $name;
    private $user_email;
    private $id;
    private $js_code;
    private $description;
    private $total_reward;
    private $reward_per_line;
    private $iteration_count;
    private $segment_cache;
    private $upload_time;

    private function storeToDb()
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf(
            'UPDATE kernels SET name = \'%s\', user_email = \'%s\', js_code = \'%s\', description = \'%s\', total_reward = %s, reward_per_line = %s WHERE id = \'%s\'',
            $conn->real_escape_string($this->name),
            $conn->real_escape_string($this->user_email),
            $conn->real_escape_string($this->js_code),
            $conn->real_escape_string($this->description),
            $conn->real_escape_string($this->total_reward),
            $conn->real_escape_string($this->reward_per_line),
            $conn->real_escape_string($this->id)
        );

        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
    }

    public static function buscaKernelDeUsuario(Usuario $user)
    { // User $user
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM kernels K WHERE K.user_email = '%s'", $conn->real_escape_string($user->getEmail()));
        $rs = $conn->query($query);


        $raw_kernels = $rs->fetch_all(MYSQLI_ASSOC);
        $ret = [];
        foreach ($raw_kernels as $rk) {
            $ret[] = new Kernel(
                $rk['name'],
                $rk['user_email'],
                $rk['id'],
                $rk['js_code'],
                $rk['description'],
                $rk['total_reward'],
                $rk['reward_per_line'],
                $rk["iteration_count"],
                $rk['upload_time']
            );
        }
        return $ret;
    }

    public static function buscaKernelsMejorPagados(int $count)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM kernels K ORDER BY reward_per_line desc limit %d", $conn->real_escape_string($count));
        $rs = $conn->query($query);

        $raw_kernels = $rs->fetch_all(MYSQLI_ASSOC);
        $ret = [];
        foreach ($raw_kernels as $rk) {
            $ret[] = new Kernel(
                $rk['name'],
                $rk['user_email'],
                $rk['id'],
                $rk['js_code'],
                $rk['description'],
                $rk['total_reward'],
                $rk['reward_per_line'],
                $rk["iteration_count"],
                $rk['upload_time']
            );
        }
        return $ret;
    }

    public static function buscaKernelsMasNuevos(int $count)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM kernels K ORDER BY upload_time limit %d", $conn->real_escape_string($count));
        $rs = $conn->query($query);

        $raw_kernels = $rs->fetch_all(MYSQLI_ASSOC);
        $ret = [];
        foreach ($raw_kernels as $rk) {
            $ret[] = new Kernel(
                $rk['name'],
                $rk['user_email'],
                $rk['id'],
                $rk['js_code'],
                $rk['description'],
                $rk['total_reward'],
                $rk['reward_per_line'],
                $rk["iteration_count"],
                $rk['upload_time']
            );
        }
        return $ret;
    }

    public static function buscaKernelPorId(string $id)
    { // Id
        $conn = Aplicacion::getInstance()->getConexionBd();
        $ret = NUll;
        $query = sprintf("SELECT * FROM kernels K WHERE K.id = '%s'", $conn->real_escape_string($id));
        $rs = $conn->query($query);
        if (mysqli_num_rows($rs)) {
            $rk = $rs->fetch_assoc();
            $ret = new Kernel(
                $rk['name'],
                $rk['user_email'],
                $rk['id'],
                $rk['js_code'],
                $rk['description'],
                $rk['total_reward'],
                $rk['reward_per_line'],
                $rk["iteration_count"],
                $rk['upload_time']
            );
        }

        return $ret;
    }

    public static function enviaKernel($kernel_name, $kernel_js_code, $kernel_description, $kernel_price, $iteration_count)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $lines_arr = $lines_arr = preg_split('/\n|\r/', $kernel_js_code);
        $code_lines = count($lines_arr);

        $query = sprintf(
            'INSERT INTO kernels (name, user_email, js_code, total_reward, description, reward_per_line, iteration_count) 
            VALUES (\'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\')',
            $conn->real_escape_string($kernel_name),
            $conn->real_escape_string($_SESSION["user_email"]),
            $conn->real_escape_string($kernel_js_code),
            $conn->real_escape_string($kernel_price),
            $conn->real_escape_string($kernel_description),
            $conn->real_escape_string($kernel_price / $iteration_count / $code_lines),
            $conn->real_escape_string($iteration_count),

        );
        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        return true;
    }



    public function __construct($name, $user_email, $id, $js_code, $description, $total_reward, $getreward_per_line, $iteration_count, $upload_time)
    {
        $this->name = $name;
        $this->user_email = $user_email;
        $this->id = $id;
        $this->js_code = $js_code;
        $this->description = $description;
        $this->total_reward = $total_reward;
        $this->reward_per_line = $getreward_per_line;
        $this->iteration_count = $iteration_count;
        $this->upload_time = $upload_time;   
    }

    public function getname()
    {
        return $this->name;
    }
    public function is_finished()
    {
        for ($i = 0; $i < $this->iteration_count; $i++) {
            $res = $this->result_at($i);
            if ($res == "not_asigned") {
                return false;
            }
        }

        return true;
    }

    public function result_at($n)
    {
        $seg = null;

        if ($this->segment_cache && $this->segment_cache->contains($n)) {
            $seg = $this->segment_cache;
        } else {
            $seg = \parallelize_namespace\ExecutionSegment::buscaSegmentosConKernelIdQueContenganIt($this->id, $n);
            if (!isset($seg)) {
                return "not_asigned";
            }
            $this->segment_cache = $seg;
        }

        $sub_index = $n - $seg->getiteration_start();
        $res_list = explode(",", $seg->getresults());
        if (isset($res_list[$sub_index])) {
            return $res_list[$sub_index];
        }
        return "not_solved";

    }


    public function getuser_email()
    {
        return $this->user_email;
    }
    public function getCode()
    {
        return htmlspecialchars_decode($this->js_code);
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function gettotal_reward()
    {
        return $this->total_reward;
    }

    public function getreward_per_line()
    {
        return $this->reward_per_line;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getiteration_count()
    {
        return $this->iteration_count;
    }
    public function getupload_time()
    {
        return $this->upload_time;
    }

    public function setFinished()
    {
        $this->storeToDb();
    }


}