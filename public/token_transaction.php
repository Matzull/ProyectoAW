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
    <?php if(!isset($_SESSION["user_email"])): ?>
        <div class="main-container">
            <p>Debes haberte identificado</p>
        </div>
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
                <p class="subtitle t-muted">Esta pantalla simula una pasarela de pago, para simular entrada de dinero introduce un numero positivo, para simular la retirada introduce un numero negativo</p>
                <?= $formulario->gestiona()  ?>
            </div>
        </div>
    <?php endif; ?>

</body>


</html>