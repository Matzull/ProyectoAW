<?php

define("MAX_SEGMENT_SIZE", 10);

require '../../config.php';

// function assigned($n)
// {
//     global $kernel_id;

//     $segments = \parallelize_namespace\ExecutionSegment::buscaSegmentosConKernelId($kernel_id);

//     foreach ($segments as $i => $seg) {
//         if ($seg->contains($n)) {
//             return true;
//         }
//     }
//     return false;
// }

function assigned($n)
{
    global $kernel_id;
    $seg = \parallelize_namespace\ExecutionSegment::buscaSegmentosConKernelIdQueContenganIt($kernel_id, $n);
    return $seg;
}

$kernel_id = $_GET["id"];
$kernel = \parallelize_namespace\Kernel::buscaKernelPorId($kernel_id);
$iteration_count = $kernel->getiteration_count();

$start = -1;
$end = -1;


for ($i = 0; $i < $iteration_count; $i++) {

    if ($start == -1) {
        $seg = assigned($i);

        if (isset($seg)) {
            $i = $seg->getiteration_end()-1;
            continue;
        } else {
            $start = $i;
        }
    } else if ($start != -1 && (assigned($i) || MAX_SEGMENT_SIZE < $i - $start)) {
        $end = $i;
        echo "{\"start\":$start,\"end\":$end}";
        \parallelize_namespace\ExecutionSegment::enviaSegmento($start, $end, $kernel_id);
        die();
    }
}
if ($start != -1) {
    echo "{\"start\":$start,\"end\":$iteration_count}";
    \parallelize_namespace\ExecutionSegment::enviaSegmento($start, $iteration_count, $kernel_id);
    die();
} else {
    $kernel->setFinished();
    echo "null";
    die();
}