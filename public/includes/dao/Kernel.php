<?php
namespace parallelize_namespace;

class Kernel {

    private $name; 
    private $run_state; 
    private $user_email;
    private $results;
    private $id;
    private $js_code;
    private $statistics;
    private $description;
    private $total_reward;
    private $progress_map;

    public static function buscaKernelDeUsuario(Usuario $user) { // User $user
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf( "SELECT * FROM kernels K WHERE K.user_email = '%s'", $conn->real_escape_string( $user->getEmail() ) );
        $rs = $conn->query( $query );

        $raw_kernels = $rs->fetch_all( MYSQLI_ASSOC );
        $ret = [];
        foreach ( $raw_kernels as $k ) {
            $ret[] = new Kernel(
                $k[ 'name' ],
                $k[ 'run_state' ],
                $k[ 'user_email' ],
                $k[ 'results' ],
                $k[ 'id' ],
                $k[ 'js_code' ],
                $k[ 'statistics' ],
                $k[ 'description' ],
                $k[ 'total_reward' ],
                $k[ 'progress_map' ]
            );
        }
        return $ret;
    }

    public static function buscaKernelPorId(string $id) { // Id
        $conn = Aplicacion::getInstance()->getConexionBd();
        $ret = NUll;
        $query = sprintf( "SELECT * FROM kernels K WHERE K.id = '%s'", $conn->real_escape_string($id));
        $rs = $conn->query( $query );
        if (mysqli_num_rows($rs))
        {
            $rk = $rs->fetch_assoc();
            $ret = new Kernel(
                $rk[ 'name' ],
                $rk[ 'run_state' ],
                $rk[ 'user_email' ],
                $rk[ 'results' ],
                $rk[ 'id' ],
                $rk[ 'js_code' ],
                $rk[ 'statistics' ],
                $rk[ 'description' ],
                $rk[ 'total_reward' ],
                $rk[ 'progress_map' ]
            );
        }
        
        return $ret;
    }

    public static function enviaKernel($kernel_name,$kernel_js_code,$kernel_description,$kernel_price)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf(
            'INSERT INTO kernels (name, run_state, user_email, results, js_code, statistics, total_reward, description, progress_map) 
            VALUES (\'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\', \'%s\')',
            $conn->real_escape_string($kernel_name),
            0,
            $conn->real_escape_string($_SESSION["user_email"]),
            '{"results":""}',
            $conn->real_escape_string($kernel_js_code),
            '{}',
            $conn->real_escape_string($kernel_price),
            $conn->real_escape_string($kernel_description),
            $conn->real_escape_string(0) //hay que inicializar el progress_map a 0
        );
        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        return true;
    }

    public function __construct( $name, $run_state, $user_email, $results, $id, $js_code, $statistics, $description, $total_reward, $progress_map ) {
        $this->name = $name;
        $this->run_state = $run_state;
        $this->user_email = $user_email;
        $this->results = $results;
        $this->id = $id;
        $this->js_code = $js_code;
        $this->statistics = $statistics;
        $this->$description = $description;
        $this->$total_reward = $total_reward;
        $this->$progress_map = $progress_map;
    }

    public function getname()
    {
        return $this->name;
    }
    public function getrun_state()
    {
        return $this->run_state;
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
    public function getstatistics()
    {
        return $this->statistics;
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


}