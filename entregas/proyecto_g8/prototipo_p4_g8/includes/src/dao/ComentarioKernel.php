<?php
namespace parallelize_namespace;

class ComentarioKernel
{
    private $user_email;
    private $user_comment;
    private $kernel_id;
    private $time;
    private $is_report;

    public static function comenta($user_email, $kernel_id, $comentario, $is_report)
    {
        $user = Usuario::buscaUsuario($user_email);
        if ($user) {
            $conn = Aplicacion::getInstance()->getConexionBd();
            $query = sprintf(
                'INSERT INTO kernel_comments (user_email, kernel_id, comment, is_report) VALUES (\'%s\', \'%d\', \'%s\', \'%d\')',
                $conn->real_escape_string($user_email),
                $kernel_id,
                $conn->real_escape_string($comentario),
                $is_report
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
            $result[] = new ComentarioKernel($row['user_email'], $row['kernel_id'], $row['comment'],
                $row['time'], $row['is_report']);
        }
        $rs->free();
        return $result;
    }

    public static function buscaDenunciasUsuario($user_email){
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM Kernels K INNER JOIN Kernel_comments KC ON K.id = KC.kernel_id WHERE K.user_email = '%s' AND KC.is_report = 1",
            $conn->real_escape_string($user_email));
        $rs = $conn->query($query);

        $raw_kernels = $rs->fetch_all(MYSQLI_ASSOC);
        $ret = [];
        foreach ($raw_kernels as $rk) {
            $ret[] = new ComentarioKernel(
                $rk['user_email'],
                $rk['kernel_id'],
                $rk['comment'],
                $rk['time'],
                $rk['is_report']
            );
        }
        return $ret;
    }
   

    public function __construct($user_email, $kernel_id, $user_comment, $time, $is_report){
        $this->user_email = $user_email;
        $this->kernel_id = $kernel_id;
        $this->user_comment = $user_comment;
        $this->time = $time;
        $this->is_report = $is_report;
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

    public function getTime(){
        return $this->time;
    }

    public function getIsReport(){
        return $this->is_report;
    }
}