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

    public static function buscaKernelDeUsuario(Usuario $user ) { // User $user
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

    public function __construct( $name, $run_state, $user_email, $results, $id, $js_code, $statistics ) {
        $this->name = $name;
        $this->run_state = $run_state;
        $this->user_email = $user_email;
        $this->results = $results;
        $this->id = $id;
        $this->js_code = $js_code;
        $this->statistics = $statistics;
    }

}