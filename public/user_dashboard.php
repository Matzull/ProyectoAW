<?php
namespace parallelize_namespace;

require 'includes/config.php';

if (!isset($_SESSION['user_email'])) {
    header("location: login.php");
    die();
}

$user = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
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
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_dashboard.css">
</head>

<body>


    <?php require("includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div id="user-panel">
            <div class="header">
                <img src="./<?= RUTA_SVG ?>/Dashboard_i.svg" alt="" width="44">
                <h2>DASHBOARD</h2>
            </div>
            <div class="sections-container">
                <div class="section section-h">
                    <img class="circle-border" src="https://picsum.photos/100/100" alt="" width="100" height="100">
                    <div class="lateral-info">
                        <h3 class="title">PARTICIPACIÓN</h3>
                        <p class="t-muted">Has subido
                            <?= $user->getKernelCount() ?>
                            kernels.
                        </p>
                        <p class="t-muted">Has ejecutado
                            <?= $user->getMsCrunched() ?>
                            ms.
                        </p>
                    </div>
                </div>
                <div class="section section-h">
                    <?php require("includes/src/vistas/token_big_info.php")?>
                </div>
                <div class="section">
                    <h3 class="title">HISTORIAL DE EJECUCIONES</h3>
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
                <div id="last-kernels" class="section">
                    <h3 class="title">TUS ÚLTIMOS KERNELS</h3>
                    <div class="kernels">
                        <?php if(sizeof($kernels = $user->getKernels()) > 0): ?>
                            <!-- <p>Hay al menos un kernel</p> -->
                            
                            <?php
                            $kernels = array_slice($kernels, 0, 3);
                            foreach ($kernels as $k) {
                                $kName = $k->getname();
                                $kRunState = $k->getis_finished();
                                echo <<<HTML
                                    <div class="upload-k">
                                        <h4 class="k-title">$kName</h4>
                                        <span class="button c-green">$kRunState</span>
                                    </div>
                                HTML;
                            }
                            ?>
                        <?php else: ?>
                            <p>Todavía no has subido kernels.<p>
                        <?php endif ?>
                    </div>
                    <button type="button" class="button c-h-blue" onclick="location.href='your_kernels.php'">Ver más kernels</button>
                </div>
            </div>
        </div>
    </div>
    <?php require("includes/src/vistas/user_nav_bar.php") ?>
</body>

</html>