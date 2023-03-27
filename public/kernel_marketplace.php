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
    <link rel="stylesheet" href="css/marketplace.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <?php
    require_once "includes/config.php";
    require_once("./includes/src/vistas/nav_bar.php");
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
            <div id="kernel1" class="form form-extra-carrousel">
                <h3 class="title">
                    Federico García
                </h3>
                <p class="subtitle t-muted">Mi kernel hace backtracking complicado</p>
                <!-- creamos los botones para redirigir a los links -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>
            </div>

            <div id="kernel1" class="form form-extra-carrousel">
                <h3 class="title">
                    Marcos Alonso
                </h3>
                <p class="subtitle t-muted">Mi kernel es para un trabajo de IS2</p>
                <!-- creamos los botones para redirigir a los links -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>
            </div>

            <div id="kernel1" class="form form-extra-carrousel">
                <h3 class="title">
                    Juan Trillo
                </h3>
                <p class="subtitle t-muted">Necesito bastante ayuda/p>
                <!-- creamos los botones para redirigir a los links -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>
            </div>

            <div id="kernel1" class="form form-extra-carrousel">
                <h3 class="title">
                    Jaime Vázquez
                </h3>
                <p class="subtitle t-muted">Algoritmo que estudia una gran poblacion</p>
                <!-- creamos los botones para redirigir a los links -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>
            </div>

            <div id="kernel1" class="form form-extra-carrousel">
                <h3 class="title">
                    Jaime Gonzalez
                </h3>
                <p class="subtitle t-muted">No sé que poner como descripción</p>
                <!-- creamos los botones para redirigir a los links -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>
            </div>

            <div id="kernel2" class="form form-extra-carrousel">
                <h3 class="title">
                    Ambrosio García
                </h3>
                <p class="subtitle t-muted">Mi kernel requiere de mucha mano de obra</p>
                <!-- creamos los botones para redirigir a los links -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>
            </div>

            <div id="kernel3" class="form form-extra-carrousel">
                <h3 class="title">
                    Rosa Mosqueta
                </h3>
                <p class="subtitle t-muted">Proyecto muy ambicioso</p>
                <!-- creamos los botones para redirigir a los links -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>
            </div>
            
        </div>

        <h2 class="title">
            Nuevos
        </h2>
        <div class="marketplace-kernels">
            <div id="kernel3" class="form form-extra-carrousel">
                <h3 class="title">
                    Manola Fuertes
                </h3>
                <p class="subtitle t-muted">Mi ordenador es una patata ayudadme!</p>

                <!-- Creamos redes sociales? -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>

            </div>

            <div id="kernel4" class="form form-extra-carrousel">
                <h3 class="title">
                    Lucia Molinos
                </h3>
                <p class="subtitle t-muted">No es muy dificil!</p>

                <!-- Creamos redes sociales? -->
                <button  class="small-button c-h-b-blue" onclick="location.href='kernel_info.php'">0,06 c/seg</button>
                <button  class="small-button c-green" onclick="location.href='kernel_info.php'">Ejecutar</button>

            </div>
        </div>
        
    </div>
    
    <?php require_once("./includes/src/vistas/footer.php"); ?>

</body>

</html>