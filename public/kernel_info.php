<?php
namespace parallelize_namespace;

require 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kernel Info</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_dashboard.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/kernel_info.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">

    <link rel="stylesheet" href="js/codeMirror/codemirror.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/theme/dracula.min.css">

    <script type="text/javascript" src="js/codeMirror/codemirror.js"></script>
    <script type="text/javascript" src="js/codeMirror/javascript.js"></script>    

</head>

<body>
    <?php
    require_once("./includes/src/vistas/nav_bar.php");

    ?>
    <div class="flex-container-info horizontal">
        <div class="codeBlock">
            <h2 class="title">
                Codigo fuente
            </h2>
            <?php
                $kernel = \parallelize_namespace\Kernel::buscaKernelPorId($_GET["kernel_id"]);
            ?>
            <pre id="sourceCode"></pre>
            <script type="text/javascript">
                var code = "<?php echo addcslashes(html_entity_decode($kernel->getCode(), ENT_QUOTES ), "\n")?>";
                var editor = CodeMirror(document.getElementById("sourceCode"), {
                    lineNumbers: true,
                    mode: "javascript",
                    theme: "dracula",
                    indentUnit: 10,
                    readOnly: true,
                    lineWrapping: true,
                    pasteAsPlainText: true
                });
                editor.setValue(code);
                editor.setSize("100%", "100%");
            </script>  
        </div>

        <div class="flex-container-info vertical block">
            <div class="form">
                <h2 class="title centered">
                    <?=$kernel->getname();?>
                </h2>
                <p>Usuario: <?= \parallelize_namespace\Usuario::buscaUsuario($kernel->getuser_email())->getName() ?></p>
                <p>Estado: <?= $kernel->getrun_state() == 0 ? "Inactive" : ($kernel->getrun_state() == 1 ? "In progress" : "Finished") ?></p>
                <p class="form"><?= $kernel->getdescription() ?></p>
            </div>
            <div class="form block">
                <h2 class="title centered">
                    Accion
                </h2>
                <p class="form">Iteracion 105/350</p>
                <div class="flex-container-info ">
                    <button  class="small-button c-green fill-flex"
                        onclick="location.href='kernel_info.php'">
                        <p>Ejecutar</p>
                    </button>
                    <div class="small-info c-h-b-blue fill-flex">
                        <p> <?= $kernel->gettotal_reward()?> c/seg</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<?php require_once("./includes/src/vistas/footer.php");?>

</html>