<?php require_once 'includes/config.php';?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>

    <link rel="stylesheet" href="<?= RUTA_CSS ?>/token_transaction.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/contacto.css">
</head>

<body>
    <div class="main-container">
    <?php if(!isset($_SESSION["user_email"])): ?>
        <p>Debes haberte identificado</p>
    <?php else: ?>
        <?php 
            $usuario = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
            $t = $usuario->gettokens();
            $formulario = new \parallelize_namespace\formulario\FormularioTransaction(isset($_GET['withdraw']) && $_GET['withdraw'] == 'true');
        ?>
        <div class="form-container">
            <div class="form">
                <h2 class="title">Tokens</h2>
                <p class="subtitle t-muted">Actualmente tienes <?= $t ?> tokens</p>
                <?= $formulario->gestiona()  ?>
            </div>
        </div>
    <?php endif; ?>
    </div>
</body>


</html>