<?php
namespace parallelize_namespace;

class Kernel
{

    private $name;
    private $is_finished;
    private $user_email;
    private $results;
    private $id;
    private $js_code;
    private $description;
    private $total_reward;
    private $progress_map;
    private $reward_per_line;

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
                $rk['is_finished'],
                $rk['user_email'],
                $rk['results'],
                $rk['id'],
                $rk['js_code'],
                $rk['description'],
                $rk['total_reward'],
                $rk['progress_map'],
                $rk['reward_per_line']
            );
        }
        return $ret;
    }

    public static function buscaKernelsMejorPagados(int $count)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM kernels K ORDER BY reward_per_line limit %d", $conn->real_escape_string($count));
        $rs = $conn->query($query);

        $raw_kernels = $rs->fetch_all(MYSQLI_ASSOC);
        $ret = [];
        foreach ($raw_kernels as $rk) {
            $ret[] = new Kernel(
                $rk['name'],
                $rk['is_finished'],
                $rk['user_email'],
                $rk['results'],
                $rk['id'],
                $rk['js_code'],
                $rk['description'],
                $rk['total_reward'],
                $rk['progress_map'],
                $rk['reward_per_line']
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
                $rk['is_finished'],
                $rk['user_email'],
                $rk['results'],
                $rk['id'],
                $rk['js_code'],
                $rk['description'],
                $rk['total_reward'],
                $rk['progress_map'],
                $rk['reward_per_line']
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
                $rk['is_finished'],
                $rk['user_email'],
                $rk['results'],
                $rk['id'],
                $rk['js_code'],
                $rk['description'],
                $rk['total_reward'],
                $rk['progress_map'],
                $rk['reward_per_line']
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
            'INSERT INTO kernels (name, is_finished, user_email, results, js_code, total_reward, description, progress_map, reward_per_line, iteration_count) 
            VALUES (\'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\',\'%s\')',
            $conn->real_escape_string($kernel_name),
            0,
            $conn->real_escape_string($_SESSION["user_email"]),
            '{"results":""}',
            $conn->real_escape_string($kernel_js_code),
            $conn->real_escape_string($kernel_price),
            $conn->real_escape_string($kernel_description),
            str_repeat("0", ceil($iteration_count / 8)), //hay que inicializar el progress_map a 0
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

    public function __construct($name, $is_finished, $user_email, $results, $id, $js_code, $description, $total_reward, $progress_map, $getreward_per_line)
    {
        $this->name = $name;
        $this->is_finished = $is_finished;
        $this->user_email = $user_email;
        $this->results = $results;
        $this->id = $id;
        $this->js_code = $js_code;
        $this->description = $description;
        $this->total_reward = $total_reward;
        $this->progress_map = $progress_map;
        $this->reward_per_line = $getreward_per_line;
    }

    public function getname()
    {
        return $this->name;
    }
    public function getis_finished()
    {
        return $this->is_finished;
    }
    public function getuser_email()
    {
        return $this->user_email;
    }
    public function getresults()
    {
        return $this->results;
    }
    public function getCode()
    {
        return $this->js_code;
    }
    public function getdescription()
    {
        return $this->description;
    }
    public function gettotal_reward()
    {
        return $this->total_reward;
    }
    public function getprogress_map()
    {
        return $this->progress_map;
    }

    public function getreward_per_line()
    {
        return $this->reward_per_line;

    }
    public function getid()
    {
        return $this->id;

    }


}