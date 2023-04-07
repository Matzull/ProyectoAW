<?php

require '../../config.php';

$kernel_id = $_GET["id"];
$start = $_GET["start"];
$end = $_GET["end"];
$results = $_POST["res"];

\parallelize_namespace\ExecutionSegment::completaSegmento($start, $end, $kernel_id, $results);