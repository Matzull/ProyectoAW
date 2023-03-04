<div id="nav-bar-container">
    <div id="nav-bar">
        <div class="nav-bar-sec">
            <a href="/index.html"><img src="/img/logo-h-dMode.png" alt="" height="30"></a>
            <ul>
                <li><a href="/index.html">Inicio</a></li>
                <li><a href="/kernel_marketplace.php">Mercado de Kernels</a>
                    <ul>
                        <div class="dropdown-content">
                            <li><a href="/kernel_marketplace.php">Mercado de Kernels</a></li>
                            <li><a href="/ranking.php">Ranking</a></li>
                        </div>
                    </ul>
                </li>
                <li><a href="/FAQ.php">Información</a>
                    <ul>
                        <div class="dropdown-content">
                            <li><a href="/FAQ.php">FAQ</a></li>
                            <li><a href="/contacto.php">Contacto</a></li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
        <?php if (isset($_SESSION["user_email"])): ?>
            <div class="nav-bar-sec">
                <p>Username</p>
                <img src="https://picsum.photos/40/40" alt="" width="40">
            </div>
        <?php else: ?>
            <div class="nav-bar-sec">
                <button type="button" class="small-button c-h-blue" onclick="location.href='/login.php'">Iniciar sesión</button>
                <button type="button" class="small-button c-h-b-blue" onclick="location.href='/register.php'">Crear cuenta</button>
            </div>
        <?php endif; ?>
    </div>
</div>