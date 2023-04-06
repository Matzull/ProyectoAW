<?php

require '../../config.php';

$kernel_id = $_GET["id"];
$start = $_GET["start"];
$end = $_GET["end"];

\parallelize_namespace\ExecutionSegment::eliminaSegmento($start, $end, $kernel_id, $results);