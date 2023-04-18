
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de transacciones</title>
    
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/transaction_table.css">
    
</head>
<body>
    
<?php

if (!isset($_SESSION["user_email"])) {
    echo "<p>Debes estar identificado para ver esta información</p>";
} else {
    $user = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
    $transactions = $user->getTransactions();

    if (sizeof($transactions) != 0) { ?>
        <table id="transaction_table">
            <thead>
                <tr>
                    <th> Fecha </th>
                    <th> Descripción </th>
                    <th> Volumen </th>
                    <th> Balance resultante </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($transactions as $i => $t) {
                    echo "<tr><td>" . $t->getTimestamp() . "</td><td>" . $t->getDescription() . "</td><td>" . $t->getQuantity() . "</td><td>" . $t->getBalance() . "</td><tr>";
                }
                ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay transaciones todavía</p>
    <?php }
} ?>