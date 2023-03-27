<?php require_once "includes/config.php";?>
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

    ?>
    <div class="form-container">
        <div class="form-drawing">
            <!-- dibujo blobs/ Flor -->
        </div>
        <div class="form">
            <h2 class="title">
                Iniciar Sesión
            </h2>
            <p class="subtitle t-muted">Iniciar sesión con tu usuario y contraseña.</p>
            <?= $formulario->gestiona() ?>
            <p class="text-sec-button">¿No tienes cuenta?</p>
            <button class="button c-h-b-blue"  id="CrearCuenta" onclick="location.href='register.php'">
                Registrate</button>
        </div>
    </div>

</body>

</html>