<?php
namespace parallelize_namespace;

require 'includes/config.php';
$formulario = new \parallelize_namespace\formulario\FormularioComentario($_GET["id"]);  
$formulario_html = $formulario->gestiona();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kernel Info</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/kernel_info.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">

</head>

<body>
    <?php
    // TODO gestion de errores de kernel no encontrado
   
    require_once("./includes/src/vistas/nav_bar.php");
    ?>
    <div class="main-container">
        <div class="sections-container kernel">
            <div class="section codeBlock">
                <h2 class="title">
                    Codigo fuente
                </h2>
                <div id="sourceCode">
                </div>
                <?php
                $kernel = \parallelize_namespace\Kernel::buscaKernelPorId($_GET["id"]);
                require_once("./js/kernelViz.php");
                showCode(false, "sourceCode", $kernel);

                ?>
            </div>

            <div class="sections-container kernel-info">
                <div class="section">
                    <h2 class="title centered">
                        <?= $kernel->getname(); ?>
                    </h2>
                    <p><strong>Usuario:</strong>
                        <?= \parallelize_namespace\Usuario::buscaUsuario($kernel->getuser_email())->getName() ?>
                    </p>
                    <p><strong>Estado:</strong>
                        <?= $kernel->is_finished() == 0 ? "Computing" : "Finished" ?>
                    </p>
                    <p><strong>Recompensa:</strong>
                        <?= $kernel->getreward_per_line() ?> tk/line
                    </p>
                    <div class="section">
                        <h4 class="title">Descripción</h4>
                        <?= $kernel->getdescription() ?>
                    </div>
                </div>
                <div class="section kernel-exec">
                    <button id="btn_box" class="button fill-flex transition"
                        onclick='comenzarEjecucion(<?= $_GET["id"] ?>)'>
                        <span id="btn_text">Ejecutar</span>
                    </button>
                    <p id="state_text"></p>

                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION["user_email"]) && $kernel->getuser_email() == $_SESSION["user_email"]) {
            ?>
            <div class="sections-container">
                <div class="section">
                    <h2 class="title">Información privada para el propietario</h2>
                    <div class="codeBlock">
                        <a download="resultados_de_kernel.csv"
                            href="includes/src/backend/get_results.php?id=<?= $_GET["id"] ?>&format=csv">Descargar resultados
                            <?= $kernel->is_finished() ? "totales" : "parciales" ?> en csv
                        </a><br>
                        <a download="resultados_de_kernel.json"
                            href="includes/src/backend/get_results.php?id=<?= $_GET["id"] ?>&format=json">Descargar
                            resultados
                            <?= $kernel->is_finished() ? "totales" : "parciales" ?> en json
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
        
            <div class = "sections-container">
                <div class="section">
                    <h2 class="title">Comentarios del kernel</h2>
                    <?= $formulario_html ?>

                    <div class="comments">

                        <!-- php 
                        $comentarios = \parallelize_namespace\Comentario::buscaComentariosPorKernel($_GET["id"]);
                        foreach ($comentarios as $comentario) {
                            $usuario = \parallelize_namespace\Usuario::buscaUsuario($comentario->getuser_email());
                            $usuario_nombre = $usuario->getName();
                            $usuario_foto = $usuario->getPhoto();
                            $comentario_texto = $comentario->getcomment();
                            $comentario_fecha = $comentario->getdate();
                            php?
                            <div class="comment">
                                <div class="comment-header">
                                    poner username
                                </div>
                                <div class="comment-text">poner comentario</div>
                            </div>
                        php } php?-->
                        <!-- TODO hacer comentarios.php y mover comenta de usuario a comentario y hacer lo de arriba para listar comentarios -->
                    </div>
                </div>
            </div>
        
    </div>
    
    <script>
        kernel = {
            finished: <?= $kernel->is_finished() == 0 ? "false" : "true" ?>
        }
    </script>


    <?php require "js/kernel_execution.php"; ?>

    <script src="js/work_coordination.js"></script>


</body>
<?php require_once("./includes/src/vistas/footer.php"); ?>

</html>