<?php
namespace parallelize_namespace;

class Usuario
{
    private $user_name;
    private $user_email;
    private $user_password;
    private $millis_crunched;
    private $ranking;
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

    public function compruebaPassword($user_password)
    {
        return password_verify($user_password, $this->user_password);
    }
    public static function login($nombreUsuario, $user_password)
    {
        $user = Usuario::buscaUsuario($nombreUsuario);
        if ($user) {
            if ($user->compruebaPassword($user_password)) {
                return $user;
            }
        }
        return false;
    }
    public static function crea($user_email, $user_name, $user_password)
    {
        $user = Usuario::buscaUsuario($user_email);
        if (!$user) {
            $conn = Aplicacion::getInstance()->getConexionBd();
            $query = sprintf(
                'INSERT INTO users (user_email, user_name ,user_password ) VALUES (\'%s\', \'%s\', \'%s\')',
                $conn->real_escape_string($user_email),
                $conn->real_escape_string($user_name),
                password_hash($user_password, PASSWORD_DEFAULT)
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

    public function __construct($user_name, $user_email, $user_password, $millis_crunched, $ranking, $tokens, $last_active, $blocked)
    {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
        $this->millis_crunched = $millis_crunched;
        $this->ranking = $ranking;
        $this->tokens = $tokens;
        $this->last_active = $last_active;
        $this->blocked = $blocked;

    }

    private function storeToDb()
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf(
            'UPDATE users SET user_name = \'%s\', user_password = \'%s\', millis_crunched = %d, ranking = %s, tokens = %s, last_active = %s, blocked = %s WHERE user_email = \'%s\'',
            $conn->real_escape_string($this->user_name),
            $conn->real_escape_string($this->user_password),
            $conn->real_escape_string($this->millis_crunched),
            $conn->real_escape_string($this->ranking),
            $conn->real_escape_string($this->tokens),
            $conn->real_escape_string($this->last_active),
            $conn->real_escape_string($this->blocked),
            $conn->real_escape_string($this->user_email)
        );

        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
    }

    public function getName()
    {
        return $this->user_name;
    }

    public function getEmail()
    {
        return $this->user_email;
    }

    public function gettoekns()
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

    public function getTransactions()
    {
        return \parallelize_namespace\Transaction::buscaTransacionesDeUsuario($this);
    }

    public function getPicUrl()
    {
        return "";
    }

    public function setTokens($value)
    {
        $this->tokens = $value;
        $this->storeToDb();
    }
}