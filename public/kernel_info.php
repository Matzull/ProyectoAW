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

    <link rel="stylesheet" href="includes/src/modules/codeMirror/codemirror.css">
    <script src="includes/src/modules/codeMirror/codemirror.js"></script>
    <script src="includes/src/modules/codeMirror/javascript.js"></script>
    <script src="includes/src/modules/codeMirror/closebrackets.js"></script>
    <script src="includes/src/modules/codeMirror/runmode.js"></script>
    <link rel="includes/src/modules/codeMirror/dracula.css">

</head>

<body>
    <?php
    require_once "includes/config.php";
    require_once("./includes/src/vistas/nav_bar.php");

    //$kernel = \parallelize_namespace\Kernel::buscaKernelPorId($_GET["kernel_id"]);
    ?>
    <div class="flex-container-info horizontal">
        <div class="codeBlock">
            <h2 class="title">
                Codigo fuente
            </h2>
            <?php
                $kernel = \parallelize_namespace\Kernel::buscaKernelPorId(2);
            ?>
            <pre id="code"><code></code></pre>
            <script>
                var code = '<?php echo htmlentities($kernel->getCode(), ENT_QUOTES)?>';
                CodeMirror.runMode(code, "text/javascript", document.getElementById('code'), {theme: "dracula"});
                // editor.setSize(0.7*window.innerWidth, "500");
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