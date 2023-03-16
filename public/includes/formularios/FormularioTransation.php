<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';

class FormularioTransation extends Formulario
{
    protected function generaCamposFormulario(&$datos = array())
    {

        $val_token_delta = isset($datos['token_delta']) ? $datos['token_delta'] : '';

        return generaErroresGlobalesFormulario($this->errores) . <<<HTML

        <label for = 'token_delta'>Delta de tokens</label>
        <input id = 'token_delta' class = 'input-field' type = 'text' name = 'token_delta' placeholder = 'Escribe tu nombre de usuario' value = "$val_token_delta" required>
        HTML . generarError('token_delta', $this->errores) . <<<HTML

        </div>
        </div>
        <button id = 'create-acc-button' class = 'button c-h-blue' type = 'submit' title = 'Pedir' name = 'Pedir'>Pedir transacción</button>

        HTML;
    }

    protected function procesaFormulario(&$datos)
    {
        $token_delta = filter_input(INPUT_POST, 'token_delta', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$token_delta || empty($token_delta = trim($token_delta))) {
            $this->errores['token_delta'] = 'Debes poner algo en este campo';
        }

        if (!isset($_SESSION["user_email"])) {
            $this->errores['terms'] = 'Debes haberte identificado';
        }

        if (count($this->errores) === 0) {
            $usuario = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
            $usuario->setTokens($usuario->getTockens() + $token_delta);
        }

    }

    public function __construct()
    {
        parent::__construct(0, array('action' => './register.php', 'method' => 'POST', 'urlRedireccion' => './user_dashboard.php'));
    }
}