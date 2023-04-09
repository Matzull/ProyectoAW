<?php
namespace parallelize_namespace;

require 'includes/config.php';

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Ranking</title>
    <link rel='stylesheet' href='<?= RUTA_CSS ?>/nav_bar.css'>
    <link rel='stylesheet' href='/<?= RUTA_CSS ?>/nav_bar.css'>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/ranking.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">
</head>

<body>
    <?php require('./includes/src/vistas/nav_bar.php') ?>

    <div class="ranking-container">
        <div class="table-format">
            <table>
                <!-- Para rellenar esta tabla habrá que consultar el ranking en la BD -->
                <thead>
                    <tr>
                        <th>posición</th>
                        <th>nombre de usuario</th>
                        <th>puntuación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Matzul_el_mediocre</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>diegoq</td>
                        <td>29</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>jaimev</td>
                        <td>28</td>
                    </tr>
                    <?php
                    for ($i = 1; $i <= 15; $i++) {
                        echo <<<HTML
                                <tr>
                                    <td>pos</td>
                                    <td>nombre</td>
                                    <td>puntos</td> 
                                </tr> 
                                HTML;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="right-side">
            <div class="top-rank">
                <h2 class="title">
                    BEST PARALELLIZERS
                </h2>
                <div class="ranking1">
                    <h3>Matzul_el_mediocre</h3>
                </div>
                <div class="ranking2">
                    <h3>diegoq</h3>
                </div>
                <div class="ranking3">
                    <h3>jaimev</h3>
                </div>
            </div>

            <div>
                <img src="svg/blobanimation.svg">
            </div>
        </div>
    </div>
    <?php require("./includes/src/vistas/footer.php"); ?>

</body>

</html>