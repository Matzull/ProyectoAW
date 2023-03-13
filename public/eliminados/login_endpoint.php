<?php
session_start();

require "../utilities/db_bind.php";
require "../utilities/redirect.php";

conectar_db();

if (check_credentials($_REQUEST["user_email"], $_REQUEST["user_password"])) {
    // Start the session
    $_SESSION["user_email"] = $_REQUEST["user_email"]; // TODO checkbox recuerdame
    desconectar_db();
    redirect("/user_dashboard.php");
} else {
    echo password_hash($_REQUEST["user_password"],PASSWORD_BCRYPT);
    //redirect("/login.php?err=El usuario o contraseña son incorrectos");
}

desconectar_db();