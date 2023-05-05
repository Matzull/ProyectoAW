<?php
namespace parallelize_namespace;

require 'includes/config.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/global.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/nav_bar.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/FAQ.css">
    <link rel="stylesheet" href="<?= RUTA_CSS ?>/footer.css">
</head>

<body>
    <?php require('./includes/src/vistas/nav_bar.php') ?>
    <div class="main-container">
        <div class="sections-container">
            <div id="faq-section" class="section">
                <h1 class="title-FAQ">
                    FAQ
                </h1>
                <div class="FAQ-index">
                        <div class="FAQs-c1">
                            <h2>Preguntas generales</h2>
                            <!-- Las preguntas deben ser enlaces a las respuestas pero por ahora solo las vistas -->
                            <div class="question-FAQ" >
                                <p><a href="#q1">¿Cómo contactar con el equipo?</a></p>
                                <p><a href="#q2">Tengo problemas con el registro de mi cuenta</a></p>
                                <p><a href="#q3">¿Cuáles son las redes sociales de paralellize?</a></p>
                                <p><a href="#q4">Tengo problemaas con el inicio de sesión en mi cuenta</a></p>
                                <p><a href="#q5">¿Cómo puedo valorar el trabajo del equipo de Parallelize?</a></p>
                            </div>
                        </div>
                    <div class="FAQs-c2">
                        <h2>Kernels</h2>
                        <div class="question-FAQ" >
                            <p><a href="#q6">¿Qué es un kernel?</a></p>
                            <p><a href="#q7">¿Cómo puedo ejecutar un kernel?</a></p>
                            <p><a href="#q8">Como subir mi propio kernel</a></p>
                            <p><a href="#q9">¿Qué es una iteración?</a></p>
                        </div>
                    </div>
                
                    <div class="FAQs-c3">
                        <h2>Funcionamiento de la aplicación</h2>
                
                        <div class="question-FAQ" >
                            <p><a href="#q10">¿Cómo funciona el ranking?</a></p>
                            <p><a href="#q11">¿En qué consiste la segmentación?</a></p>
                            <p><a href="#q12">¿Qué es la ejecución concurrente?</a></p>
                            <p><a href="#q13">¿Qué debo hacer para ganar dinero con Parallelize?</a></p>
                        </div>
                    </div>
                </div>
                <div class="answers">
                    <div id="q1" class="section-link">
                        <h2>¿Cómo contactar con el equipo?</h2>
                        <p class="t-m-white">Para cualquier consulta relativa a la página web  o al funcionamiento de los kernel no dudes en contactar con nosotros, para ello solo tendrás que pulsar en 'Contacto' dentro de la pestaña Información, una vez dentro solo tendrás que escribir el comentario/consulta que le quieras enviar al equipo. Aunque te recomendamos que primero busques tu pregunta en esta sección de FAQ ya que ahorrarás tiempo en responder a tu consulta.</p>
                    </div>
                    <div id="q2" class="section-link">
                        <h2>Tengo problemas con el registro de mi cuenta</h2>
                        <p class="t-m-white">Si estás teniendo dificultades con el registro de tu cuenta es posible que no estés introduciendo bien algún campo, estos son algunos de los posibles motivos:</p>
                        <ul class="t-m-white">
                            <li>La contraseña no cumple los requisitos de seguridad (como que por ejemplo no tengo la longitud adecuada).</li>
                            <li>El correo electrónico no es válido: asegúrate de que estás introduciendo un correo electrónico real ya que sino no será posible crear la cuenta.</li>
                            <li>El correo que estás intentando introducir ya tiene asignada una cuenta.</li>
                        </ul>
                        <p class="t-m-white">Si cumples todos los requisitos mencionados anteriormente no dudes en contactar con nuestro equipo técnico para proporcionarte ayuda personalizada.</p>
                    </div>
                    <div id="q3" class="section-link">
                        <h2>¿Cuáles son las redes sociales de paralellize?</h2>
                        <p class="t-m-white">Puedes encontrar las redes sociales de parallelize en la pestaña de contacto dentro de información.</p>
                    </div>
                    <div id="q4" class="section-link">
                        <h2>Tengo problemas con el inicio de sesión en mi cuenta</h2>
                        <p class="t-m-white">Si no consigues iniciar sesión asegúrate de estar introduciendo bien tus credenciales, y si aun así no consigues iniciar sesión puedes probar a cambiar la contraseña. Si aun así no consigues inicar sesión puedes contactar con el equipo de soporte.</p>
                    </div>
                    <div id="q5" class="section-link">
                        <h2>¿Cómo puedo valorar el trabajo del equipo de Parallelize?</h2>
                        <p class="t-m-white">Te agradecemos que decidas dedicar tu tiempo a valorar nuestro trabajo, puedes escribir una valoración en el formulario de contacto, que llegará al equipo de Parallelize directamente.</p>
                    </div>
                    <div id="q6" class="section-link">
                        <h2>¿Qué es un kernel?</h2>
                        <p class="t-m-white">Un kernel es un código que por su complejidad o longitud de ejecución no puede ser ejecutado en un solo ordenador, ahí es donde entra Parallelize, donde el usuario dueño del código lo sube como kernel para que otros usuarios pongan su ordenador para ejecutar el codigo (kernel) a cambio de tokens.</p>
                    </div>
                    <div id="q7" class="section-link">
                        <h2>¿Cómo puedo ejecutar un kernel?</h2>
                        <p class="t-m-white">Para ejecutar un kernel, después de iniciar sesión dirigete al mercado de kernels, una vez en el mercado solo tendrás que elegir el kernel que mejor encaje con tu requisitos, pulsar en el botón más info y darle a ejecutar.</p>
                    </div>
                    <div id="q8" class="section-link">
                        <h2>Como subir mi propio kernel</h2>
                        <p class="t-m-white">Para subir tu propio kernel deberás dirgirte a tu perfil, pulsar en la opción 'Tus kernels' y elegir la opción 'subir kernel', hecho esto solo faltará rellenar la información relativa al kernel que vas a subir, te recomendamos leer siguiente documentación: https://github.com/gpujs/gpu.js/#supported-math-functions antes de subir tu primer kernel.</p>
                    </div>
                    <div id="q9" class="section-link">
                        <h2>¿Qué es una iteración?</h2>
                        <p class="t-m-white">Una iteración en un kernel es la ejecución de todos los segmentos del programa una vez. Un kernel se compone de multiples iteraciones.</p>
                    </div>
                    <div id="q10" class="section-link">
                        <h2>¿Cómo funciona el ranking?</h2>
                        <p class="t-m-white">El ranking es el reflejo de nuestro usuarios más activos y comprometidos, para entrar en el ranking tendrás que ser uno de los usuarios que mas segmentos ha ejecutado.</p>
                    </div>
                    <div id="q11" class="section-link">
                        <h2>¿En qué consiste la segmentación?</h2>
                        <p class="t-m-white">La segmentación de un kernel es la forma que tiene Parallelize de dividir un programa muy grande en distintas porciones más pequeñas que serán ejecutados por los distintos usuarios.</p>
                    </div>
                    <div id="q12" class="section-link">
                        <h2>¿Qué es la ejecución concurrente?</h2>
                        <p class="t-m-white">La ejecución concurrente en Parallelize es la capacidad de que distintos ususarios puedan ejecutar sus segmentos del mismo kernel a la vez.</p>
                    </div>
                    <div id="q13" class="section-link">
                        <h2>¿Qué debo hacer para ganar dinero con Parallelize?</h2>
                        <p class="t-m-white">Si tu objetivo es ganar dinero a través de Parallelize lo que tendrás que hacer es poner tu dispositivo a procesar los distintos kernels que se ofrecen para así ganar tokens que podrás posreriormente cambiar por dinero real y transferir a tu cuenta.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require("./includes/src/vistas/footer.php"); ?>
</body>

</html>