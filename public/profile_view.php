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
            <div class="section">
                <img src="https://picsum.photos/100/100" alt="" width="100">
                <h3><?= $user->getName() ?></h3>
            </div>
            <div class="sections-container">
                <div class="section">
                    <img src="https://picsum.photos/100/100" alt="" width="100">
                    <h3>PARTICIPACIÓN</h3>
                    <p>Has subido
                        <?= $user->getKernelCount() ?> kernels.
                    </p>
                    <p>Has ejecutado
                        <?= $user->getMsCrunched() ?> ms.
                    </p>
                </div>
                <div class="section">
                    <h3>TOKENS</h3>
                    <button type="button">+</button>
                    <p>
                        <?= $user->getTockens() ?>
                    </p>
                    <img src="https://picsum.photos/100/100" alt="" width="100">
                </div>
            </div>
            <div class="section">
                <h3>KERNELS SUBIDOS</h3>
                <div class="search-panel">
                    <form action="">
                        <div class="search-main-panel">
                            <input class="input-field" type="text" name="" id="" placeholder="Buscar...">
                            <button class="button c-h-blue" type="submit">Buscar</button>
                        </div>
                        <div class="search-option-panel">
                            <button class="button c-h-blue" type="button">Filtrar</button>
                            <select name="cars" id="cars">
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
                </div>
                <div class="execution-history">
                </div>
            </div>
            <div class="section">
                <h3>ÚLTIMAS EJECUCIONES</h3>
                <div class="last-kernels">

                </div>
                <button class="button c-h-blue" type="button">Ver más kernels</button>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>
</html>