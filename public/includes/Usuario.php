<?php
namespace parallelize_namespace;

class Usuario
{
    private $user_name;
    private $user_email;
    private $password;
    private $millis_crunched;
    private $ranked;
    private $tokens;
    private $last_active;
    private $blocked;
    public static function buscaUsuario($user_email)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM users U WHERE U.user_email = '%s'", $conn->real_escape_string($user_email));
        $rs = $conn->query($query);
        if ($rs->num_rows == 0) {
            return false;
        } else {
            $fila = $rs->fetch_assoc();
            return new Usuario($fila['user_name'], $fila['user_email'], $fila['user_password'], $fila['millis_crunched'], $fila['ranking'], $fila['tokens'], $fila['last_active'], $fila['blocked']);
        }
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }
    public static function login($nombreUsuario, $password)
    {
        $user = Usuario::buscaUsuario($nombreUsuario);
        if ($user) {
            if ($user->compruebaPassword($password)) {
                return $user;
            }
        }
        return false;
    }
    public static function crea($user_email, $user_name, $password)
    {
        $user = Usuario::buscaUsuario($user_email);
        if (!$user) {
            $conn = Aplicacion::getInstance()->getConexionBd();
            $query = sprintf(
                'INSERT INTO users (user_email, user_name ,user_password ) VALUES (\'%s\', \'%s\', \'%s\')',
                $conn->real_escape_string($user_email),
                $conn->real_escape_string($user_name),
                password_hash($password, PASSWORD_DEFAULT)
            );
            if (!$conn->query($query)) {
                echo $query;
                echo "Error SQL ({$conn->errno}):  {$conn->error}";
                return false;
            }

            return self::buscaUsuario($user_email);
        }
        return false;
    }

    public function __construct($user_name, $user_email, $password, $millis_crunched, $ranked, $tokens, $last_active, $blocked)
    {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->password = $password;
        $this->millis_crunched = $millis_crunched;
        $this->ranked = $ranked;
        $this->tokens = $tokens;
        $this->last_active = $last_active;
        $this->blocked = $blocked;

    }
    // ñkjzcxnvkfdasfasdfsafa

    public function getNombre()
    {
        return $this->user_name;
    }

    public function getEmail(){
        return $this->user_email;
    }

    public function getTockens()
    {
        return $this->tokens;
    }

    public function getMsCrunched()
    {
        return $this->millis_crunched;
    }

    public function getKernelCount()
    {
        return sizeof(\parallelize_namespace\Kernel::buscaKernelDeUsuario($this));
    }

    public function getKernels()
    {
        return \parallelize_namespace\Kernel::buscaKernelDeUsuario($this);
    }
}