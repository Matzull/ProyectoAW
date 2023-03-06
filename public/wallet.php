<?php 
    session_start();

    if(!isset($_SESSION["user_email"])){
        require "./includes/utilities/redirect.php";
        redirect("/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/nav_bar.css">
    <link rel="stylesheet" href="/css/user_dashboard.css">
</head>

<body>
    <?php require_once("./includes/nav_bar.php") ?>
    logged:
    <?php echo $_SESSION["user_email"] ?>
    <div class="panel-header">
        <i>Icono</i>
        <h2>CARTERA</h2>
    </div>
    <div class="sections-container">
        <div class="section">
            <h3>TUS TOKENS</h3>
            <button type="button">+</button>
            <p>1 000</p>
            <img src="https://picsum.photos/100/100" alt="" width="100">
        </div>
        <div class="section">
            <img src="https://picsum.photos/150/150" alt="" width="100">
        </div>
        <div class="section">
            <h3>GRÁFICA DE MOVIMIENTOS</h3>
            
            <h3>HISTORIAL DE MOVIMIENTOS</h3>
        </div>
    </div>
</body>

</html>