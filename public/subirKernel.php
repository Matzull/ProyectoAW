<?php
require_once "includes/config.php";

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
    <title>Subir kernel</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/contacto.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/subirKernel.css">
</head>

<body>
    <?php
    require_once("./includes/src/vistas/nav_bar.php");
    ?>

    <div class="main-container">
        <div class="form">
            <h2 class="title">
                Subir kernel
            </h2>

            <p>antes de continuar recomendamos ojear la siguiente documentación:</p>    
            <ul>
                <li><a
                        href="https://github.com/gpujs/gpu.js/#supported-math-functions">https://github.com/gpujs/gpu.js/#supported-math-functions</a>
                </li>
            </ul>
            <?php
                $formulario = new \parallelize_namespace\formulario\FormularioSubirKernel();
                echo $formulario->gestiona();
            ?>
        </div>
    </div>

</body>

</html>