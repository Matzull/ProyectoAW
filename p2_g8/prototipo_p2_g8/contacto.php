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
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/user_nav_bar.css">
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php
    require_once "includes/config.php";
    require_once("./includes/vistas/nav_bar.php");
    ?>
   
    <div class="main-container">
        <div class="form">
            <h2 class="title">
                Contacto
            </h2>
            <p class="subtitle t-muted">Danos feedback de nuestra web!</p>
            <?php
            if (isset($_SESSION["user_email"])) {
                $formulario = new \parallelize_namespace\formulario\FormularioContacto();
                echo $formulario->gestiona();
                

            } else {
                echo "<p>Necesitas estar registrado para enviarnos información,<a href=\"./register.php\"> registrate aqui</a> o si ya tienes cuenta <a href=\"./login.php\">inicia sesión aqui!</a></p>"; // TODO los enlaces
            }
            ?>
        </div>
        <div class="socials-cont">
            <div id="socials" class="form">
                    <h2 class="title">
                        Redes sociales
                    </h2>
                    <p class="subtitle t-muted">Síguenos en nuestras redes!</p>
                    <!-- Creamos redes sociales? -->
                    <a href="https://instagram.com"><img class="small" src="img/logo-Instagram-bMode.png"></a>
                    <a href="https://facebook.com"><img class="small" src="img/logo-Facebook-bMode.png"></a>
                    <a href="https://github.com"><img class="small" src="img/logo-Github-dMode.png"></a>
            </div>
            <div class="social-drawing">
                    <!-- dibujo blobs/ Flor -->
            </div>
        </div>
        
    </div>

    <?php require("./includes/vistas/footer.php"); ?>
</body>

</html>