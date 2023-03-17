<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';

class FormularioSubirKernel extends Formulario
{
    protected function generaCamposFormulario(&$datos = array())
    {

        $val_user_comment = isset($datos['user_comment']) ? $datos['user_comment'] : '';

        return generaErroresGlobalesFormulario($this->errores) . <<<HTML
        
        <label for = 'user_comment'>Comentarios</label>
        <textarea id = 'user_comment' class = 'input-field' name = 'user_comment' placeholder = 'Escribe cualquier cosa que quieras comentarnos' value = "$val_user_comment" ></textarea>
        HTML . generarError('user_comment', $this->errores) . <<<HTML
      
        <!-- la id de este button era create-acc-button -->
        <button id = 'send-button' class = 'button c-h-blue' type = 'submit' title = 'Aceptar' name = 'Aceptar'>Aceptar</button>
        <!-- este botón ni existía es el de clear??(es el de LIMPIAR DE FIGMA)-->
        <button id = 'clear-button' class = 'button c-h-blue' type = 'submit' title = 'Clear' name = 'Clear'>Limpiar</button>
        HTML;
    } // TODO boton borrar desde la linea 29 hasta la 34 y el codigo posterior de contacto aparece como output???

    protected function procesaFormulario(&$datos)
    {
        $input_kernel = filter_input(INPUT_POST, 'input_kernel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$input_kernel || empty($input_kernel = trim($input_kernel))) {
            $this->errores['input_kernel'] = 'El kernel es erroneo.';
        }

        if (!isset($_SESSION["user"])) {
            $this->errores[] = 'Debes estar identificado, con una sesión abierta.';
        }

        if (count($this->errores) === 0) {
            \parallelize_namespace\kernel::enviaKernel($input_kernel);
        }

    }

    public function __construct()
    {
        parent::__construct(0, array('action' => './contacto.php', 'method' => 'POST', 'urlRedireccion' => './SalidaExitosaFormulario.php'));
    }
}