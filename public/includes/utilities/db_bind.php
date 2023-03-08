<?php
require '../config.php';

$db = false;
function conectar_db()
{
    global $db;
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

function desconectar_db()
{
    global $db;
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

function check_if_email_is_in_use($user_email)
{
    global $db;
    if ($db) {
        $sql = "SELECT user_email from users where user_email = \"" . $user_email . "\"";
        $row = mysqli_fetch_assoc(mysqli_query($db, $sql));
        return isset($row);
    }else{
        echo "conection isnt open";
    }
}

function register_new_user($user_email, $user_password, $user_name)
{
    global $db;
    if ($db) {
        $sql = "INSERT INTO users (user_email, user_password, user_name) VALUES (\"" . $user_email . "\",\"" . password_hash($user_password,PASSWORD_BCRYPT) . "\",\"" . $user_name . "\"); ";
        mysqli_query($db, $sql);
    }else{
        echo "conection isnt open";
    }
}

function check_credentials($user_email, $user_password)
{
    global $db;
    if ($db) {
        $sql = "SELECT user_password from users where user_email = \"" . $user_email . "\"";
        return password_verify($user_password, mysqli_fetch_assoc(mysqli_query($db, $sql))["user_password"]);
    }else{
        echo "conection isnt open";
    }
}

?>