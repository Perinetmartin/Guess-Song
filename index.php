<?php
    require 'vendor/autoload.php';
    require 'config.php';
    include "Views/header/header.php";
    $route = new \Controller\FrontControllers($pdo);
    $route->route();
?>