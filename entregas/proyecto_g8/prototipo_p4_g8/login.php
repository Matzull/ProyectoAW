<?php require 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Iniciar Sesión </title>
    <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/logo_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/login.css">
</head>

<body>
    <?php
    $formulario = new \parallelize_namespace\formulario\FormularioLogin();
    require "includes/src/vistas/logo_nav_bar.php";
    ?>
    <div class="main-container">
        <div class="form-container">
            <div class="form-drawing">
                <img src="svg/blobanimation.svg" alt="Blob Animation">
            </div>
            <div class="form">
                <h2 class="title">
                    Iniciar Sesión
                </h2>
                <p class="subtitle t-muted">Iniciar sesión con tu usuario y contraseña.</p>
                <?= $formulario->gestiona() ?>
                <p class="text-sec-button">¿No tienes cuenta?</p>
                <button class="button c-h-b-blue"  id="CrearCuenta" onclick="location.href='register.php'">
                    Crear Cuenta</button>
            </div>
        </div>
    </div>
</body>

</html>