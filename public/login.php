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
    <div class="form-container">
        <div class="form-drawing">
            <!-- dibujo blobs/ Flor -->
        </div>
        <div class="form">
            <h2 class="title">
                Iniciar Sesión
            </h2>
            <p class="subtitle t-muted">Iniciar sesión con tu usuario y contraseña.</p>
            <form action="/includes/controlador/login_endpoint.php" method="post">
                <label for="user_email">E-mail</label>
                <input id="user_email" class="input-field" type="text" name="user_email" placeholder="Escribe tu correo" required>
                <label for="user_password">Contraseña</label>
                <input id="user_password" class="input-field" type="password" name="user_password" placeholder="Escribe tu contraseña"
                    required>
                <div class="form-options">
                    <div>
                        <input type="checkbox" name="remember_me" id="remember_me" value="false">
                        <label for="remember_me">Recuérdame</label>
                    </div>
                    <a href="">¿Has olvidado tu contraseña?</a>
                </div>
                <button id="login-button" class="button c-h-blue" type="submit" title="Ingresar" name="Ingresar">Iniciar Sesión</button>
            </form>
            <p class="text-sec-button">¿No tienes cuenta?</p>
            <button class="button c-h-b-blue" type="button" id="CrearCuenta" onclick="location.href='/register.php'">
                Registrate</button>
        </div>
    </div>

</body>

</html>