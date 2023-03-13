<?php

foreach ($_REQUEST as $type => $text) {
    switch ($type) {
        case 'err':
            echo <<<EOF
            <script>
                alert("err: $text")
            </script>
            EOF;
            break;
        case 'msg':
            echo <<<EOF
            <script>
                alert("msg: $text")
            </script>
            EOF;
            break;
    }
}

function generaErroresGlobalesFormulario($errores)
{
    $html = '';
    $keys = array_filter(array_keys($errores), function ($v) {
        return is_numeric($v);
    });
    if (count($keys) > 0) {
        $html = '<ul class="errores">';
        foreach ($keys as $key) {
            $html .= "<li>{$errores[$key]}</li>";
        }
        $html .= '</ul>';
    }
    return $html;
}

function generarError($campo, $errores)
{
    return isset($errores[$campo]) ? "<br><span class=\"form-field-error\">{$errores[$campo]}</span>" : '';
}

function generaErroresCampos($campos, $errores)
{
    $erroresCampos = [];
    foreach ($campos as $campo) {
        $erroresCampos[$campo] = generarError($campo, $errores);
    }
    return $erroresCampos;
}
