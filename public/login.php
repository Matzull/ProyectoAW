<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!DOCTYPE html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">

<head>
    <meta charset="utf-8">
    <title> Iniciar Sesión </title>
    <meta name="keywords" content="Formulario Acceso, Formulario de LogIn">
    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php require "includes/utilities/toast.php" ?>
    <div id="contenedor">
        <div id="dibujo">
            <!-- dibujo blobs/ Flor -->
        </div>
        <div id="central">
            <div id="back_box">
                <div id="login">
                    <h1>
                        Iniciar Sesión
                    </h1>
                    <div class="muted-text"> Iniciar sesión con tu usuario y contraseña.</div><br>
                    <form id="loginform" action="/includes/controlador/login_endpoint.php">
                        <div class="normal-text">E-mail</div>
                        <input class="box" type="text" name="user_email" placeholder="Escribe tu correo" required>
                        <div class="normal-text">Contraseña</div>
                        <input class="box" type="password" name="user_password" placeholder="Escribe tu contraseña"
                            required>
                        <!-- <div class="pie-form">
                                <div>
                                    <input type="checkbox" name="recuerdame" id="recuerdame" value="value">
                                    <label for="recuerdame">Recuérdame</label>
                                </div>
                                <a href="#">¿Has olvidado tu contraseña?</a> 
                            </div>
                        -->
                        <button id="loginbutton" type="submit" title="Ingresar" name="Ingresar">Iniciar Sesión</button>
                    </form>
                    <br><span>¿No tienes cuenta?</span><button id="CrearCuenta" onclick="jump_to_register()">
                        Registrate!</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function jump_to_register() {
            document.location = "/register.php"
        }
    </script>
</body>

</html>