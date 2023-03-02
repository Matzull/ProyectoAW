<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nav_bar.css">
</head>

<body style="background-color: var(--bg); margin: 0px">
    <?php require_once("./includes/nav_bar.php") ?>
    logged:
    <?php echo $_SESSION["user_email"] ?>
</body>

</html>