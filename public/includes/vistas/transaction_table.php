<?php

if (!isset($_SESSION["user_email"])) {
    echo "<p>Debes estar identificado para ver esta información</p>";
} else {
    $user = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
    $transactions = $user->getTransactions();

}
?>
<table>
    <thead>
        <tr>
            <th> fecha </th>
            <th> descripción </th>
            <th> volumen </th>
            <th> balance resultante </th>
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