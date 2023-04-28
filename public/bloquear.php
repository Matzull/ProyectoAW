<?php
require_once 'includes/config.php';
if(isset($_GET['id']) && \parallelize_namespace\Usuario::buscaUsuario($_SESSION['user_email'])->getIsAdmin()){
    \parallelize_namespace\Usuario::toggleBlocked($_GET['id']);
    header("location: admin_dashboard.php");
}

?>