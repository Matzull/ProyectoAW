<?php
namespace parallelize_namespace;

class Comentario
{
    private $user_name;
    private $user_email;
    private $user_comment;

    public static function enviaComentario($user_comment)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf(
            'INSERT INTO users (user_email, comment ) VALUES (\'%s\', \'%s\')',
            $conn->real_escape_string($_SESSION["user_email"]),
            $conn->real_escape_string($user_comment),
        );
        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        return true;
    }
}