<?php

namespace parallelize_namespace\formulario;

require_once 'includes/config.php';

class FormularioComentario extends Formulario
{
    private $kernel_id;
    private $user_email;
    protected function generaCamposFormulario(&$datos = array())
    {       
        return generaErroresGlobalesFormulario($this->errores) . <<<HTML
        HTML . generarError('user_email', $this->errores) . <<<HTML
        <textarea id = 'campo-comentario' class = 'input-field' name = 'comentario' placeholder = 'Danos tu opinion sobre el kernel...' 
        required rows="5"></textarea>
        <input type="checkbox" name="is-report" id="is-report">
        <label for="is-report">¿Es una denuncia?</label>
        <button id = 'comment-button' class='button c-h-blue' type='submit' title='Ingresar' name='Ingresar'>Enviar Comentario</button>

        HTML;
    }

    protected function procesaFormulario(&$datos)
    {
        if (count($this->errores) === 0) {
            $resultado = \parallelize_namespace\ComentarioKernel::comenta($this->user_email, $this->kernel_id, $datos['comentario'], isset($datos['is-report']));

            if (!$resultado) {
                $this->errores[] = 'error al enviar el comentario';
            }
        }

    }

    public function __construct($id)
    {
        parent::__construct(0, array('action' => './kernel_info.php?id=' . $id, 'method' => 'POST', 'urlRedireccion' => './kernel_info.php?id=' . $id));
        $this->kernel_id = $id;
        $this->user_email = $_SESSION['user_email'];
    }
}