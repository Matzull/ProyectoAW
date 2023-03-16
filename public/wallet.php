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
    <link rel="stylesheet" href="css/wallet.css">
</head>

<body>
    <?php require_once("./includes/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div class="user-panel">
            <div class="header">
                <img src="./svg/Wallet_i.svg" alt="" width="44">
                <h2>CARTERA</h2>
            </div>
            <div class="sections-container">
                <div class="section section-h">
                    <div class="lateral-info">
                        <h3 class="title">TUS TOKENS</h3>
                        <button type="button">+</button>
                        <p><?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getTockens() ?></p>
                    </div>
                    <img class="circle-border" src="https://picsum.photos/100/100" alt="" width="100" height="100">
                </div>
                <div class="section">
                    <img src="https://picsum.photos/150/150" alt="" width="100">
                </div>
                <div class="section">
                    <h3 class="title">GRÁFICA DE MOVIMIENTOS</h3>
                    <h3 class="title">HISTORIAL DE MOVIMIENTOS</h3>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("./includes/vistas/user_nav_bar.php") ?>

</body>

</html>