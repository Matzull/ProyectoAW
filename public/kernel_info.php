<?php
namespace parallelize_namespace;

require 'includes/config.php';
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
    <link rel="stylesheet" href="css/footer.css">
    <link href="../prism.css" rel="stylesheet" />
    <script src="../prism.js"></script>

</head>

<body>


    <?php
    require_once "includes/config.php";
    require_once("./includes/vistas/nav_bar.php");

    //$kernel = \parallelize_namespace\Kernel::buscaKernelPorId($_GET["kernel_id"]);
    ?>
    <div class="flex-container-info horizontal">
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
            //echo json_encode($javascript_code);
            $kernel = \parallelize_namespace\Kernel::buscaKernelPorId(1);
            echo '<pre><code class="language-javascript">' . $kernel->getCode() . '</code></pre>';
            ?>

        </div>

        <div class="flex-container-info vertical">
            <div class="form">
                <h2 class="title">
                    Informacion Adicional
                </h2>
                <p>Usuario: <?= \parallelize_namespace\Usuario::buscaUsuario($kernel->getuser_email())->getName() ?></p>
                <p>Estado: <?= json_decode($kernel->getrun_state())->status ?></p>
                <p class="form"><?= json_decode($kernel->getstatistics())->description ?></p>
            </div>
            <div class="form">
                <h2 class="title">
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
<?php require_once("./includes/vistas/footer.php");?>

</html>