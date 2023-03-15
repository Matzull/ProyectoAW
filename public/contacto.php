<?php
require 'includes/config.php';

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/user_nav_bar.css">
    <link rel="stylesheet" href="css/user_dashboard.css">
    <link rel="stylesheet" href="css/contacto.css">
</head>

<body>
    <?php
    require_once "includes/config.php";
    require_once("./includes/vistas/nav_bar.php");
    ?>
    <div class="form-container">
        <div class="form">
            <h2 class="title">
                Contacto
            </h2>
            <p class="subtitle t-muted">Danos feedback de nuestra web!</p>
            <?php

            if (isset($_SESSION["user"])) {
                $formulario = new \parallelize_namespace\formulario\FormularioContacto();
                echo "<p>Esta funcionalidad no esta disponible de momento (WIP)</p>";
                $formulario->gestiona();
                
            } else {
                echo "<p>Necesitas estar registrado para enviarnos información, registrate aqui o si ya tienes cuenta haz login!</p>"; // TODO los enlaces
            }
            ?>

        </div>

        <div id="socials" class="form">
            <h2 class="title">
                Redes sociales
            </h2>
            <p class="subtitle t-muted">Síguenos en nuestras redes!</p>

            <!-- Creamos redes sociales? -->
            <a href="https://instagram.com"><img src="img/logo-Instagram-bMode.png" height="30"></a>
            <a href="https://facebook.com"><img src="img/logo-Facebook-bMode.png" height="30"></a>
            <a href="https://github.com"><img src="img/logo-Github-dMode.png" height="30"></a>

        </div>
        <div class="form-drawing">
            <!-- dibujo blobs/ Flor -->
        </div>
    </div>


</body>

</html>