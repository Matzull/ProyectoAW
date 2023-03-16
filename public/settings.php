<?php
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
    <link rel="stylesheet" href="css/settings.css">
</head>

<body>
    <?php require_once("./includes/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div id="user-panel">
            <div class="header">
                <img src="./svg/Settings_i.svg" alt="" width="44">
                <h2>AJUSTES</h2>
            </div>
            <div class="sections-container">
                <div class="section">
                    <div class="section-row">
                        <div class="section-content">
                            <h2>Mi foto de Perfil</h2>
                            <div>
                            <img class="circle-border" src="https://picsum.photos/100/100" alt="" width="100" height="100">
                                <div>
                                    <button class="button c-h-blue" type="button">Cambiar Foto</button>
                                    <button class="button c-h-b-blue" type="button">Cambiar Foto</button>
                                </div>
                            </div>
                        </div>
                        <div class="section-content">
                            <h2>Nombre de Usuario</h2>
                            <div>
                                <input class="input-field" type="text" name="" id="" value="NombreDeUsuario" disabled>
                                <button class="button c-h-blue" type="button">Editar</button>
                                <button class="button c-h-b-blue" type="button">Utilizar Mi Nombre Real</button>
                            </div>
                        </div>
                    </div>
                    <div class="section-row">
                        <div class="section-content">
                            <h2>Mis Datos Personales</h2>
                            <h3>Nombre</h3>
                            <input class="input-field" type="text" name="" id="" value="Nombre" disabled>
                            <button class="button c-h-blue" type="button">Editar</button>
                            <h3>Apellidos</h3>
                            <input class="input-field" type="text" name="" id="" value="Apellidos" disabled>
                            <button class="button c-h-blue" type="button">Editar</button>
                            <h3>Correo electrónico</h3>
                            <input class="input-field" type="text" name="" id="" value="example@gmail.com" disabled>
                            <button class="button c-h-blue" type="button">Editar</button>
                            <h3>Método de pago</h3>
                            <button class="button c-h-blue" type="button">Mostrar información de pago</button>
                        </div>
                        <div class="section-content">
                            <h2>Opciones</h2>
                            <h3>Opciones del perfil público</h3>
                            <input type="checkbox" name="" id="show-real-name">
                            <label for="show-real-name">Mostrar mi nombre real</label>
                            <input type="checkbox" name="" id="show-my-wallet">
                            <label for="show-my-wallet">Mostrar mi cartera</label>
                            <button class="button c-h-blue" type="button" onclick="location.href='profile_view.php?id=<?= $_SESSION['user_email'] ?>'">
                                Ver perfil como un tercero
                            </button>
                            <h3>Otras opciones</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("./includes/vistas/user_nav_bar.php") ?>

</body>

</html>