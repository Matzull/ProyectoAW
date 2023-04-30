<?php
namespace parallelize_namespace;

class Usuario
{
    private $user_name;
    private $user_email;
    private $user_password;
    private $millis_crunched;
    private $tokens;
    private $last_active;
    private $blocked;
    private $is_admin;
    public static function buscaUsuario($user_email)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM users U WHERE U.user_email = '%s'", $conn->real_escape_string($user_email));
        $rs = $conn->query($query);
        if ($rs->num_rows == 0) {
            return false;
        } else {
            $fila = $rs->fetch_assoc();
            return new Usuario(
                $fila['user_name'], $fila['user_email'], $fila['user_password'],
                $fila['millis_crunched'], $fila['tokens'], $fila['last_active'], $fila['blocked'],
                $fila['is_admin']
            );
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

    public static function getMejoresUsuarios($count)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM users U ORDER BY millis_crunched DESC LIMIT %s", $count);
        $rs = $conn->query($query);
        $users = $rs->fetch_all(MYSQLI_ASSOC);
        $ret = [];
        foreach ($users as $usr) {
            $ret[] = new Usuario(
                $usr['user_name'], $usr['user_email'], $usr['user_password'],
                $usr['millis_crunched'], $usr['tokens'], $usr['last_active'], $usr['blocked'],
                $usr['is_admin']
            );
        }
        return $ret;
    }

    public static function getTodosLosUsuarios()
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM users");
        $rs = $conn->query($query);
        $users = $rs->fetch_all(MYSQLI_ASSOC);
        $allUsers = [];
        foreach ($users as $user) {
            $allUsers[] = new Usuario(
                $user['user_name'], $user['user_email'], $user['user_password'],
                $user['millis_crunched'], $user['tokens'], $user['last_active'], $user['blocked'],
                $user['is_admin']
            );
        }
        return $allUsers;
    }
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

    public static function toggleBlocked($user_email)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf(
            'UPDATE Users SET blocked = ! blocked WHERE user_email = \'%s\'',
            $conn->real_escape_string($user_email),
        );
        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        if ($conn->affected_rows < 1) {
            return false;
        }
        return true;
    }

    public static function eliminarUsuario($user_email)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf(
            'DELETE FROM Users WHERE user_email = \'%s\'',
            $conn->real_escape_string($user_email),
        );
        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        if ($conn->affected_rows < 1) {
            return false;
        }
        return true;
    }

    public function __construct($user_name, $user_email, $user_password, $millis_crunched, $tokens, $last_active, $blocked, $is_admin)
    {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_password = $user_password;
        $this->millis_crunched = $millis_crunched;
        $this->tokens = $tokens;
        $this->last_active = $last_active;
        $this->blocked = $blocked;
        $this->is_admin = $is_admin;
    }

    private function storeToDb()
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf(
            'UPDATE users SET user_name = \'%s\', user_password = \'%s\', millis_crunched = %d, tokens = %s, last_active = %s, blocked = %s WHERE user_email = \'%s\'',
            $conn->real_escape_string($this->user_name),
            $conn->real_escape_string($this->user_password),
            $conn->real_escape_string($this->millis_crunched),
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

    public function gettokens()
    {
        return $this->tokens;
    }

    public function getMsCrunched()
    {
        return $this->millis_crunched;
    }

    public function getIsAdmin()
    {
        return $this->is_admin;
    }

    public function getBlocked()
    {
        return $this->blocked;
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
        return RUTA_IMGS . "/default_profile_pic.png";
    }

    public function getRanking()
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM user_ranking WHERE user_email = '%s'", $this->getEmail());
        $rs = $conn->query($query);
        $rank = $rs->fetch_all(MYSQLI_ASSOC);

        return $rank[0]["ranking"];
    }

    public function setTokens($value)
    {
        $this->tokens = $value;
        $this->storeToDb();
    }

    public function setMillisCrunched($value)
    {
        $this->millis_crunched = $value;
        $this->storeToDb();
    }
}