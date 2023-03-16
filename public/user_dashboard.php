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
    <link rel="stylesheet" href="css/user_dashboard.css">
</head>

<body>


    <?php require("includes/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div class="user-panel">
            <div class="header">
                <img src="./svg/Dashboard_i.svg" alt="" width="44">
                <h2>DASHBOARD</h2>
            </div>
            <div class="sections-container">
                <div class="section section-h">
                <img class="circle-border" src="https://picsum.photos/100/100" alt="" width="100" height="100">
                    <div class="lateral-info">
                        <h3 class="title">PARTICIPACIÓN</h3>
                        <p class="t-muted">Has subido
                            <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getKernelCount() ?>
                            kernels.
                        </p>
                        <p class="t-muted">Has ejecutado
                            <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getMsCrunched() ?> ms.
                        </p>
                    </div>
                </div>
                <div class="section section-h">
                    <div class="lateral-info">
                        <h3 class="title">TUS TOKENS</h3>
                        <div class="flex-between">
                            <button class="circular-button button c-h-blue" type="button">
                                <img src="svg/Plus_i.svg" alt="">
                            </button>
                            <h3 class="t-big no-margin">
                                <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getTockens() ?>
                            </h3>
                        </div>
                    </div>
                    <img src="svg/Token_i.svg" alt="" width="100" heigh="100">
                </div>
                <div class="section">
                    <h3 class="title">HISTORIAL DE EJECUCIONES</h3>
                    <form class="search-form" action="">
                        <div class="main-panel">
                            <input class="input-field" type="text" name="" id="" placeholder="Buscar...">
                            <button class="button c-h-blue" type="submit">Buscar</button>
                        </div>
                        <div class="option-panel">
                            <button class="button c-h-blue" type="button">Filtrar</button>
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
                    <h3 class="title">TUS ÚLTIMOS KERNELS</h3>
                    <div class="last-kernels">
                    </div>
                    <button class="button c-h-blue" type="button">Ver más kernels</button>
                </div>
            </div>
        </div>
    </div>
    <?php require("includes/vistas/user_nav_bar.php") ?>
</body>

</html>