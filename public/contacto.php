<?php
require 'includes/config.php';

if (!isset($_SESSION['user_email'])) {
    header("location: login.php");
    die();
}
$formulario = new \parallelize_namespace\formulario\FormularioContacto();
$html_form = $formulario->gestiona();
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
            <p class="subtitle t-muted">Danos feedback de nuestra web!</p>
            <?php
            if (isset($_SESSION["user_email"])) {
                echo $formulario->gestiona();
            } else {
                echo "<p>Necesitas estar registrado para enviarnos información,<a href=\"./register.php\"> registrate aqui</a> o si ya tienes cuenta <a href=\"./login.php\">inicia sesión aqui!</a></p>"; // TODO los enlaces
            }
            ?>
        </div>
        <div class="socials-cont sections-container">
            <div class="section">
                    <h2 class="title">
                        Redes sociales
                    </h2>
                    <p class="subtitle t-muted">Síguenos en nuestras redes!</p>
                    <div class="social-imgs">
                        <a href="https://instagram.com">
                            <img class="small" src="<?= RUTA_IMGS ?>/logo-Instagram-bMode.png"
                                alt="Instagram">
                        </a>
                        <a href="https://facebook.com">
                            <img class="small" src="<?= RUTA_IMGS ?>/logo-Facebook-bMode.png"
                                alt="Facebook">
                        </a>
                        <a href="https://github.com">
                            <img class="small" src="<?= RUTA_IMGS ?>/logo-Github-dMode.png"
                                alt="Github">
                        </a>
                    </div>
            </div>
            <img class="social-drawing" src="svg/blobanimation.svg" alt="Blob Animation">
        </div>
        
    </div>

    <?php require("./includes/src/vistas/footer.php"); ?>
</body>

</html>