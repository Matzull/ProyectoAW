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
    <title>Contacto</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/contacto.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">
</head>

<body>
    <?php
    require_once("./includes/src/vistas/nav_bar.php");
    ?>

    <div class="main-container">
        <div class="form">
            <h2 class="title">
                Contacto
            </h2>
            <p>Tu feedback ha sido registrado, muchas gracias!!</p>
        </div>
        <div class="socials-cont">
            <div id="socials" class="form">
                <h2 class="title">
                    Redes sociales
                </h2>
                <p class="subtitle t-muted">Síguenos en nuestras redes!</p>
                <!-- Creamos redes sociales? -->
                <a href="https://instagram.com"><img class="small" src="<?= RUTA_IMGS ?>/logo-Instagram-bMode.png"></a>
                <a href="https://facebook.com"><img class="small" src="<?= RUTA_IMGS ?>/logo-Facebook-bMode.png"></a>
                <a href="https://github.com"><img class="small" src="<?= RUTA_IMGS ?>/logo-Github-dMode.png"></a>
            </div>
            <div class="social-drawing">
                <img src="svg/blobanimation.svg">
            </div>
        </div>

    </div>

    <?php require("./includes/src/vistas/footer.php"); ?>
</body>

</html>