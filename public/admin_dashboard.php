<?php
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/admin_dashboard.css">
</head>
<body>
    <?php require("includes/src/vistas/user_nav_bar.php") ?>
    <?php require("includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
    <?php if(!\parallelize_namespace\Usuario::buscaUsuario($_SESSION['user_email'])->getIsAdmin()): ?>
        <h2>No tienes rol de administrador.</h2>
    <?php else: ?>
        <div id="user-panel">
            <div class="header">
                <img src="./<?= RUTA_SVG ?>/admin_big_i.svg" alt="" width="44">
                <h2>ADMIN DASHBOARD</h2>
            </div>
            <div class="sections-container">
                <div class="section">
                    <h3 class="title">LISTA DE USUARIOS</h3>
                    <div class="user-list">
                        <?php
                        $allUsers = \parallelize_namespace\Usuario::getTodosLosUsuarios();
                        foreach($allUsers as $user) {
                        ?>
                            <div id="user-<?= hash("md5",$user->getEmail()); ?>" class="user">
                                <div class="user-main-info" onclick="location.href = 'profile_view.php?id=<?= $user->getEmail() ?>'">
                                    <img class="circle-border obj-fit-cover"
                                        src="<?= $user->getPicUrl() ?>" alt="profile pic" width="50" height="50">
                                    <div class="user-data">
                                        <p class="username no-margin"><?= $user->getName() ?></p>
                                        <p class="t-muted no-margin"><?= $user->getEmail() ?></p>
                                    </div>
                                </div>
                                <div class="options">
                                    <button class="report-b small-button c-h-b-blue" onclick="document.querySelector('#user-<?= hash('md5',$user->getEmail()) ?> > .user-reports').classList.toggle('closed')">
                                        10 <img src="<?= RUTA_SVG ?>/report_i.svg" alt="" width="16">
                                    </button>
                                    <button class="block-b small-button c-h-b-blue" onclick="location.href='bloquear.php?id=<?= $user->getEmail() ?>'">
                                        <?php
                                        if($user->getBlocked()){
                                            echo "Desbloquear";
                                        }
                                        else {
                                            echo "Bloquear";
                                        }
                                        ?>
                                    </button>
                                    <button class="small-button c-red" onclick="location.href='eliminar_usuario.php?id=<?= $user->getEmail() ?>'">Eliminar</button>
                                </div>
                                <div class="user-reports closed">
                                    <h3 class="user-reports-title">Denuncias</h3>
                                    <div class="user-report">
                                        <div class="header">
                                            <p class="username no-margin"><?= $user->getName() ?></p>
                                            <p class="username no-margin">Kernel#1</p>
                                        </div>
                                        <div class="body">
                                            <p class="no-margin t-m-white">
                                                Lorem ipsum dolor sit amet consectetur 
                                                adipisicing elit. Eius in, culpa et enim 
                                                doloribus sit, autem esse fugit hic delectus
                                                minus eligendi, suscipit dolorem debitis
                                                molestias iste iusto ea mollitia?
                                            </p>
                                            <p class="date no-margin t-m-white">12:00 1 abril 2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>
</html>