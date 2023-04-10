<?php
namespace parallelize_namespace;

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
    <title>Document</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/your_kernels.css">
</head>

<body>
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div id="user-panel">
            <div class="header">
                <img src="./<?= RUTA_SVG ?>/Kernels_i.svg" alt="" width="44">
                <h2>TUS KERNELS</h2>
            </div>
            <div class="sections-container">
                <div class="section">
                    <!-- <h3 class="title">HISTORIAL DE EJECUCIONES</h3> -->
                    <form class="search-form" action="">
                        <div class="main-panel">
                            <input class="input-field" type="text" name="" id="" placeholder="Buscar...">
                            <button class="button c-h-blue" type="submit">Buscar</button>
                        </div>
                        <div class="option-panel">
                            <button class="button c-h-blue">Filtrar</button>
                            <select class="select" name="orderby" id="orderby">
                                <optgroup label="Fecha">
                                    <option value="more recent first">Más reciente primero</option>
                                    <option value="less recent first">Menos reciente primero</option>
                                </optgroup>
                                <optgroup label="Ingresos">
                                    <option value="more income first">Más ingresos primero</option>
                                    <option value="less income first">Menos ingresos primero</option>
                                </optgroup>
                            </select>
                        </div>
                    </form>
                    <div class="execution-history">
                    </div>
                </div>
                <div class="section">
                    <h3 class="title">SUBIR KERNEL</h3>
                    <div id="upload-panel">
                        <img src="<?= RUTA_SVG ?>/Kernels_big_i.svg" alt="">
                        <button class="circular-button button c-h-blue" onclick="location.href='subirkernel.php'">
                            <img src="<?= RUTA_SVG ?>/Plus_i.svg" alt="">
                        </button>
                    </div>
                </div>
                <div class="section">
                <?php 
                    $kernels = \parallelize_namespace\Usuario::getKernels();
                    foreach ($kernels as $key => $value) {
                        echo "<tr>";
                        echo "<td>" . $key + 1 . "</td>";
                        echo "<td>" . $value . "</td>";
                        echo "</tr>";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("./includes/src/vistas/user_nav_bar.php") ?>

</body>

</html>