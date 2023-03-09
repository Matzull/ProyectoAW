<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!DOCTYPE html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">

<head>
    <meta charset="utf-8">
    <title> Crear Cuenta </title>
    <meta name="keywords" content="Crear Cuenta">
    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <?php require "includes/utilities/toast.php"?>
    <div class="form-container">
        <div class="form">
            <h2 class="title">
                Crear Cuenta
            </h2>
            <p class="subtitle t-muted">Crea una cuenta para empezar...</p>
            <form action="/includes/controlador/register_endpoint.php">
                <label for="user_name">Nombre de usuario</label>
                <input id="user_name" class="input-field" type="text" name="user_name" placeholder="Escribe tu nombre de usuario"
                    required>
                <label for="user_email">E-mail</label>
                <input id="user_email" class="input-field" type="text" name="user_email" placeholder="Escribe tu correo" required>
                <label for="user_password">Contraseña</label>
                <input id="user_password" class="input-field" type="password" name="user_password" placeholder="Escribe tu contraseña" required>
                <label for="user_pass_conf">Confirmar la contraseña</label>
                <input id="user_pass_conf" class="input-field" type="password" name="user_pass_conf" placeholder="Vuelve a escribir la contraseña"
                    required>
                <div class="form-options">
                    <div>
                        <input type="checkbox" name="terms" id="terms" value="accepted">
                        <label for="terms">Acepto los términos y condiciones</label>
                    </div>
                </div>
                <button id="create-acc-button" class="button c-h-blue" type="submit" title="CrearCuenta" name="CrearCuenta">Crear
                    Cuenta</button>
            </form>
            <p class="text-sec-button">¿Ya tienes cuenta?</p>
            <button class="button c-h-b-blue" type="button" id="loginbutton" onclick="location.href='/login.php'">
            Iniciar Sesión</button>
        </div>
        <div class="form-drawing">
            <!-- dibujo blobs/ Flor -->
        </div>
    </div>

</body>

</html>