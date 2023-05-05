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
        <textarea id="comment-field" class="input-field" name="comment" placeholder="Danos tu opinión sobre el kernel..."
            required rows="4"></textarea>
        <div class="form-options">
            <div>
                <input type="checkbox" name="is-report" id="is-report">
                <label for="is-report">¿Es una denuncia?</label>
            </div>
            <button id="comment-button" class="button c-h-blue" type="submit">Enviar Comentario</button>
        </div>

        HTML;
    }

    protected function procesaFormulario(&$datos)
    {
        if (count($this->errores) === 0) {
            $resultado = \parallelize_namespace\ComentarioKernel::comenta($this->user_email, $this->kernel_id, $datos['comment'], isset($datos['is-report']));

            if (!$resultado) {
                $this->errores[] = 'error al enviar el comentario';
            }
        }

    }

    public function __construct($id)
    {
        parent::__construct(0, array('class' => 'form-comment','action' => './kernel_info.php?id=' . $id, 'method' => 'POST', 'urlRedireccion' => './kernel_info.php?id=' . $id));
        $this->kernel_id = $id;
        $this->user_email = $_SESSION['user_email'];
    }
}