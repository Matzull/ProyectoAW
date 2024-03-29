<?php
namespace parallelize_namespace;

require_once "includes/config.php";
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
    <link href="includes/src/modules/prism.css" rel="stylesheet" />
    <script src="includes/src/modules/prism.js"></script>

</head>

<body>


    <?php
    require_once("./includes/src/vistas/nav_bar.php");

    //$kernel = \parallelize_namespace\Kernel::buscaKernelPorId($_GET["kernel_id"]);
    ?>
    <div class="flex-container-info horizontal">
        <div class="codeBlock">
            <h2 class="title">
                Codigo fuente
            </h2>
            <?php
                $kernel = \parallelize_namespace\Kernel::buscaKernelPorId(1);
                echo '<pre class="line-numbers"><code class="language-javascript ">' . $kernel->getCode() . '</code></pre>';
            ?>

        </div>

        <div class="flex-container-info vertical block">
            <div class="form">
                <h2 class="title centered">
                    Informacion Adicional
                </h2>
                <p>Usuario: <?= \parallelize_namespace\Usuario::buscaUsuario($kernel->getuser_email())->getName() ?></p>
                <!-- <p>Estado: <?= json_decode($kernel->getrun_state())->status ?></p> -->
                <p class="form"><?= json_decode($kernel->getstatistics())->description ?></p>
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
                        <p> <?= json_decode($kernel->getstatistics())->price ?> c/seg</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<?php require_once("./includes/src/vistas/footer.php");?>

</html>