<?php
    require 'vendor/autoload.php';
    require 'config.php';
    include "Views/header/header.php";
    $page = new \Controller\PageControllers($pdo);
    $page->route();
    include "Views/footer/foot.php";
?>

    