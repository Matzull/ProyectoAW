<?php
namespace parallelize_namespace;

class Contact
{
    private $user_name;
    private $user_email;
    private $user_comment;

    public static function enviaComentario($user_email, $user_name, $user_comment) {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf(
            'INSERT INTO comments (user_email, user_name ,comment ) VALUES ('$user_email','$user_name', '$user_comment')'
        );
        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        return true;
    }
}