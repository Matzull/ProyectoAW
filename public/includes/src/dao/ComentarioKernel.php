<?php
namespace parallelize_namespace;

class ComentarioKernel
{
    private $user_name;
    private $user_email;
    private $user_comment;

    public static function comenta($user_email, $kernel_id, $comentario)
    {
        $user = Usuario::buscaUsuario($user_email);
        if ($user) {
            $conn = Aplicacion::getInstance()->getConexionBd();
            $query = sprintf(
                'INSERT INTO kernel_comments (user_email, kernel_id ,comment) VALUES (\'%s\', \'%d\', \'%s\')',
                $conn->real_escape_string($user_email),
                $kernel_id,
                $conn->real_escape_string($comentario)
            );
            if (!$conn->query($query)) {
                echo $query;
                echo "Error SQL ({$conn->errno}):  {$conn->error}";
                return false;
            }

            return true;
        }
        echo "ERROR: No se ha encontrado el usuario";
        return false;
    }

    public function __construct($user_name, $user_email, $user_comment){
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_comment = $user_comment;
    }
}