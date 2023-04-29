<?php
require_once 'includes/config.php';
if (!isset($_SESSION['user_email'])){
    header("location: login.php");
    die();
}
$is_admin = \parallelize_namespace\Usuario::buscaUsuario($_SESSION['user_email'])->getIsAdmin();
if(isset($_GET['id']) && $is_admin){
    if (\parallelize_namespace\Usuario::toggleBlocked($_GET['id']) === true){
        header("location: admin_dashboard.php");
        die();
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloquear usuario</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/index.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">
</head>
<body>
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <?php if($is_admin): ?>
            <h3>ERROR: No se ha podido bloquear al usuario.</h3>
        <?php else: ?>
            <h3>ERROR: No tienes permisos de administrador</h3>
        <?php endif; ?>
    </div>
    <?php require("./includes/src/vistas/footer.php"); ?>
</body>
</html>