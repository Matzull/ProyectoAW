<?php

if (!isset($_SESSION["user_email"])) {
    echo "<p>Debes estar identificado para ver esta información</p>";
} else {
    $user = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
    $transactions = $user->getTransactions();
    foreach ($transactions as $i => $t) {
        echo $t->getJson();
    }
}
?>
<table>
    <thead>
        <tr>
            <th> fecha </th>
            <th> descripcion </th>
            <th> volumen </th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>