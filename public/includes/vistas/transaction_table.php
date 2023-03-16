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