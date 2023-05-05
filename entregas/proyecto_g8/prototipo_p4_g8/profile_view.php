<?php
namespace parallelize_namespace;

require 'includes/config.php';

define('ERROR_MSG', 'Usuario no encontrado');
if (!isset($_GET['id']) || 
    ($user = Usuario::buscaUsuario($_GET['id'])) === false) {
    $profile_msg = ERROR_MSG;
}
else{
    $profile_msg = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $profile_msg ?></title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="./<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="./<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="./<?= RUTA_CSS ?>/profile_view.css">
</head>
<body>
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
    <?php if(strcmp($profile_msg, ERROR_MSG) == 0): ?>
        <h1><?= $profile_msg ?></h1>
    <?php else: ?>
        <div class="sections-container">
            <div class="section section-h">
                <img class="circle-border" src="img/default_profile_pic.png" alt="Profile Photo" width="200" height="200">
                <div class="lateral-info">
                    <h3><?= $user->getName() ?></h3>
                    <h3 class="t-muted"><?= $user->getEmail() ?></h3>
                </div>
            </div>
            <div class="ranking-token-sec sections-container">
                <div class="section section-h">
                    <div class="ranking circle-border c-h-blue">
                        <?= $user->getRanking() ?>
                    </div>
                    <div class="lateral-info">
                        <h3 class="title">PARTICIPACIÓN</h3>
                        <p class="t-muted">Has subido
                            <?= $user->getKernelCount() ?> kernels.
                        </p>
                        <p class="t-muted">Has ejecutado
                            <?= $user->getMsCrunched() ?> ms.
                        </p>
                    </div>
                </div>
                <div class="section section-h">
                    <div class="lateral-info">
                        <h3 class="title">TOKENS</h3>
                        <div class="flex-between">
                            <div></div>
                            <h3 class="t-big no-margin">
                                <?= $user->gettokens() ?>
                            </h3>
                        </div>
                    </div>
                    <img src="<?= RUTA_SVG ?>/Token_i.svg" alt="" width="100" height="100">
                </div>
            </div>
            <div class="section">
                <h3 class="title">KERNELS SUBIDOS</h3>
                <div class="uploaded-kernels">
                    <?php
                        $kernels = $user->getKernels();
                        $kernel_n = sizeof($kernels);
                    ?>
                    <?php if($kernel_n > 0): ?>
                        <p class="t-muted">Se han encontrado <?= $kernel_n ?> kernels</p>
                        <div class="kernels">
                        <?php
                        foreach ($kernels as $k) {
                            $kName = $k->getname();
                            $kRunState = $k->is_finished() ? "Terminado" : "Corriendo";
                            $kId = $k->getid();
                            $kDate = $k->getupload_time();
                        ?>
                            <div class="kernel" onclick="location.href='kernel_info.php?id=<?= $kId ?>'">
                                <h4 class="k-title"><?= $kName?></h4>
                                <div class="kern-info">
                                    <p class="no-margin">Kernel uploaded in <?= $kDate ?></p>  
                                    <div class="button c-green"><?= $kRunState ?></div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    <?php else: ?>
                        <p>Todavía no has subido kernels.</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>
</html>