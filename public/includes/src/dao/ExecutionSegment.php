<?php
namespace parallelize_namespace;

class ExecutionSegment
{

    private $user_email;
    private $start_time;
    private $kernel_id;
    private $results;
    private $iteration_start;
    private $iteration_end;

    public static function buscaSegmentosConKernelId($id)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf("SELECT * FROM execution_segments K WHERE K.kernel_id = '%s'", $conn->real_escape_string($id));
        $rs = $conn->query($query);

        $raw_results = $rs->fetch_all(MYSQLI_ASSOC);
        $ret = [];
        foreach ($raw_results as $t) {

            // foreach ($t as $paramName => $paramValue)
            //     echo "$paramName:$paramValue, ";
            // echo "\n";

            $ret[] = new ExecutionSegment(
                $t['user_email'],
                $t['start_time'],
                $t['kernel_id'],
                $t['results'],
                $t['iteration_start'],
                $t['iteration_end']
            );
        }
        return $ret;
    }

    public static function enviaSegmento($start, $end, $kernel_id)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf(
            'INSERT INTO execution_segments (user_email, kernel_id, iteration_start, iteration_end) 
            VALUES (\'%s\', \'%s\', \'%s\', \'%s\')',
            $conn->real_escape_string($_SESSION["user_email"]),
            $conn->real_escape_string($kernel_id),
            $conn->real_escape_string($start),
            $conn->real_escape_string($end),
        );
        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        return true;
    }

    public static function completaSegmento($start, $end, $kernel_id, $results)
    {

        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf(
            'UPDATE execution_segments SET results = \'%s\' WHERE kernel_id = %s and iteration_start = %s and iteration_end = %s',
            $conn->real_escape_string($results),
            $conn->real_escape_string($kernel_id),
            $conn->real_escape_string($start),
            $conn->real_escape_string($end),
        );

        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        return true;
    }

    public static function eliminaSegmento($start, $end, $kernel_id)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();

        $query = sprintf(
            'DELETE FROM execution_segments WHERE kernel_id = %s and iteration_start = %s and iteration_end = %s',
            $conn->real_escape_string($kernel_id),
            $conn->real_escape_string($start),
            $conn->real_escape_string($end),
        );

        if (!$conn->query($query)) {
            echo $query;
            echo "Error SQL ({$conn->errno}):  {$conn->error}";
            return false;
        }
        return true;
    }

    public function __construct($user_email, $start_time, $kernel_id, $results, $iteration_start, $iteration_end)
    {
        $this->$user_email = $user_email;
        $this->$start_time = $start_time;
        $this->$kernel_id = $kernel_id;
        $this->$results = $results;
        $this->iteration_start = $iteration_start;
        $this->iteration_end = $iteration_end;

    }

    public function getuser_email()
    {
        return $this->user_email;
    }
    public function getstart_time()
    {
        return $this->start_time;
    }
    public function getkernel_id()
    {
        return $this->kernel_id;
    }
    public function getresults()
    {
        return $this->results;
    }
    public function getiteration_start()
    {
        return $this->iteration_start;
    }
    public function getiteration_end()
    {
        return $this->iteration_end;
    }

    public function contains($n)
    {
        // echo "checking if ";
        // echo $n;
        // echo " is between ";
        // echo $this->getiteration_start();
        // echo " and ";
        // echo $this->getiteration_end();
        // echo $n >= $this->iteration_start && $n < $this->iteration_end;
        // echo "\n";
        return $n >= $this->iteration_start && $n < $this->iteration_end;
    }

}