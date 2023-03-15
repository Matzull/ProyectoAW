<!-- wip juan -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado</title>
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/user_nav_bar.css">
    <link rel="stylesheet" href="css/user_dashboard.css">
    <link rel="stylesheet" href="css/contacto.css">
</head>

<body>
    <?php
    require_once "includes/config.php";
    require_once("./includes/vistas/nav_bar.php");
    ?>
    <div class="form-container-marketplace">

        <h1 class="title">
            Mercado
        </h1>
        <h2 class="title">
            Mejor pagados
        </h2>
            <!-- <p class="subtitle t-muted">Danos feedback de nuestra web!</p> -->

        <div id="kernel1" class="form">
            <h3 class="title">
                Federico Garsia
            </h3>
            <p class="subtitle t-muted">mi kernel hace backtracking complicado</p>
            <!-- creamos los botones para redirigir a los links -->
            <a href="https://instagram.com"><button>0.06c/seg</button></a>
            <a href="kernel_info.php"><button>Ejecutar</button></a>
        </div>

        <div id="kernel1" class="form">
            <h3 class="title">
                ambrosio Garsia
            </h3>
            <p class="subtitle t-muted">mi kernel hace backtracking complicado</p>
            <!-- creamos los botones para redirigir a los links -->
            <a href="https://instagram.com"><button>0.06c/seg</button></a>
            <a href="kernel_info.php"><button>Ejecutar</button></a>
        </div>

        <h2 class="title">
            Mejor pagados
        </h2>

        <div id="kernel1" class="form">
            <h3 class="title">
                Manola Fuertes
            </h3>
            <p class="subtitle t-muted">mi ordenador es una patata ayudadme!</p>

            <!-- Creamos redes sociales? -->
            <a href="https://instagram.com"><button>0.06c/seg</button></a>
            <a href="kernel_info.php"><button>Ejecutar</button></a>

        </div>
        
    </div>
    


</body>

</html>