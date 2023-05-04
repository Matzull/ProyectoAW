<?php
require 'includes/config.php';

if (!isset($_SESSION['user_email'])) {
    header("location: login.php");
    die();
}

$formulario = new \parallelize_namespace\formulario\FormularioUserNameChange();
$formulario_html = $formulario->gestiona();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/settings.css">
</head>

<body>
    <?php require_once("./includes/src/vistas/user_nav_bar.php") ?>
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div id="user-panel">
            <div class="header">
                <img src="./<?= RUTA_SVG ?>/Settings_i.svg" alt="" width="44">
                <h2>AJUSTES</h2>
            </div>
            <div class="sections-container">
                <div class="section">
                    <div class="section-row">

                        <div class="section-content">
                            <h2 class="title">Nombre de Usuario</h2>
                            <div>
                                <?= $formulario_html ?>
                            </div>
                        </div>
                        <div class="section-content">
                            <h2 class="title">Acceder al perfil</h2>
                            <button class="button c-h-blue"
                                onclick="location.href='profile_view.php?id=<?= $_SESSION['user_email'] ?>'">
                                Ver perfil como un tercero
                            </button>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

</body>

</html>