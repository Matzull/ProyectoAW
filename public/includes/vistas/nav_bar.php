<div id="nav-bar-container">
    <div id="nav-bar">
        <div class="nav-bar-sec">
            <a href="index.php"><img src="img/logo-h-dMode.png" alt="" height="30"></a>
            <ul class="links-sec">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="kernel_marketplace.php">Mercado de Kernels</a>
                    <ul>
                        <div class="dropdown-content">
                            <li><a href="kernel_marketplace.php">Mercado de Kernels</a></li>
                            <li><a href="ranking.php">Ranking</a></li>
                        </div>
                    </ul>
                </li>
                <li><a href="FAQ.php">Información</a>
                    <ul>
                        <div class="dropdown-content">
                            <li><a href="FAQ.php">FAQ</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
        <?php if (isset($_SESSION["user_email"])): ?>
            <div class="nav-bar-sec">
                <p>
                    <a href="user_dashboard.php">
                        <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getName(); ?>
                    </a>
                </p>
                <img src="<?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getPicUrl(); ?>" alt=""
                    width="40" />
                <button class="small-button c-h-b-blue" onclick="location.href='logout.php'">Cerrar
                    sesión</button>
            </div>
        <?php else: ?>
            <div class="nav-bar-sec">
                <button class="small-button c-h-blue" onclick="location.href='login.php'">Iniciar
                    sesión</button>
                <button class="small-button c-h-b-blue" onclick="location.href='register.php'">Crear
                    cuenta</button>
            </div>
        <?php endif; ?>
        <button id="nav-bar-hamburger-b" class="small-button c-h-b-blue" onclick="toggleDropdownHamburger()">=</button>
        <div id="nav-bar-dropdown-h">
            <ul class="links-sec">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="kernel_marketplace.php">Mercado de Kernels</a>
                    <ul>
                        <div class="dropdown-content">
                            <li><a href="kernel_marketplace.php">Mercado de Kernels</a></li>
                            <li><a href="ranking.php">Ranking</a></li>
                        </div>
                    </ul>
                </li>
                <li><a href="FAQ.php">Información</a>
                    <ul>
                        <div class="dropdown-content">
                            <li><a href="FAQ.php">FAQ</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="js/nav_bar.js"></script>