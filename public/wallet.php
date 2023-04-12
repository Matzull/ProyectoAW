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
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/wallet.css">
</head>

<body>
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <div id="user-panel">
            <div class="header">
                <img src="./<?= RUTA_SVG ?>/Wallet_i.svg" alt="" width="44">
                <h2>CARTERA</h2>
            </div>
            <div class="sections-container">
                <div class="section section-h">
                    <?php require("includes/src/vistas/token_big_info.php") ?>
                </div>
                <div class="section section-h take-out">
                    <div id="hammer-div">
                        <img src="img\hammer-icon-8080.png" class="inverted" alt="" width="100">
                        <button class="button c-h-blue" onclick="location.href='token_transaction.php?withdraw=true'">Retirar Dinero</button>
                    </div>
                    <img src="img\piggy_bank_PNG47.png" alt="" width="100" id="piggy">
                </div>
                <div class="section">
                    <h3 class="title">GRÁFICA DE MOVIMIENTOS</h3>
                    <?php
                    require("includes/src/vistas/transaction_graph.php");
                    ?>
                    <h3 class="title">HISTORIAL DE MOVIMIENTOS</h3>
                    <?php
                    require("includes/src/vistas/transaction_table.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("./includes/src/vistas/user_nav_bar.php") ?>

</body>

</html>