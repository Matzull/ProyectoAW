<?php

namespace parallelize_namespace;

require_once "includes/config.php";

class FormularioLogin extends Formulario
{
    protected function generaCamposFormulario(&$datos = array())
    {

        $val_user_name = isset($datos["user_name"]) ? $datos["user_name"] : "";
        $val_user_email = isset($datos["user_email"]) ? $datos["user_email"] : "";
        $val_user_password = isset($datos["user_password"]) ? $datos["user_password"] : "";
        $val_user_password_conf = isset($datos["user_password_conf"]) ? $datos["user_password_conf"] : "";

        return generaErroresGlobalesFormulario($this->errores) . <<<EOS

            <label for="user_name">Nombre de usuario</label>
                <input id="user_name" class="input-field" type="text" name="user_name" placeholder="Escribe tu nombre de usuario" value="$val_user_name"
                required>
EOS . generarError('user_name', $this->errores) . <<<EOS

            <label for="user_email">E-mail</label>
                <input id="user_email" class="input-field" type="text" name="user_email" placeholder="Escribe tu correo" value="$val_user_email" required>
EOS . generarError('user_email', $this->errores) . <<<EOS

            <label for="user_password">Contraseña</label>
                <input id="user_password" class="input-field" type="password" name="user_password" placeholder="Escribe tu contraseña" value="$val_user_password" required>
EOS . generarError('user_password', $this->errores) . <<<EOS

            <label for="user_pass_conf">Confirmar la contraseña</label>
                <input id="user_pass_conf" class="input-field" type="password" name="user_pass_conf" placeholder="Vuelve a escribir la contraseña" value="$val_user_password_conf"
                required>
EOS . generarError('user_pass_conf', $this->errores) . <<<EOS
            
                <div class="form-options">
                <div>
                    <input type="checkbox" name="terms" id="terms" value="accepted">
                    <label for="terms">Acepto los términos y condiciones</label>
EOS . generarError('terms', $this->errores) . <<<EOS

                </div>
            </div>
            <button id="create-acc-button" class="button c-h-blue" type="submit" title="CrearCuenta" name="CrearCuenta">Crear
                Cuenta</button>


EOS;
    }

    protected function procesaFormulario(&$datos)
    {
        $terms = filter_input(INPUT_POST, 'terms', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$terms || empty($terms = trim($terms))) {
            $this->errores['terms'] = 'Debes aceptar los terminos y condiciones';
        }

        $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$user_email || empty($user_email = trim($user_email))) {
            $this->errores['user_email'] = 'El email no puede estar vacío.';
        }

        $user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$user_name || empty($user_name = trim($user_name))) {
            $this->errores['user_name'] = 'El nombre de usuario no puede estar vacío.';
        }

        $user_pass_conf = filter_input(INPUT_POST, 'user_pass_conf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$user_pass_conf || empty($user_pass_conf = trim($user_pass_conf))) {
            $this->errores['user_pass_conf'] = 'La confirmación de contraseña no puede estar vacía.';
        }

        $user_password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$user_password || empty($user_password = trim($user_password))) {
            $this->errores['user_password'] = 'La contraseña no puede estar vacío.';
        }



        // check passwords match

        if ($_REQUEST["user_password"] != $_REQUEST["user_pass_conf"]) {
            $this->errores['user_pass_conf'] = 'Las contraseñas no coinciden';
        }

        // check password size

        if (strlen($_REQUEST["user_password"]) < 8) {
            $this->errores['user_pass'] = 'La contraseña debe medir mas de 8 caracteres';
        }

        // check user doesnt exist
        if (count($this->errores) === 0) {
            $usuario = \parallelize_namespace\Usuario::crea($user_email, $user_name, $user_password);

            if ($usuario) {
                // Start the session
                $_SESSION["user"] = $usuario; // TODO checkbox recuerdame
            } else {
                $this->errores[] = "Ese email ya está registrado.";
            }
        }

    }

    public function __construct()
    {
        parent::__construct(0, array('action' => "./register.php", 'method' => 'POST', 'urlRedireccion' => "./user_dashboard.php"));
    }
}