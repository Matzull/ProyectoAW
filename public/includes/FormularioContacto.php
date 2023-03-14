<?php

namespace parallelize_namespace;

require_once 'includes/config.php';

class FormularioContacto extends Formulario
 {
    protected function generaCamposFormulario( &$datos = array() )
 {

        $val_user_name = isset( $datos[ 'user_name' ] ) ? $datos[ 'user_name' ] : '';
        $val_user_email = isset( $datos[ 'user_email' ] ) ? $datos[ 'user_email' ] : '';
        $val_user_comment = isset( $datos[ 'user_comment' ] ) ? $datos[ 'user_comment' ] : '';

        return generaErroresGlobalesFormulario( $this->errores ) . <<<EOS

        <label for = 'user_name'>Nombre de usuario</label>
        <input id = 'user_name' class = 'input-field' type = 'text' name = 'user_name' placeholder = 'Escribe tu nombre de usuario' value = "$val_user_name"
        required>
        EOS . generarError( 'user_name', $this->errores ) . <<<EOS

        <label for = 'user_email'>E-mail</label>
        <input id = 'user_email' class = 'input-field' type = 'text' name = 'user_email' placeholder = 'Escribe tu correo' value = "$val_user_email" required>
        EOS . generarError( 'user_email', $this->errores ) . <<<EOS

        <div class = 'form-options'>
        <div>
        <input type = 'checkbox' name = 'eval' id = 'eval' value = 'accepted'>
        <label for = 'eval'>Evaluación</label>
        EOS . generarError( 'eval', $this->errores ) . <<<EOS

        <input type = 'checkbox' name = 'sug' id = 'sug' value = 'accepted'>
        <label for = 'sug'>Sugerencias</label>
        EOS . generarError( 'sug', $this->errores ) . <<<EOS

        <input type = 'checkbox' name = 'crit' id = 'crit' value = 'accepted'>
        <label for = 'crit'>Críticas</label>
        EOS . generarError( 'crit', $this->errores ) . <<<EOS
        </div>
        </div>
        <label for = 'user_comment'>Comentarios</label>
        <input id = 'user_comment' class = 'input-field' type = 'comment' name = 'user_comment' placeholder = 'Escribe cualquier cosa que quiras comentarnos' value = "$val_user_comment" required>
        EOS . generarError( 'user_comment', $this->errores ) . <<<EOS

        <div class = 'form-options'>
        <div>
        <input type = 'checkbox' name = 'terms' id = 'terms' value = 'accepted'>
        <label for = 'terms'>Marque esta casilla para indicar que acepta los términos y condiciones de este servicio</label>
        EOS . generarError( 'terms', $this->errores ) . <<<EOS
        </div>
        </div>
        <!-- la id de este button era create-acc-button -->
        <button id = 'send-button' class = 'button c-h-blue' type = 'submit' title = 'Enviar' name = 'Enviar'>Enviar</button>
        <!--este botón ni existía es el de clear?? NO SE COMO BORRAR AL PULSAR -->
        <button id = 'clear-button' class = 'button c-h-blue' type = 'submit' title = 'Clear' name = 'Clear'>Limpiar</button>

        EOS;
    }

    protected function procesaFormulario( &$datos )
 {
        $terms = filter_input( INPUT_POST, 'terms', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        if ( !$terms || empty( $terms = trim( $terms ) ) ) {
            $this->errores[ 'terms' ] = 'Debes aceptar los terminos y condiciones';
        }

        $user_email = filter_input( INPUT_POST, 'user_email', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        if ( !$user_email || empty( $user_email = trim( $user_email ) ) ) {
            $this->errores[ 'user_email' ] = 'El email no puede estar vacío.';
        }

        $user_name = filter_input( INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        if ( !$user_name || empty( $user_name = trim( $user_name ) ) ) {
            $this->errores[ 'user_name' ] = 'El nombre de usuario no puede estar vacío.';
        }

        $user_comment = filter_input( INPUT_POST, 'user_comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        if ( !$user_comment || empty( $user_comment = trim( $user_comment ) ) ) {
            $this->errores[ 'user_comment' ] = 'La contraseña no puede estar vacío.';
        }

        if ( count( $this->errores ) === 0 ) {
            $usuario = \parallelize_namespace\Usuario::login( $nombreUsuario, $password );

            if ( $usuario ) {
                $_SESSION[ 'user' ] = $usuario;
                // TODO checkbox recuerdame
            } else {
                $this->errores[] = 'usuario o contraseña incorrectos';
            }

        }

        // TODO EMM  MIRAR  A DONDE MANDARLO 
        //public function __construct() {
        //parent::__construct( 0, array( 'action' => './login.php', 'method' => 'POST', 'urlRedireccion' => './user_dashboard.php' ) );
        //}

    }

    //public function __construct()
    //{
    //       parent::__construct( 0, array( 'action' => './register.php', 'method' => 'POST', 'urlRedireccion' => './user_dashboard.php' ) );
    //   }
}