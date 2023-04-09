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
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">

</head>

<body>
    <?php
    require_once("./includes/src/vistas/nav_bar.php");
    ?>
    <div class="flex-container-info vertical">
        <div class="flex-container-info horizontal">
            <div class="codeBlock">
                <h2 class="title">
                    Codigo fuente
                </h2>
                <pre id="sourceCode">
                </pre>
                <?php
                $kernel = \parallelize_namespace\Kernel::buscaKernelPorId($_GET["id"]);
                require_once("./js/kernelViz.php");
                showCode(false, "sourceCode", $kernel);

                ?>
            </div>

            <div class="flex-container-info vertical block">
                <div class="form">
                    <h2 class="title centered">
                        <?= $kernel->getname(); ?>
                    </h2>
                    <p>Usuario:
                        <?= \parallelize_namespace\Usuario::buscaUsuario($kernel->getuser_email())->getName() ?>
                    </p>
                    <p>Estado:
                        <?= $kernel->is_finished() == 0 ? "Computing" : "Finished" ?>
                    </p>
                    <p>Recompensa:
                        <?= $kernel->getreward_per_line() ?> tk/line
                    </p>
                    <p class="form">
                        <?= $kernel->getdescription() ?>
                    </p>
                </div>
                <div class="form block">

                    <div class="flex-container-info ">
                        <button id="btn_box" class="small-button fill-flex transition"
                            onclick='comenzarEjecucion(<?= $_GET["id"] ?>)'>
                            <p id="btn_text">Ejecutar</p>
                        </button>
                    </div>
                    <p id="state_text"></p>

                </div>
            </div>
        </div>
        <?php
        if (isset($_SESSION["user_email"]) && $kernel->getuser_email() == $_SESSION["user_email"]) {
            ?>
            <div>
                <h1 class="centered_text">Información privada para el propietario</h1>
                <div class="codeBlock">
                    <a download="resultados_de_kernel.csv"
                        href="includes/src/backend/get_results.php?id=<?= $_GET["id"] ?>&format=csv">Descargar resultados
                        <?= $kernel->is_finished() ? "totales" : "parciales" ?> en csv
                    </a>
                    <a download="resultados_de_kernel.json"
                        href="includes/src/backend/get_results.php?id=<?= $_GET["id"] ?>&format=json">Descargar
                        resultados
                        <?= $kernel->is_finished() ? "totales" : "parciales" ?> en json
                    </a>

                </div>
            </div>
        <?php } ?>
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