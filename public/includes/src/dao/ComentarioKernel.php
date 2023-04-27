<?php
namespace parallelize_namespace;

class ComentarioKernel
{
    private $user_email;
    private $user_comment;
    private $kernel_id;

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

    public static function buscaComentariosPorKernel($kernel_id)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf(
            'SELECT * FROM kernel_comments WHERE kernel_id = \'%d\'',
            $kernel_id
        );
        $rs = $conn->query($query);
        $result = [];
        while ($row = $rs->fetch_assoc()) {
            $result[] = new ComentarioKernel($row['user_email'], $row['kernel_id'], $row['comment']);
        }
        $rs->free();
        return $result;
    }
   

    public function __construct($user_email, $kernel_id, $user_comment){
        
        $this->user_email = $user_email;
        $this->kernel_id = $kernel_id;
        $this->user_comment = $user_comment;
    }

    public function getUserEmail(){
        return $this->user_email;
    }

    public function getUserComment(){
        return $this->user_comment;
    }

    public function getKernelId(){
        return $this->kernel_id;
    }


}