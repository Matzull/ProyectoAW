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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/admin_dashboard.css">
</head>
<body>
    <?php require("includes/src/vistas/user_nav_bar.php") ?>
    <?php require("includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
    <?php if(!\parallelize_namespace\Usuario::buscaUsuario($_SESSION['user_email'])->getIsAdmin()): ?>
        <h2>No tienes rol de administrador.</h2>
    <?php else: ?>
        <div id="user-panel">
            <div class="header">
                <img src="./<?= RUTA_SVG ?>/admin_big_i.svg" alt="" width="44">
                <h2>ADMIN DASHBOARD</h2>
            </div>
            <div class="sections-container">
                <div class="section">
                    <h3 class="title">LISTA DE DENUNCIAS</h3>
                    <!-- CONTENIDO -->
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>
</html>