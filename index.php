<?php
    require 'vendor/autoload.php';
    require 'config.php';
    $route = new \Controller\FrontControllers($pdo);
    $route->route();
?>