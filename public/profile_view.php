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
    <link rel="stylesheet" href="./css/nav_bar.css">
    <link rel="stylesheet" href="./css/user_nav_bar.css">
    <link rel="stylesheet" href="./css/profile_view.css">
</head>
<body>
    <?php require_once("./includes/vistas/nav_bar.php") ?>
    <div class="main-container">
    <?php if(strcmp($profile_msg, ERROR_MSG) == 0): ?>
        <h1><?= $profile_msg ?></h1>
    <?php else: ?>
        <div class="sections-container">
            <div class="section section-h">
                <img class="circle-border" src="https://picsum.photos/200/200" alt="" width="200" height="200">
                <div class="lateral-info">
                    <h3><?= $user->getName() ?></h3>
                    <h3 class="t-muted"><?= $user->getEmail() ?></h3>
                </div>
            </div>
            <div class="sections-container">
                <div class="section section-h">
                    <img class="circle-border" src="https://picsum.photos/100/100" alt="" width="100" height="100">
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
                                <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getTockens() ?>
                            </h3>
                        </div>
                    </div>
                    <img src="svg/Token_i.svg" alt="" width="100" heigh="100">
                </div>
            </div>
            <div class="section">
                <h3 class="title">KERNELS SUBIDOS</h3>
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
                <div class="uploaded-kernels">
                </div>
            </div>
            <div class="section">
                <h3 class="title">ÚLTIMAS EJECUCIONES</h3>
                <div class="last-kernels">

                </div>
                <button class="button c-h-blue" type="button">Ver más kernels</button>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>
</html>