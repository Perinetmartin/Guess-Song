<?php
    require 'vendor/autoload.php';
    require 'config.php';
    session_start();
    $route = new \Controller\FrontControllers($pdo);
    $route->route();
?>