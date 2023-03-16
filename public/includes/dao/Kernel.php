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
                $k[ 'statistics' ]
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
                $rk[ 'statistics' ]
            );
        }
        
        return $ret;
    }

    public function __construct( $name, $run_state, $user_email, $results, $id, $js_code, $statistics ) {
        $this->name = $name;
        $this->run_state = $run_state;
        $this->user_email = $user_email;
        $this->results = $results;
        $this->id = $id;
        $this->js_code = $js_code;
        $this->statistics = $statistics;
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

}