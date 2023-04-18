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

        $val_kernel_name = isset($datos['kernel_name']) ? $datos['kernel_name'] : '';
        $val_input_kernel = isset($datos['input_kernel']) ? $datos['input_kernel'] : '';
        $val_kernel_description = isset($datos['kernel_description']) ? $datos['kernel_description'] : '';
        $val_input_price = isset($datos['input_price']) ? $datos['input_price'] : '';
        $iteration_count = isset($datos['iteration_count']) ? $datos['iteration_count'] : '';

        return generaErroresGlobalesFormulario($this->errores) . <<<HTML

        <label for = 'kernel_name'>Nombre del kernel</label>
        <input id = 'kernel_name' class = 'input-field' name = 'kernel_name' placeholder = 'Nombre del kernel' value = "$val_kernel_name" ></textarea>
        HTML . generarError('kernel_name', $this->errores) . <<<'HTML'
        
        <label for = 'input_kernel'>Introducir kernel</label>
        <div class="input-field">
        <textarea id = 'input_kernel' class = 'input-field' name = 'input_kernel' placeholder = 'Introduce tu kernel'></textarea>
            <script>
                var editor = CodeMirror.fromTextArea(document.getElementById("input_kernel"), {
                    lineNumbers: true,
                    mode: "javascript",
                    theme: "dracula",
                    indentUnit: 10,
                    lineWrapping: true
                });
                editor.setSize("100%", "100%");
            </script>
        </div>
        HTML . generarError('input_kernel', $this->errores) . <<<HTML

        <label for = 'kernel_description'>Descripcion del kernel</label>
        <textarea id = 'kernel_description' class = 'input-field' name = 'kernel_description' placeholder = 'Pon una breve descripcion del funcionamiento del kernel'></textarea>
        HTML . generarError('kernel_description', $this->errores) . <<<HTML

        <!-- en el precio he puesto pattern="^[0-9]+(.[0-9]+)?$" para que solo puedas poner numeros y puntos -->
        <label for = 'input_price'>Precio</label>
        <input id = 'input_price' class = 'input-field'  pattern="^[0-9]+(.[0-9]+)?$" name = 'input_price' placeholder = 'Pon un precio a pagar por la ejecucion'></textarea>
        HTML . generarError('input_price', $this->errores) . <<<HTML

        <label for = 'iteration_count'>iteraciones</label>
        <input id = 'iteration_count' class = 'input-field'  pattern="^[0-9]+(.[0-9]+)?$" name = 'iteration_count' placeholder = 'Decide la cantidad de veces que se debe ejecutar'></textarea>
        HTML . generarError('iteration_count', $this->errores) . <<<HTML
      
        <!-- la id de este button era create-acc-button -->
        <div class="form-buttons">
            <button id = 'clear-button' class = 'button c-h-blue' type = 'reset' title = 'Clear' name = 'Clear'>Limpiar</button>
            <button id = 'send-button' class = 'button c-h-blue' type = 'submit' title = 'Aceptar' name = 'Aceptar'>Aceptar</button>
        </div>
        HTML;
    } // TODO boton borrar desde la linea 29 hasta la 34 y el codigo posterior de contacto aparece como output???

    protected function procesaFormulario(&$datos)
    {

        $kernel_name = filter_input(INPUT_POST, 'kernel_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$kernel_name || empty($kernel_name = trim($kernel_name))) {
            $this->errores['kernel_name'] = 'Debes poner un nombre a tu kernel.';
        }

        $input_kernel = filter_input(INPUT_POST, 'input_kernel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$input_kernel || empty($input_kernel = trim($input_kernel))) {
            $this->errores['input_kernel'] = 'Debes introducir codigo.';
        }

        $kernel_description = filter_input(INPUT_POST, 'kernel_description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$kernel_description || empty($kernel_description = trim($kernel_description))) {
            $this->errores['kernel_description'] = 'Debes poner una descripcion de tu kernel.';
        }

        $usuario = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);

        $input_price = filter_input(INPUT_POST, 'input_price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$input_price || empty($input_price = trim($input_price))) {
            $this->errores['input_price'] = 'Debes poner un precio a tu kernel.';
        }
        if ($usuario->gettokens() < $input_price) {
            $this->errores['input_price'] = 'No tienes tanto dinero para gastar, ingresa primero.';

        }

        $iteration_count = filter_input(INPUT_POST, 'iteration_count', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$iteration_count || empty($iteration_count = trim($iteration_count))) {
            $this->errores['iteration_count'] = 'Debes decidir las iteraciones de tu kernel.';
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