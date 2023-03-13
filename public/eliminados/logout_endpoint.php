<?php


session_start();

require "../utilities/redirect.php";

session_unset();
session_destroy(); 

redirect("/?msg=sesion terminada exitosamente");