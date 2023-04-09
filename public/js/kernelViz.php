<link rel="stylesheet" href="js/codeMirror/codemirror.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/theme/dracula.min.css">

<script type="text/javascript" src="js/codeMirror/codemirror.js"></script>
<script type="text/javascript" src="js/codeMirror/javascript.js"></script>

<?php function showCode($editable, $id, $kernel)
{
    $code = " ";
    if ($kernel != null)
    {
        $code = addcslashes(html_entity_decode($kernel->getCode(), ENT_QUOTES), "\n");
    }
    
    $isReadonly = ($editable) ? "false" : "true";
    echo <<<EOT
        <script>
            var code = "$code";
            var editor = CodeMirror(document.getElementById("$id"), {
                lineNumbers: true,
                mode: "javascript",
                theme: "dracula",
                indentUnit: 10,
                readOnly: $isReadonly,
                lineWrapping: true,
                pasteAsPlainText: true
            });
            editor.setValue(code);
            editor.setSize("100%", "100%");
        </script>
    EOT;
} ?>