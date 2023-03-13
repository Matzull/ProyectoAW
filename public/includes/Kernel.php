<?php
namespace parallelize_namespace;

class Kernel {

    public static function buscaKernelDeUsuario( $user ) {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf( "SELECT * FROM kernels K WHERE K.user_email = '%s'", $conn->real_escape_string( $user_email ) );
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

    }

}