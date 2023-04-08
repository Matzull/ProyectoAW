<?php

require '../../config.php';


$id = $_GET["id"];
$kernel = \parallelize_namespace\Kernel::buscaKernelPorId($id);
$segments = \parallelize_namespace\ExecutionSegment::buscaSegmentosConKernelId($_GET["id"]);

if (!isset($_SESSION["user_email"])) {
    echo "identificate para acceder a los resultados de tu kenel";
    die();
}

if ($kernel->getuser_email() != $_SESSION["user_email"]) {
    echo "no tienes permiso";
    die();
}

function result_at($n)
{
    global $segments;

    foreach ($segments as $i => $seg) {
        // echo "[" . $i . "]<br>";

        if ($seg->contains($n)) {
            $sub_index = $n - $seg->getiteration_start();
            $res_list = explode(",", $seg->getresults());
            // echo "contained in ";
            // echo $seg->getresults();
            // echo "<br>";
            if (isset($res_list[$sub_index])) {
                return $res_list[$sub_index];
            }
        } 
    }
    return "";
}

for ($iteration = 0; $iteration < $kernel->getiteration_count(); $iteration++) {
    echo result_at($iteration);
    if ($iteration != $kernel->getiteration_count() - 1) {
        echo ",";
    }
}