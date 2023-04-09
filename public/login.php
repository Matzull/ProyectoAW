<?php require 'includes/config.php'; ?>
<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!DOCTYPE html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">

<head>
    <meta charset="utf-8">
    <title> Iniciar Sesión </title>
    <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/login.css">
</head>

<body>
    <?php

    $formulario = new \parallelize_namespace\formulario\FormularioLogin();
    require "includes/src/vistas/logo_nav_bar.php";
    ?>
    <div class="form-container">
        <div class="form-drawing">
            <img src="svg/blobanimation.svg">
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
</body>

</html>