<?php
namespace parallelize_namespace;

require 'includes/config.php';

if (!isset($_SESSION['user_email'])) {
    header("location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/user_nav_bar.css">
    <link rel="stylesheet" href="css/your_kernels.css">
</head>

<body>
    <?php require_once("./includes/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div id="user-panel">
            <div class="header">
                <img src="./svg/Kernels_i.svg" alt="" width="44">
                <h2>TUS KERNELS</h2>
            </div>
            <div class="sections-container">
                <div class="section">
                    <h3 class="title">HISTORIAL DE EJECUCIONES</h3>
                    <form class="search-form" action="">
                        <div class="main-panel">
                            <input class="input-field" type="text" name="" id="" placeholder="Buscar...">
                            <button class="button c-h-blue" type="submit">Buscar</button>
                        </div>
                        <div class="option-panel">
                            <button class="button c-h-blue" >Filtrar</button>
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
                        <img src="svg/Kernels_big_i.svg" alt="">
                        <button class="circular-button button c-h-blue" onclick="location.href='FormularioSubirKernel.php'">
                            <img src="svg/Plus_i.svg" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("./includes/vistas/user_nav_bar.php") ?>

</body>

</html>