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
    <title>FAQ</title>
    <link rel='stylesheet' href='<?= RUTA_CSS ?>/nav_bar.css'>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/FAQ.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">
</head>

<body>
    <?php require('./includes/src/vistas/nav_bar.php') ?>
    <div class="container">
        <div class="form">
            <h1 class="title-FAQ">
                FAQ
            </h1>
            <!-- <input method="post" type="text" placeholder="¿Cómo te podemos ayudar"> -->
            <form method="POST" action="FAQ.php">
                <input class="input-field" type="text" name="search-FAQ" placeholder="¿Cómo te podemos ayudar?"/>
            </form>
        </div>
    </div>
    <div class="FAQ-index">
        <div class="FAQs-c1">
            <h2>Kernels</h2>
            <!-- Las preguntas deben ser enlaces a las respuestas pero por ahora solo las vistas -->
            <div class="question-FAQ" >
                <p>Como contactar con el equipo</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
            </div>
        </div>
        <div class="FAQs-c2">
            <h2>Otro tema</h2>
            <div class="question-FAQ" >
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
            </div>
        </div>
    
        <div class="FAQs-c3">
            <h2>Otro tema</h2>
    
            <div class="question-FAQ" >
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
                <p>Otra pregunta</p>
            </div>
        </div>
    </div>

    <div class="container-answers">
        <div class="form answer">
            <h1> FAQ </h1>

            <p>fjdsklañfjkds</p>
            <p>djsalfjd</p>
        </div>
    </div>

    <?php require("./includes/src/vistas/footer.php"); ?>
</body>

</html>