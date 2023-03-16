<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';

class FormularioTransation extends Formulario
{
    protected function generaCamposFormulario(&$datos = array())
    {

        $val_token_delta = isset($datos['token_delta']) ? $datos['token_delta'] : '';

        return generaErroresGlobalesFormulario($this->errores) . <<<HTML
        <div>
        <label for = 'token_delta'>Volumen de tokens</label>
        <input id = 'token_delta' class = 'input-field' type = 'text' name = 'token_delta' placeholder = '123' value = "$val_token_delta" required>
        HTML . generarError('token_delta', $this->errores) . <<<HTML

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
            $this->errores[] = 'Debes haberte identificado';
        }
        $usuario = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);

        if ($usuario->getTockens() + $token_delta < 0) {
            $this->errores['token_delta'] = 'Debes tener suficiente dinero!';
        }

        if (count($this->errores) === 0) {
            echo $token_delta . ":" . $usuario->getTockens() + $token_delta;
            $usuario->setTokens($usuario->getTockens() + $token_delta);
            \parallelize_namespace\Transaction::submit($token_delta, $_SESSION["user_email"], "movimiento bancario", $usuario->getTockens());
        }

    }

    public function __construct()
    {
        parent::__construct(0, array('action' => './token_transaction.php', 'method' => 'POST', 'urlRedireccion' => './wallet.php'));
    }
}