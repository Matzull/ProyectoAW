<?php
require 'includes/config.php';

// if (!isset($_SESSION['user'])) {
//     header("location: login.php");
//     die();
// }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kernel Info</title>
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/user_nav_bar.css">
    <link rel="stylesheet" href="css/user_dashboard.css">
    <link rel="stylesheet" href="css/kernel_info.css">
    <link href="../prism.css" rel="stylesheet" />
    <script src="../prism.js"></script>
    
    
</head>

<body>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-core.min.js"></script> -->
	
    <?php
    require_once "includes/config.php";
    require_once("./includes/vistas/nav_bar.php");
    ?>
    <div class="flex-container-info">
        <div class="codeBlock">
            <h2 class="title">
                Informacion del Kernel
            </h2>
            <?php
            $javascript_code = <<<HTML
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
                HTML;
            echo '<pre><code class="language-javascript">'.$javascript_code.'</code></pre>';

            ?>

        </div>
        
        <div class="information">
            <div class=block>
                <h2 class="title">
                    Informacion del Kernel
                </h2>
            </div>
            <div class=block>
                bai
            </div>
        </div>
    </div>


</body>

</html>