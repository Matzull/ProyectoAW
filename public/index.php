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
</head>

<body>
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div class="diagonal-gradient"></div>
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