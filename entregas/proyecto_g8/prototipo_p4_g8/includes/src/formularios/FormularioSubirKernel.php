<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';
require_once("./js/kernelViz.php");
?>
<link rel="stylesheet" href="js/codeMirror/codemirror.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/theme/dracula.min.css">

<script src="js/codeMirror/codemirror.js"></script>
<script src="js/codeMirror/javascript.js"></script>


<?php
class FormularioSubirKernel extends Formulario
{
    protected function generaCamposFormulario(&$datos = array())
    {

        $val_kernel_name = isset($datos['kernel-name']) ? $datos['kernel-name'] : '';
        $val_input_kernel = isset($datos['input-kernel']) ? $datos['input-kernel'] : '';
        $val_kernel_description = isset($datos['kernel-description']) ? $datos['kernel-description'] : '';
        $val_input_price = isset($datos['input-price']) ? $datos['input-price'] : '';
        $iteration_count = isset($datos['iteration-count']) ? $datos['iteration-count'] : '';

        return generaErroresGlobalesFormulario($this->errores) . <<<HTML

        <label for='kernel-name'>Nombre del kernel</label>
        <input id='kernel-name' class='input-field' name='kernel-name' placeholder='Nombre del kernel' value="$val_kernel_name"></textarea>
        HTML . generarError('kernel-name', $this->errores) . <<<HTML
        
        <label for = 'input-kernel'>Introducir kernel</label>
        <div class="input-field">
            <textarea id='input-kernel' class='input-field' name='input-kernel' placeholder='Introduce tu kernel'>$val_input_kernel</textarea>
            <script>
                let editor = CodeMirror.fromTextArea(document.getElementById("input-kernel"), {
                    lineNumbers: true,
                    mode: "javascript",
                    theme: "dracula",
                    indentUnit: 10,
                    lineWrapping: true
                });
                editor.setSize("100%", "200px");
            </script>
        </div>
        HTML . generarError('input-kernel', $this->errores) . <<<HTML

        <label for='kernel-description'>Descripción del kernel</label>
        <textarea id='kernel-description' class='input-field' name='kernel-description' placeholder='Pon una breve descripción del funcionamiento del kernel...'
            rows="5">$val_kernel_description</textarea>
        HTML . generarError('kernel-description', $this->errores) . <<<HTML

        <!-- en el precio he puesto pattern="^[0-9]+(.[0-9]+)?$" para que solo puedas poner numeros y puntos -->
        <label for='input-price'>Precio</label>
        <input id='input-price' class='input-field'  pattern="^[0-9]+(.[0-9]+)?$" name='input-price'
            placeholder='Pon un precio a pagar por la ejecución' value="$val_input_price">
        HTML . generarError('input-price', $this->errores) . <<<HTML

        <label for='iteration-count'>Iteraciones</label>
        <input id='iteration-count' class='input-field'  pattern="^[0-9]+(.[0-9]+)?$" name='iteration-count'
            placeholder='Decide la cantidad de veces que se debe ejecutar' value="$iteration_count">
        HTML . generarError('iteration-count', $this->errores) . <<<HTML
      
        <!-- la id de este button era create-acc-button -->
        <div class="form-buttons">
            <button id='send-button' class='button c-h-blue' type='submit' title='Aceptar' name='Aceptar'>Aceptar</button>
            <button id='clear-button' class='button c-h-blue' type='reset' title='Clear' name='Clear'>Limpiar</button>
        </div>
        HTML;
    } // TODO boton borrar desde la linea 29 hasta la 34 y el codigo posterior de contacto aparece como output???

    protected function procesaFormulario(&$datos)
    {

        $kernel_name = filter_input(INPUT_POST, 'kernel-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$kernel_name || empty($kernel_name = trim($kernel_name))) {
            $this->errores['kernel-name'] = 'Debes poner un nombre a tu kernel.';
        }

        $input_kernel = filter_input(INPUT_POST, 'input-kernel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$input_kernel || empty($input_kernel = trim($input_kernel))) {
            $this->errores['input-kernel'] = 'Debes introducir codigo.';
        }

        $kernel_description = filter_input(INPUT_POST, 'kernel-description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$kernel_description || empty($kernel_description = trim($kernel_description))) {
            $this->errores['kernel-description'] = 'Debes poner una descripcion de tu kernel.';
        }

        $usuario = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);

        $input_price = filter_input(INPUT_POST, 'input-price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$input_price || empty($input_price = trim($input_price))) {
            $this->errores['input-price'] = 'Debes poner un precio a tu kernel.';
        }
        if ($usuario->gettokens() < $input_price) {
            $this->errores['input-price'] = 'No tienes tanto dinero para gastar, ingresa primero.';

        }

        $iteration_count = filter_input(INPUT_POST, 'iteration-count', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$iteration_count || empty($iteration_count = trim($iteration_count))) {
            $this->errores['iteration-count'] = 'Debes decidir las iteraciones de tu kernel.';
        }

        if (count($this->errores) === 0) {

            $usuario->setTokens($usuario->gettokens() - $input_price);
            \parallelize_namespace\Transaction::submit(-$input_price, $_SESSION["user_email"], "pago por el kernel " . $kernel_name, $usuario->gettokens());

            \parallelize_namespace\Kernel::enviaKernel($kernel_name, $input_kernel, $kernel_description, $input_price, $iteration_count);
        }

    }

    public function __construct()
    {
        parent::__construct(0, array('action' => './subirKernel.php', 'method' => 'POST', 'urlRedireccion' => './your_kernels.php'));
    }
}