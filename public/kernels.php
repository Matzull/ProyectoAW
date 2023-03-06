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
        <h2>TUS KERNELS</h2>
    </div>
    <div class="sections-container">
        <div class="section">
            <h3>HISTORIAL DE EJECUCIONES</h3>
            <div class="search-panel">
                <form action="">
                    <input type="text" name="" id="">
                    <button class="button c-h-blue" type="submit">Buscar</button>
                    <button class="button c-h-blue" type="button">Filtrar</button>
                    <select name="cars" id="cars">
                    <optgroup label="Fecha">
                        <option value="more recent first">Más reciente primero</option>
                        <option value="less recent first">Menos reciente primero</option>
                    </optgroup>
                    <optgroup label="Ingresos">
                        <option value="more income first">Más ingresos primero</option>
                        <option value="less income first">Menos ingresos primero</option>
                    </optgroup>
                    </select>
                </form>
            </div>
            <div class="execution-history">

            </div>
        </div>
        <div class="section">
            <h3>SUBIR KERNEL</h3>
            <img src="https://picsum.photos/150/150" alt="" width="100">
        </div>
    </div>
</body>

</html>