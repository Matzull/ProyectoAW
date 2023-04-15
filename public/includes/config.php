<?php
session_start();

spl_autoload_register(
    function ($class) {

        // echo "<div>A importando " . $class . "</div>";

        // project-specific namespace prefix
        $prefix = 'parallelize_namespace/';

        // base directory for the namespace prefix
        $base_dir = __DIR__ . "/src/dao/";

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
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

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
        $prefix = 'parallelize_namespace/formulario/';

        // base directory for the namespace prefix
        $base_dir = __DIR__ . "/src/formularios/";

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
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // echo "<div>file " . $file . "</div>";
        // if the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    }
);

if (0) {//Cambiar si es el vps o el local
    require "config_vps.php";
} else {
    require "config_local.php";
}

