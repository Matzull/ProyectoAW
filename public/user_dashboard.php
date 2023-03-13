<?php
namespace parallelize_namespace;

require 'includes/config.php';
require 'includes/Usuario.php';

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='/css/nav_bar.css'>
    <link rel='stylesheet' href='/css/user_nav_bar.css'>
    <link rel='stylesheet' href='/css/user_dashboard.css'>
</head>

<body>


    <?php require('./includes/vistas/nav_bar.php') ?>
    <div class='container'>
        <div class='panel-container'>
            <div class='panel-header'>
                <img src='./svg/Dashboard_i.svg' alt='' width='44'>
                <h2>DASHBOARD</h2>
            </div>
            <div class='sections-container'>
                <div class='section'>
                    <img src='https://picsum.photos/100/100' alt='' width='100'>
                    <h3>PARTICIPACIÓN</h3>
                    <p>Has subido
                        <?= $_SESSION["user"]->getKernelCount() ?> kernels.
                    </p>
                    <p>Has ejecutado
                        <?= $_SESSION["user"]->getMsCrunched() ?> ms .
                    </p>
                </div>
                <div class='section'>
                    <h3>TUS TOKENS</h3>
                    <button type='button'>+</button>
                    <p>
                        <?= $_SESSION["user"]->getTockens() ?>
                    </p>
                    <img src='https://picsum.photos/100/100' alt='' width='100'>
                </div>
                <div class='section'>
                    <h3>HISTORIAL DE EJECUCIONES</h3>
                    <div class='search-panel'>
                        <form action=''>
                            <div class='search-main-panel'>
                                <input class='input-field' type='text' name='' id='' placeholder='Buscar...'>
                                <button class='button c-h-blue' type='submit'>Buscar</button>
                            </div>
                            <div class='search-option-panel'>
                                <button class='button c-h-blue' type='button'>Filtrar</button>
                                <select name='cars' id='cars'>
                                    <optgroup label='Fecha'>
                                        <option value='more recent first'>Más reciente primero</option>
                                        <option value='less recent first'>Menos reciente primero</option>
                                    </optgroup>
                                    <optgroup label='Ingresos'>
                                        <option value='more income first'>Más ingresos primero</option>
                                        <option value='less income first'>Menos ingresos primero</option>
                                    </optgroup>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class='execution-history'>
                    </div>
                </div>
                <div class='section'>
                    <h3>TUS ÚLTIMOS KERNELS</h3>
                    <div class='last-kernels'>

                    </div>
                    <button class='button c-h-blue' type='button'>Ver más kernels</button>
                </div>
            </div>
        </div>
        <?php require('includes/vistas/user_nav_bar.php') ?>
    </div>
    <!-- <div style = 'width: 400px; height: 1000px;'></div> -->
</body>

</html>