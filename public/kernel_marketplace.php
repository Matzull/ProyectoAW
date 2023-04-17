<?php require_once "includes/config.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_dashboard.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/marketplace.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">
</head>

<body>
    <?php
    require_once("./includes/src/vistas/nav_bar.php");

    function mostrar_kernel($kernel)
    {
        ?>
        <div class="form form-extra-carrousel">
            <h3 class="title">
                <?= $kernel->getname() ?>
            </h3>
            <p class="subtitle t-muted">
                <?= $kernel->getdescription() ?>
            </p>
            <!-- creamos los botones para redirigir a los links -->
            <button class="small-button c-h-b-blue">
                <?= $kernel->getreward_per_line() ?> tk/line
            </button>
            <button class="small-button c-green" onclick="location.href='kernel_info.php?id=<?= $kernel->getid() ?>'">Mas
                info</button>
        </div>
        <?php
    }
    ?>
    <div class="main-container">

        <h1 class="title">
            Mercado
        </h1>
        <h2 class="title">
            Mejor pagados
        </h2>
        <!-- TODO Seguramente podamos hacer una querie a la DB y hacer un for loop tanto para mostrar la lista de los kernels mejor pagados como para los mas recientes (Campos c/seg y fecha de subida requeridos en la DB)-->
        <!-- <p class="subtitle t-muted">Danos feedback de nuestra web!</p> -->
        <div class="marketplace-kernels">

            <?php

            $lista_de_kernels = \parallelize_namespace\Kernel::buscaKernelsMejorPagados(10);
            foreach ($lista_de_kernels as $i => $kernel) {
                mostrar_kernel($kernel);
            }
            if (sizeof($lista_de_kernels) == 0) {
                echo "no hay kernels en esta categoría";
            }

            ?>


        </div>

        <h2 class="title">
            Nuevos
        </h2>
        <div class="marketplace-kernels">
            <?php

            $lista_de_kernels = \parallelize_namespace\Kernel::buscaKernelsMasNuevos(10);
            foreach ($lista_de_kernels as $i => $kernel) {
                mostrar_kernel($kernel);
            }
            if (sizeof($lista_de_kernels) == 0) {
                echo "no hay kernels en esta categoría";
            }

            ?>

        </div>

    </div>

    <?php require_once("./includes/src/vistas/footer.php"); ?>

</body>

</html>