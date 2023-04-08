<?php

require '../../config.php';

if (!isset($_SESSION["user_email"])) {
    echo "identificate para acceder a los resultados de tu kenel";
    die();
}

$kernel_id = $_GET["id"];
$start = $_GET["start"];
$end = $_GET["end"];
$results = file_get_contents('php://input');

$seg = \parallelize_namespace\ExecutionSegment::buscaSegmentosConKernelIdYRango($start, $end, $kernel_id);
$user_email = $seg->getuser_email();

if ($user_email->getuser_email() != $_SESSION["user_email"]) {
    echo "no tienes permiso";
    die();
}

$kernel = \parallelize_namespace\Kernel::buscaKernelPorId($kernel_id);

$token_delta = 10; // TODO reward calculations

$seg->setresults($results);

$usuario->setTokens($usuario->gettokens() + $token_delta);
\parallelize_namespace\Transaction::submit($token_delta, $_SESSION["user_email"], "recompensa por trabajo en el kernel " . $kernel->getname(), $usuario->gettokens());


// completaSegmento($start, $end, $kernel_id, $results);
