<?php

require "../utilities/db_bind.php";
require "../utilities/redirect.php";


// check terms are accepted

if ($_REQUEST["terms"] != "accepted") {
    redirect("/register.php?err=Debes aceptar los terminos y condiciones");
}

// check passwords match

if ($_REQUEST["user_password"] != $_REQUEST["user_pass_conf"]) {
    redirect("/register.php?err=Las contraseñas no coinciden");
}

// check password size

if (strlen($_REQUEST["user_password"]) < 8) {
    redirect("/register.php?err=La contraseña debe medir mas de 8 caracteres");
}

conectar_db();
// check user doesnt exist

if (check_if_email_is_in_use($_REQUEST["user_email"])) {
    desconectar_db();
    redirect("/register.php?err=Email ya registrado");
}

// register user
register_new_user($_REQUEST["user_email"], $_REQUEST["user_password"], $_REQUEST["user_name"]);

desconectar_db();
redirect("/login.php?msg=Creación de cuenta correcta.¡Prueba a entrar por primera vez!");