<?php
require 'includes/config.php';

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    die();
}

// public static function buscaUsuario($user_email)
//     {
//         $conn = Aplicacion::getInstance()->getConexionBd();

//         $query = sprintf("SELECT * FROM users U WHERE U.user_email = '%s'", $conn->real_escape_string($user_email));
//         $rs = $conn->query($query);
//         if ($rs->num_rows == 0) {
//             return false;
//         } else {
//             $fila = $rs->fetch_assoc();
//             return new Usuario($fila['user_name'], $fila['user_email'], $fila['user_password'], $fila['millis_crunched'], $fila['ranking'], $fila['tokens'], $fila['last_active'], $fila['blocked']);
//         }
//     }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/user_nav_bar.css">
    <link rel="stylesheet" href="css/user_dashboard.css">
    <link rel="stylesheet" href="css/kernel_info.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/github-dark.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</head>

<body>
    <?php
    require_once "includes/config.php";
    require_once("./includes/vistas/nav_bar.php");
    ?>
    <div class="form-container">
        <div class="form">
            <h2 class="title">
                Informacion del Kernel
            </h2>
            <?php

            if (isset($_SESSION["user"])) {
            $javascript_code = <<<EOS
                //Generate matrices
                const generateMatrices = () => {
                    const matrices = [[], []]
                    for (let y = 0; y < 512; y++){
                        matrices[0].push([])
                        matrices[1].push([])
                        for (let x = 0; x < 512; x++){
                            matrices[0][y].push(Math.random())
                            matrices[1][y].push(Math.random())
                        }
                    }
                    return matrices
                }

                //Calculate kernels
                const gpu = new GPU();
                const multiplyMatrix = gpu.createKernel(function(a, b) {
                    let sum = 0;
                    for (let i = 0; i < 512; i++) {
                        sum += a[this.thread.y][i] * b[i][this.thread.x];
                    }
                    return sum;
                }).setOutput([512, 512])

                //Call the kernel
                const matrices = generateMatrices()
                const out = multiplyMatrix(matrices[0], matrices[1])

                //Log the output
                EOS;

                echo '<pre><code class="language-javascript">'.$javascript_code.'</code></pre>';
                
            } else {
                echo "<p>Necesitas estar registrado para ver la información del kernel, registrate aqui o si ya tienes cuenta haz login!</p>"; // TODO los enlaces
            }
            ?>

        </div>
    </div>


</body>

</html>