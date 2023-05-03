<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';

class FormularioContacto extends Formulario
{
    protected function generaCamposFormulario(&$datos = array())
    {

        $val_user_comment = isset($datos['user_comment']) ? $datos['user_comment'] : '';

        return generaErroresGlobalesFormulario($this->errores) . <<<HTML
        <div class="comment-type">
            <div>
                <input type='radio' name='type' id='eval' value='eval'>
                <label for='eval'>Evaluación</label>
            </div>
            <div>
                <input type='radio' name='type' id='sug' value='sug'>
                <label for='sug'>Sugerencias</label>
            </div>
            <div>
                <input type='radio' name='type' id='crit' value='crit'>
                <label for='crit'>Críticas</label>
            </div>
        </div>
        <label for='user_comment'>Comentarios</label>
        <textarea id='user_comment' class='input-field' name='user_comment'
            placeholder='Escribe cualquier cosa que quieras comentarnos...' rows="10">$val_user_comment</textarea>
        HTML . generarError('user_comment', $this->errores) . <<<HTML
        <button id='send-button' class='button c-h-blue' type='submit' title='Enviar' name='Enviar'>Enviar</button>
        <button class='button c-h-blue' type='reset'>Limpiar</button>
        HTML;
    }

    protected function procesaFormulario(&$datos)
    {
        $user_comment = filter_input(INPUT_POST, 'user_comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$user_comment || empty($user_comment = trim($user_comment))) {
            $this->errores['user_comment'] = 'El comentario no puede estar vacío.';
        }

        if (!isset($_SESSION["user_email"])) {
            $this->errores[] = 'Debes estar identificado, con una sesión abierta.';
        }

        if (count($this->errores) === 0) {
            \parallelize_namespace\Comentario::enviaComentario($user_comment);
        }

    }

    public function __construct()
    {
        parent::__construct(0, array('action' => './contacto.php', 'method' => 'POST', 'urlRedireccion' => './salidaExitosaContacto.php'));
    }
}