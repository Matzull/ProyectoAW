<?php
if (isset($_ENV["PRODUCTION"])) {
    require "config_vps.php";
} else {
    require "config_local.php";
}