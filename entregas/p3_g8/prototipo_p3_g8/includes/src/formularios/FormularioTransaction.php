<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';

class FormularioTransaction extends Formulario
{
    private bool $withdraw;

    protected function generaCamposFormulario(&$datos = array())
    {

        $val_token_delta = isset($datos['token_delta']) ? $datos['token_delta'] : '';
        $button_text = $this->withdraw? 'Retirar Tokens': 'Ingresar Tokens';
        return generaErroresGlobalesFormulario($this->errores) . <<<HTML
        <label for='token_delta'>Volumen de tokens</label>
        <input id='token_delta' class='input-field' type='text' name='token_delta' placeholder='123' value="$val_token_delta" required>
        HTML . generarError('token_delta', $this->errores) . <<<HTML
        
        <button id='create-acc-button' class='button c-h-blue' type='submit' title='Pedir' name='Pedir'>$button_text</button>

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
        $tokens = $this->withdraw? $usuario->gettokens() - $token_delta: $usuario->gettokens() + $token_delta;
        
        if ($tokens < 0) {
            $this->errores['token_delta'] = 'Debes tener suficiente dinero!';
        }

        if (count($this->errores) === 0) {
            echo $token_delta . ":" . $tokens;
            $usuario->setTokens($tokens);
            \parallelize_namespace\Transaction::submit($this->withdraw? -$token_delta: $token_delta, $_SESSION["user_email"], "movimiento bancario", $usuario->gettokens());
        }

    }

    public function __construct(bool $withdraw)
    {
        parent::__construct(0, array('action' => ($withdraw? './token_transaction.php?withdraw=true': './token_transaction.php'),
            'method' => 'POST', 'urlRedireccion' => './wallet.php'));
        $this->withdraw = $withdraw;
    }
}