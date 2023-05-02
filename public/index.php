<?php
require 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parallelize</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/user_dashboard.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/index.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">
</head>

<body>
    
    <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    <div class="main-container">
        <section class="carousel" aria-label="Gallery">
            <ol class="carousel__viewport">
                <li id="carousel__slide1"
                    tabindex="0"
                    class="carousel__slide">
                    <div class="carousel__snapper">
                        <a href="#carousel__slide4"
                        class="carousel__prev">Go to last slide</a>
                        <a href="https://www.w3schools.com"><img class="carimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/W3Schools_logo.svg/1088px-W3Schools_logo.svg.png"></a>
                        <a href="#carousel__slide2"
                        class="carousel__next">Go to next slide</a>
                    </div>
                </li>
                <li id="carousel__slide2"
                    tabindex="0"
                    class="carousel__slide">
                    <div class="carousel__snapper">
                        <a href="#carousel__slide1"
                            class="carousel__prev">Go to previous slide</a>
                            <a href="https://www.ucm.es"><img class="carimg" src="https://www.ucm.es/data/cont/docs/3-2016-07-21-EscudoUCMTransparenteBig.png"></a>
                        <a href="#carousel__slide3"
                            class="carousel__next">Go to next slide</a>
                    </div>
                </li>
                <li id="carousel__slide3"
                    tabindex="0"
                    class="carousel__slide">
                    <div class="carousel__snapper">
                        <a href="#carousel__slide2"
                            class="carousel__prev">Go to previous slide</a>
                        <a href="https://visualstudio.microsoft.com/es/"><img class="carimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Visual_Studio_Code_1.35_icon.svg/2048px-Visual_Studio_Code_1.35_icon.svg.png"></a>
                        <a href="#carousel__slide4"
                            class="carousel__next">Go to next slide</a>
                    </div>
                </li>
                <li id="carousel__slide4"
                    tabindex="0"
                    class="carousel__slide">
                    <div class="carousel__snapper">
                        <a href="#carousel__slide3"
                            class="carousel__prev">Go to previous slide</a>
                            <a href="https://www.apachefriends.org/es/index.html"><img class="carimg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Xampp_logo.svg/1024px-Xampp_logo.svg.png"></a>
                        <a href="#carousel__slide1"
                            class="carousel__next">Go to first slide</a>
                    </div>
                </li>
            </ol>
            <aside class="carousel__navigation">
                <ol class="carousel__navigation-list">
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide1"
                    class="carousel__navigation-button">Go to slide 1</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide2"
                    class="carousel__navigation-button">Go to slide 2</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide3"
                    class="carousel__navigation-button">Go to slide 3</a>
                </li>
                <li class="carousel__navigation-item">
                    <a href="#carousel__slide4"
                    class="carousel__navigation-button">Go to slide 4</a>
                </li>
                </ol>
            </aside>
        </section>
        <div class="aligned">
            <div>
                <h1>Bienvenid@s a Parallelize!</h1>
                <p class="subtitle t-muted">Esperemos que os guste!</p>
            </div>
            <div class="diagonal-gradient"></div>
        </div>
        <div class="diagonal-gradient"></div>
        <?php require_once("./includes/src/vistas/nav_bar.php") ?>
    </div>
    <?php require("./includes/src/vistas/footer.php"); ?>

</body>

</html>