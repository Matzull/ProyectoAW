<?php
session_start();

require "../utilities/db_bind.php";
require "../utilities/redirect.php";

conectar_db();

if (check_credentials($_REQUEST["user_email"], $_REQUEST["user_password"])) {
    // Start the session
    $_SESSION["user_email"] = $_REQUEST["user_email"];
    desconectar_db();
    redirect("/user_dashboard.php");
} else {
    redirect("/login.php?err=El usuario o contraseña son incorrectos");
}

desconectar_db();