<?php
require '/includes/config.php';

$db = false;
function conectar()
{
    $db = @mysqli_connect(BD_HOST, BD_USER, BD_PASS, BD_NAME);
    if ($db) {
        // echo "Conexíon realizada correctamente.<br />";
        // echo "Informacíon sobre el servidor:",
        //     mysqli_get_host_info($db), "<br />";
        // echo "Versíon del servidor:",
        //     mysqli_get_server_info($db), "<br />";
    } else {
        printf(
            "Error!! %d:%s. Intente conectarse en unos minutos y en caso de persistir por favor contacte con un administrador<br />",
            mysqli_connect_errno(),
            mysqli_connect_error()
        );
    }
    return $db;
}

function desconectar()
{
    if ($db) {
        $ok = @mysqli_close($db);
        if ($ok) {
            echo "Desconexíon realizada correctamente.<br />";
            $db = false;
        } else {
            echo "Fallo en la desconexíon.<br />";
        }
    } else {
        echo "[DEBUG]: Conexíon no abierta.<br />";
    }
}

function check_if_email_is_in_use($email)
{
    $sql = "SELECT user_mail from users where user_mail = \"" . $email . "\"";
    return isset(mysqli_fetch_assoc(mysqli_query($db, $sql)));
}

function register_new_user($user_email, $user_password, $user_name){
    $sql = "INSERT INTO users (user_email, user_password, user_name) VALUES (\"".$user_email."\",\"". $user_password."\",\"".$user_name."\"); ";
}