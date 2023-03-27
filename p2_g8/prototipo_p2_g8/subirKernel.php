<?php
require 'includes/config.php';

if (!isset($_SESSION['user_email'])) {
    header("location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir kernel</title>
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/user_nav_bar.css">
    <link rel="stylesheet" href="css/contacto.css">
</head>

<body>
    <?php
    require_once "includes/config.php";
    require_once("./includes/src/vistas/nav_bar.php");
    ?>
   
    <div class="container">
        <div class="form">
            <h2 class="title">
                Subir kernel
            </h2>
            <?php
            if (isset($_SESSION["user_email"])) {
                $formulario = new \parallelize_namespace\formulario\FormularioSubirKernel();
                echo $formulario->gestiona();
            } else {
                echo "<p>Necesitas estar registrado para enviarnos información,<a href=\"./register.php\"> registrate aqui</a> o si ya tienes cuenta <a href=\"./login.php\">inicia sesión aqui!</a></p>"; // TODO los enlaces
            }
            ?>
        </div>        
    </div>

</body>

</html>