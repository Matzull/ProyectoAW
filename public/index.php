<?php
require 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parallelize</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_dashboard.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/index.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">
    <link rel="j" href="<?= RUTA_CSS ?>/footer.css">
</head>

<body>
    
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>

    <div class="main-container">

        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <a href="https://www.w3schools.com"><img class = "carimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/W3Schools_logo.svg/1088px-W3Schools_logo.svg.png"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.ucm.es"><img class = "carimg" src="https://www.ucm.es/data/cont/docs/3-2016-07-21-EscudoUCMTransparenteBig.png"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://visualstudio.microsoft.com/es/"><img class = "carimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Visual_Studio_Code_1.35_icon.svg/2048px-Visual_Studio_Code_1.35_icon.svg.png"></a>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <div class="aligned">
            <div>
                <h1>Bienvenid@s a Parallelize!</h1>
                <p class="subtitle t-muted">Esperemos que os guste!</p>
            </div>
            <div class="diagonal-gradient"></div>
        </div>
        <div class="diagonal-gradient"></div>
        <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    </div>
    <?php require("./includes/src/vistas/footer.php"); ?>

</body>

</html>
<script src="<?= RUTA_JS ?>/index.js"></script>
