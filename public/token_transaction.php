<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>

    <link rel="stylesheet" href="css/token_transaction.css">
    <link rel="stylesheet" href="css/nav_bar.css">
    <link rel="stylesheet" href="css/user_nav_bar.css">
    <link rel="stylesheet" href="css/contacto.css">
</head>

<body>

    <?php

    require 'includes/config.php';


    if (!isset($_SESSION["user_email"])) {
        echo '<p>Debes haberte identificado</p>';
    } else {
       echo ' <div class="form-container">';
       echo ' <div class="form">';
        $usuario = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
        $t = $usuario->gettoekns();
        echo '<h2 class="title">Tokens</h2>';
        echo "<p class=\"subtitle t-muted\">Actualmente tienes $t tokens</p>";
        $formulario = new \parallelize_namespace\formulario\FormularioTransaction();
        echo $formulario->gestiona();
        echo ' </div>';
        echo ' </div>';
    }

    ?>

</body>


</html>