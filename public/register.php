<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<?php require_once "includes/config.php";?>
<!DOCTYPE html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear Cuenta </title>
    <meta name="keywords" content="Crear Cuenta">
    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/logo_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/register.css">
</head>

<body>
    <?php
    $formulario = new \parallelize_namespace\formulario\FormularioRegister();
    require "includes/src/vistas/logo_nav_bar.php";
    ?>
    <div class="main-container">
        <div class="form-container">
            <div class="form">
                <h2 class="title">
                    Crear Cuenta
                </h2>
                <p class="subtitle t-muted">Crea una cuenta para empezar...</p>

                <?= $formulario->gestiona() ?>

                <p class="text-sec-button">¿Ya tienes cuenta?</p>
                <button class="button c-h-b-blue"  id="loginbutton" onclick="location.href='login.php'">
                    Iniciar Sesión</button>
            </div>
            <div class="form-drawing">
                <img src="svg/blobanimation.svg" alt="Blob Animation">
            </div>
        </div>
    </div>
</body>

</html>