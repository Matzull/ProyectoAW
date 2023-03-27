<?php

// Parámetros de configuración generales
define('RUTA_APP', '');
define('RUTA_IMGS', RUTA_APP . 'img');
define('RUTA_SVG', RUTA_APP . 'svg');
define('RUTA_CSS', RUTA_APP . 'css');
define('RUTA_JS', RUTA_APP . 'js');
define('INSTALADA', false);

// Parámetros de configuración de la BD
define('BD_HOST', 'vm03.db.swarm.test');
define('BD_NAME', 'parallelize_app');
define('BD_USER', 'root');
define('BD_PASS', 'vus2Aequu7uidie');

/* */
/* Configuración de Codificación y timezone */
/* */

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');