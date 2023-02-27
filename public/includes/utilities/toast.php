<!-- mi idea es que salgan toasts, pero de momento con alerts podemos ir tirando -->

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


?>