<?php
require '../../config.php';

if (!isset($_SESSION["user_email"])) {
    header("location: login.php");
    die();
}

if (!isset($_SESSION["comienzo_ejecucion"])) {

    // $_SESSION["comienzo_ejecucion"] = microtime(true) * 1000;
    $_SESSION["comienzo_ejecucion"] = time();

} else {

    $comienzo_ejecucion = $_SESSION["comienzo_ejecucion"];

    // $tiempo_ejecucion = (microtime(true) * 1000) - $comienzo_ejecucion;
    $tiempo_ejecucion = (time() - $comienzo_ejecucion);
    unset($_SESSION["comienzo_ejecucion"]);
    \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->setMillisCrunched($tiempo_ejecucion);
}