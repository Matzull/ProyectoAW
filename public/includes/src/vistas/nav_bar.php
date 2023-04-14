<div id="nav-bar-container">
    <div id="nav-bar">
        <div class="nav-bar-sec">
            <a href="index.php"><img src="<?= RUTA_IMGS ?>/logo-h-dMode.png" alt="" height="30"></a>
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
                <p class="username no-margin">
                    <a href="user_dashboard.php">
                        <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getName(); ?>
                    </a>
                </p>
                <a href="user_dashboard.php">
                    <img class="circle-border" src="<?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getPicUrl(); ?>" alt=""
                        width="30" height="30"/>
                </a>
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
        <button id="nav-bar-hamburger-b" class="small-button c-transparent" onclick="toggleDropdownHamburger()">
            <svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="path-1-inside-1_301_2" fill="white">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.97278 1.298C0.97278 0.607648 1.53242 0.0480042 2.22278 0.0480042H25.3318C26.0222 0.0480042 26.5818 0.607648 26.5818 1.298C26.5818 1.98836 26.0222 2.548 25.3318 2.548H2.22278C1.53242 2.548 0.97278 1.98836 0.97278 1.298ZM0.972993 7.67311C0.972993 6.98276 1.53264 6.42311 2.22299 6.42311H25.332C26.0224 6.42311 26.582 6.98276 26.582 7.67311C26.582 8.36347 26.0224 8.92311 25.332 8.92311H2.22299C1.53264 8.92311 0.972993 8.36347 0.972993 7.67311ZM2.17163 12.798C1.48127 12.798 0.921631 13.3576 0.921631 14.048C0.921631 14.7383 1.48127 15.298 2.17163 15.298H25.2807C25.971 15.298 26.5307 14.7383 26.5307 14.048C26.5307 13.3576 25.971 12.798 25.2807 12.798H2.17163Z"/>
            </mask>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.97278 1.298C0.97278 0.607648 1.53242 0.0480042 2.22278 0.0480042H25.3318C26.0222 0.0480042 26.5818 0.607648 26.5818 1.298C26.5818 1.98836 26.0222 2.548 25.3318 2.548H2.22278C1.53242 2.548 0.97278 1.98836 0.97278 1.298ZM0.972993 7.67311C0.972993 6.98276 1.53264 6.42311 2.22299 6.42311H25.332C26.0224 6.42311 26.582 6.98276 26.582 7.67311C26.582 8.36347 26.0224 8.92311 25.332 8.92311H2.22299C1.53264 8.92311 0.972993 8.36347 0.972993 7.67311ZM2.17163 12.798C1.48127 12.798 0.921631 13.3576 0.921631 14.048C0.921631 14.7383 1.48127 15.298 2.17163 15.298H25.2807C25.971 15.298 26.5307 14.7383 26.5307 14.048C26.5307 13.3576 25.971 12.798 25.2807 12.798H2.17163Z" fill="#FFF2F2"/>
            <path d="M2.22278 -0.951996C0.98014 -0.951996 -0.0272197 0.0553634 -0.0272197 1.298H1.97278C1.97278 1.15993 2.08471 1.048 2.22278 1.048V-0.951996ZM25.3318 -0.951996H2.22278V1.048H25.3318V-0.951996ZM27.5818 1.298C27.5818 0.0553641 26.5745 -0.951996 25.3318 -0.951996V1.048C25.4699 1.048 25.5818 1.15993 25.5818 1.298H27.5818ZM25.3318 3.548C26.5745 3.548 27.5818 2.54064 27.5818 1.298H25.5818C25.5818 1.43608 25.4699 1.548 25.3318 1.548V3.548ZM2.22278 3.548H25.3318V1.548H2.22278V3.548ZM-0.0272197 1.298C-0.0272197 2.54064 0.98014 3.548 2.22278 3.548V1.548C2.08471 1.548 1.97278 1.43608 1.97278 1.298H-0.0272197ZM2.22299 5.42311C0.980353 5.42311 -0.0270065 6.43047 -0.0270065 7.67311H1.97299C1.97299 7.53504 2.08492 7.42311 2.22299 7.42311V5.42311ZM25.332 5.42311H2.22299V7.42311H25.332V5.42311ZM27.582 7.67311C27.582 6.43047 26.5747 5.42311 25.332 5.42311V7.42311C25.4701 7.42311 25.582 7.53504 25.582 7.67311H27.582ZM25.332 9.92311C26.5747 9.92311 27.582 8.91575 27.582 7.67311H25.582C25.582 7.81119 25.4701 7.92311 25.332 7.92311V9.92311ZM2.22299 9.92311H25.332V7.92311H2.22299V9.92311ZM-0.0270065 7.67311C-0.0270065 8.91575 0.980353 9.92311 2.22299 9.92311V7.92311C2.08492 7.92311 1.97299 7.81119 1.97299 7.67311H-0.0270065ZM1.92163 14.048C1.92163 13.9099 2.03356 13.798 2.17163 13.798V11.798C0.92899 11.798 -0.0783691 12.8054 -0.0783691 14.048H1.92163ZM2.17163 14.298C2.03356 14.298 1.92163 14.1861 1.92163 14.048H-0.0783691C-0.0783691 15.2906 0.92899 16.298 2.17163 16.298V14.298ZM25.2807 14.298H2.17163V16.298H25.2807V14.298ZM25.5307 14.048C25.5307 14.1861 25.4187 14.298 25.2807 14.298V16.298C26.5233 16.298 27.5307 15.2906 27.5307 14.048H25.5307ZM25.2807 13.798C25.4187 13.798 25.5307 13.9099 25.5307 14.048H27.5307C27.5307 12.8054 26.5233 11.798 25.2807 11.798V13.798ZM2.17163 13.798H25.2807V11.798H2.17163V13.798Z" fill="#FFF2F2" mask="url(#path-1-inside-1_301_2)"/>
            </svg>
        </button>
        <div id="nav-bar-dropdown-h">
            <ul class="links-sec">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="kernel_marketplace.php">Mercado de Kernels</a></li>
                <li><a href="ranking.php">Ranking</a></li>
                <li><a href="FAQ.php">FAQ</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <?php if (isset($_SESSION["user_email"])): ?>
                <div class="nav-bar-sec">
                    <p class="no-margin">
                        <a href="user_dashboard.php">
                            <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getName(); ?>
                        </a>
                    </p>
                    <a href="user_dashboard.php">
                        <img class="circle-border" src="<?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getPicUrl(); ?>" alt=""
                            width="30" height="30"/>
                    </a>
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
        </div>
    </div>
</div>
<script src="<?= RUTA_JS ?>/nav_bar.js"></script>