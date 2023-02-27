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
    <div id="contenedor">
        <div id="central">
            <div id="back_box">
                <h1>
                    Crear Cuenta
                </h1>
                <div class="muted-text"> Crea una cuenta para empezar...</div>

                <div class="margin_box" id="signupform">
                    <form action="/includes/controlador/register_endpoint.php">
                        <div class="normal-text">Nombre de usuario</div>
                        <input class="box" type="text" name="usuario" placeholder="Escribe tu nombre de usuario"
                            required>
                        <div class="normal-text">E-mail</div>
                        <input class="box" type="text" name="usuario" placeholder="Escribe tu correo" required>
                        <div class="normal-text">Contraseña</div>
                        <input class="box" type="password" name="password" placeholder="Escribe tu contraseña" required>
                        <div class="normal-text">Confirmar la contraseña</div>
                        <input class="box" type="password" name="password" placeholder="Vuelve a escribir la contraseña"
                            required>
                        <div class="pie-form">
                            <div>
                                <input type="checkbox" name="terminos" id="terminos" value="value">
                                <label for="terminos">Acepto los términos y condiciones</label>
                            </div>
                        </div>
                        <button id="CrearCuenta" type="submit" title="CrearCuenta" name="CrearCuenta">Crear
                            Cuenta</button>
                    </form>
                    <br><span>Ya tienes una cuenta: </span>
                    <button type="button" id="loginbutton" onclick="location.href='./login.php'">
                    Iniciar Sesión</button>

                </div>
            </div>
        </div>
        <div id="dibujo">
            <!-- dibujo blobs/ Flor -->
        </div>
    </div>

</body>

</html>