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
    <?php require_once("./includes/src/vistas/user_nav_bar.php") ?>
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div id="user-panel">
            <div class="header">
                <img src="./<?= RUTA_SVG ?>/Kernels_i.svg" alt="" width="44">
                <h2>TUS KERNELS</h2>
            </div>
            <div class="sections-container">
                <!-- <div class="vertical"> -->
                <div class="section">
                    <!-- <h3 class="title">HISTORIAL DE EJECUCIONES</h3> -->
                    
                    <div class="execution-history">
                        <?php
                        $user = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
                        $kernels = $user->getKernels();
                        $kernel_n = sizeof($kernels);
                        echo '<p class="comment">Se han encontrado ' . $kernel_n . ' kernels</p>';
                        if ($kernel_n > 0): ?>
                            <?php
                            foreach ($kernels as $k) {
                                $kName = $k->getname();
                                $kRunState = $k->is_finished() ? "Terminado" : "Corriendo";
                                $kId = $k->getid();
                                $kDate = $k->getupload_time();
                                echo <<<HTML
                                <div class="kernels">
                                    <div class="upload-k"  onclick="location.href='kernel_info.php?id=$kId'">
                                        <h4 class="k-title">$kName</h4>
                                        <div class="kern-info">
                                            <p class="no-margin">Kernel uploaded in $kDate </p>  
                                            <div class="button c-green">$kRunState</div>
                                        </div>
                                    </div>
                                </div>
                            HTML;
                            }
                            ?>
                        <?php else: ?>
                            <p>Todavía no has subido kernels.
                            <p>
                            <?php endif ?>
                    </div>
                </div>
                <!-- </div> -->
                <div class="section vertical-restriction">
                    <h3 class="title">SUBIR KERNEL</h3>
                    <div id="upload-panel">
                        <img src="<?= RUTA_SVG ?>/Kernels_big_i.svg" alt="">
                        <button class="circular-button button c-h-blue" onclick="location.href='subirKernel.php'">
                            <img src="<?= RUTA_SVG ?>/Plus_i.svg" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>