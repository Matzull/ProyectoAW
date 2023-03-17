<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    require 'includes/config.php';


    if (!isset($_SESSION["user_email"])) {
        echo '<p>Debes haberte identificado</p>';
    } else {
        $usuario = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
        $t = $usuario->gettoekns();
        echo "<p>actualmente tienes $t toekns</p>";
        $formulario = new \parallelize_namespace\formulario\FormularioTransaction();
        echo $formulario->gestiona();
    }

    ?>

</body>


</html>