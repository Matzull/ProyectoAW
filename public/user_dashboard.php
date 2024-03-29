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
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_dashboard.css">
</head>

<body>
    <?php require("includes/src/vistas/user_nav_bar.php") ?>
    <?php require("includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div id="user-panel">
            <div class="header">
                <img src="./<?= RUTA_SVG ?>/Dashboard_i.svg" alt="" width="44">
                <h2>DASHBOARD</h2>
            </div>
            <div class="sections-container">
                <div class="section section-h">
                    <div class="ranking circle-border c-h-blue">
                        <?= $user->getRanking() ?>
                    </div>
                    <!-- <img class="circle-border" src="https://picsum.photos/100/100" alt="" width="100" height="100"> -->
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
                    <?php require("includes/src/vistas/token_big_info.php") ?>
                </div>
                <div id="last-kernels" class="section">
                    <h3 class="title">TUS ÚLTIMOS KERNELS</h3>
                    <div class="kernels">
                        <?php if (sizeof($kernels = $user->getKernels()) > 0): ?>
                            <!-- <p>Hay al menos un kernel</p> -->

                            <?php
                            $kernels = array_slice($kernels, 0, 3);
                            foreach ($kernels as $k) {
                                $kName = $k->getname();
                                $kRunState = $k->is_finished() ? "Terminado": "Corriendo";
                                $kId = $k->getid();
                                echo <<<HTML
                                    <div class="upload-k"  onclick="location.href='kernel_info.php?id=$kId'">
                                        <h4 class="k-title">$kName</h4>
                                        <span class="button c-green">$kRunState</span>
                                    </div>
                                HTML;
                            }
                            ?>
                        <?php else: ?>
                            <p>Todavía no has subido kernels.
                            <p>
                            <?php endif ?>
                    </div>
                    <button type="button" class="button c-h-blue" onclick="location.href='your_kernels.php'">Ver más
                        kernels</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>