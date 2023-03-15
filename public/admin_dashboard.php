<?php
require 'includes/config.php';

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    die();
}
?>