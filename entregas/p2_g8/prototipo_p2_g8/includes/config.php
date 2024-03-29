<?php
session_start();
require_once 'includes/utils.php';

spl_autoload_register(
    function ($class) {

        // echo "<div>A importando " . $class . "</div>";

        // project-specific namespace prefix
        $prefix = 'parallelize_namespace';

        // base directory for the namespace prefix
        $base_dir = __DIR__ . "\\dao\\";

        // does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            // echo "<div>no se sirve para " . $prefix . "</div>";
            return;
        }
        // echo "<div>si me sirve para " . $prefix . "</div>";

        // get the relative class name
        $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $base_dir . str_replace('\\', '', $relative_class) . '.php';

        // if the file exists, require it
        // echo "<div>file " . $file . "</div>";

        if (file_exists($file)) {

            require $file;
        }
    }
);

spl_autoload_register(
    function ($class) {
        // echo "<div>B importando " . $class . "</div>";

        // project-specific namespace prefix
        $prefix = 'parallelize_namespace\formulario';

        // base directory for the namespace prefix
        $base_dir = __DIR__ . "\\formularios\\";

        // does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            // echo "<div>no se sirve para " . $prefix . "</div>";

            return;
        }
        // echo "<div>si me sirve para " . $prefix . "</div>";

        // get the relative class name
        $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $file = $base_dir . str_replace('\\', '', $relative_class) . '.php';

        // echo "<div>file " . $file . "</div>";
        // if the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    }
);

// Parámetros de configuración generales
define('RUTA_APP', '');
define('RUTA_IMGS', RUTA_APP . 'img');
define('RUTA_SVG', RUTA_APP . 'svg');
define('RUTA_CSS', RUTA_APP . 'css');
define('RUTA_JS', RUTA_APP . 'js');
define('INSTALADA', false);

// Parámetros de configuración de la BD
define('BD_HOST', 'localhost');
define('BD_NAME', 'parallelize_app');
define('BD_USER', 'root');
define('BD_PASS', '');

/* */
/* Configuración de Codificación y timezone */
/* */

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');