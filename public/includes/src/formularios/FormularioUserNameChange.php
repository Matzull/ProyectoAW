<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';

class FormularioUserNameChange extends Formulario
{
    protected function generaCamposFormulario(&$datos = array())
    {
        $val_nombreUsuario = isset($datos['user_name']) ? $datos['user_name'] : \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getName();

        return generaErroresGlobalesFormulario($this->errores) . <<<HTML
        <label class="settings-label" for='user_name'>Nombre de usuario</label>
        <div class="field-button">
        <input id='user_name' class='input-field' type='text' name='user_name' placeholder='Escribe tu correo' value="$val_nombreUsuario" required>
        HTML . generarError('user_name', $this->errores) . <<<HTML

        <button id='login-button' class='button c-h-blue' type='submit'>Cambiar</button>
        </div>
        HTML;
    }

    protected function procesaFormulario(&$datos)
    {
        $nombreUsuario = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$nombreUsuario || empty($nombreUsuario = trim($nombreUsuario))) {
            $this->errores['user_name'] = 'El nombre de usuario no puede estar vacío';
        }


        if (count($this->errores) === 0) {
            $usuario = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
            $usuario->setName($nombreUsuario);

        }

    }

    public function __construct()
    {
        parent::__construct(0, array('action' => './settings.php', 'method' => 'POST', 'urlRedireccion' => './settings.php'));
    }
}