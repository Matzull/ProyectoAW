<div id="user-nav-bar">
    <div class="header">
        <p class="name">
            <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getName() ?>
        </p>
        <p class="email">
            <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getEmail() ?>
        </p>
    </div>
    <div id="user-nb-options" class="panel">
        <p><a href="user_dashboard.php"><img src="<?= RUTA_SVG ?>/Dashboard_i.svg" alt="" width="20"> Dashboard</a></p>
        <p><a href="wallet.php"><img src="<?= RUTA_SVG ?>/Wallet_i.svg" alt="" width="20"> Cartera</a></p>
        <p><a href="your_kernels.php"><img src="<?= RUTA_SVG ?>/Kernels_i.svg" alt="" width="20"> Tus Kernels</a></p>
        <p><a href="settings.php"><img src="<?= RUTA_SVG ?>/Settings_i.svg" alt="" width="20"> Ajustes</a></p>
        <button class="button c-h-blue" onclick="location.href='includes/src/controlador/logout_endpoint.php'"><img
                src="./<?= RUTA_SVG ?>/log-out_i.svg" alt="" width="18">Cerrar Sesión</button>
    </div>
    <div class="fold">
        <button id="user-nb-toggle-b" onclick="toggleUserNavBar()"><img src="./<?= RUTA_SVG ?>/Fold_i.svg" alt=""
                width="12"></button>
    </div>
</div>
<script src="<?= RUTA_JS ?>/user_nav_bar.js"></script>