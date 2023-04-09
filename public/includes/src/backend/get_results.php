<?php

require '../../config.php';


$id = $_GET["id"];
$format = $_GET["format"];
$kernel = \parallelize_namespace\Kernel::buscaKernelPorId($id);
$segments = \parallelize_namespace\ExecutionSegment::buscaSegmentosConKernelId($_GET["id"]);

$segment_cache = null;

if (!isset($_SESSION["user_email"])) {
    echo "identificate para acceder a los resultados de tu kenel";
    die();
}

if ($kernel->getuser_email() != $_SESSION["user_email"]) {
    echo "no tienes permiso";
    die();
}

if ($format == "csv") {
    for ($iteration = 0; $iteration < $kernel->getiteration_count(); $iteration++) {
        echo $kernel->result_at($iteration);
        if ($iteration != $kernel->getiteration_count() - 1) {
            echo ",";
        }
    }
} else if ($format == "json") {
    echo "[";
    for ($iteration = 0; $iteration < $kernel->getiteration_count(); $iteration++) {
        echo $kernel->result_at($iteration);
        if ($iteration != $kernel->getiteration_count() - 1) {
            echo ",";
        }
    }
    echo "]";
} else {
    echo "formato no reconocido, use el parametro de url format con una opcion valida (csv, json)";
}