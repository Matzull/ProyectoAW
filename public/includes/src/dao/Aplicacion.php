<?php
namespace parallelize_namespace;

require_once "includes/config.php";
class Aplicacion
{
    private static $instance;
    private $db_connection;

    static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Aplicacion();
        }
        return self::$instance;
    }

    function init($bdDatosConexion)
    {
        $message = BD_HOST . " " . BD_USER . " " . BD_PASS . " " . BD_NAME;
        error_log($message, 3, "/var/log/php/errors.log");
        $this->db_connection = mysqli_connect(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        if ($this->db_connection->connect_errno) {
            echo "Error de conexión a la BD ({$this->db_connection->connect_errno}):  {$this->db_connection->connect_error}";
            exit();
        }
        if (!$this->db_connection->set_charset("utf8mb4")) {
            echo "Error al configurar la BD ({$this->db_connection->errno}):  {$this->db_connection->error}";
            exit();
        }
    }

    function getConexionBd()
    {
        global $db_credentials;
        if (!isset($this->db_connection)) {
            $this->init($db_credentials);
        }
        return $this->db_connection;
    }

}