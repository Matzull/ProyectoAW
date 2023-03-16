<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';

class FormularioLogin extends Formulario
{
    protected function generaCamposFormulario(&$datos = array())
    {

        $val_nombreUsuario = isset($datos['user_email']) ? $datos['user_email'] : '';
        $val_password = isset($datos['user_password']) ? $datos['user_password'] : '';

        return generaErroresGlobalesFormulario($this->errores) . <<<HTML
        <label for = 'user_email'>E-mail</label>
        <input id = 'user_email' class = 'input-field' type = 'text' name = 'user_email' placeholder = 'Escribe tu correo' value = "$val_nombreUsuario" required>
        HTML . generarError('user_email', $this->errores) . <<<HTML

        <label for = 'user_password'>Contraseña</label>
        <input id = 'user_password' class = 'input-field' type = 'password' name = 'user_password' placeholder = 'Escribe tu contraseña' value = "$val_password"
        required>
        HTML . generarError('user_password', $this->errores) . <<<HTML

        <div class = 'form-options'>
        <div>
        <input type = 'checkbox' name = 'remember_me' id = 'remember_me' value = 'false'>
        <label for = 'remember_me'>Recuérdame</label>
        </div>
        <a href = ''>¿Has olvidado tu contraseña?</a>
        </div>
        <button id = 'login-button' class = 'button c-h-blue' type = 'submit' title = 'Ingresar' name = 'Ingresar'>Iniciar Sesión</button>

        HTML;
    }

    protected function procesaFormulario(&$datos)
    {
        $nombreUsuario = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$nombreUsuario || empty($nombreUsuario = trim($nombreUsuario))) {
            $this->errores['user_email'] = 'El nombre de usuario no puede estar vacío';
        }

        $password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$password || empty($password = trim($password))) {
            $this->errores['user_password'] = 'El password no puede estar vacío.';
        }

        if (count($this->errores) === 0) {
            $usuario = \parallelize_namespace\Usuario::login($nombreUsuario, $password);

            if ($usuario) {
                $_SESSION['user_email'] = $usuario->getEmail();
                    // TODO checkbox recuerdame
            } else {
                $this->errores[] = 'usuario o contraseña incorrectos';
            }

        }

    }

    public function __construct()
    {
        parent::__construct(0, array('action' => './login.php', 'method' => 'POST', 'urlRedireccion' => './user_dashboard.php'));
    }
}