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
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Usuario</th>
                    <th>Puntuación</th>
                </tr>
            </thead>

            <tbody>
                <?php $GLOBALS['usuarios'] = \parallelize_namespace\Usuario::getMejoresUsuarios(25);
                foreach ($GLOBALS['usuarios'] as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $key + 1 . "</td>";
                    echo "<td>" . $value[0] . "</td>";
                    echo "<td>" . $value[1] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="right-side">
            <div class="podio">
                <div class="podio-item oro">
                    <h3>1º</h3>
                    <p><?=$GLOBALS['usuarios'][0][0]?></p>
                    <p><?=$GLOBALS['usuarios'][0][1]?></p>
                </div>
                <div class="podio-item plata">
                    <h3>2º</h3>
                    <p><?=$GLOBALS['usuarios'][1][0]?></p>
                    <p><?=$GLOBALS['usuarios'][1][1]?></p>
                </div>
                <div class="podio-item bronce">
                    <h3>3º</h3>
                    <p><?=$GLOBALS['usuarios'][2][0]?></p>
                    <p><?=$GLOBALS['usuarios'][2][1]?></p>
                </div>
            </div>
            
            <div class = rank-blob>
            <img src="svg/blobanimation.svg">
            </div>
        </div>
    </div>
    <?php require("./includes/src/vistas/footer.php"); ?>

</body>

</html>