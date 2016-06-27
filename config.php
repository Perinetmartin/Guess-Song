<?php
    try{
        $pdo = new \PDO("mysql:host=localhost;dbname=guess_song","root","");
        $pdo->query('SET NAMES \'utf8\'');
    } catch(PDOException $e){
        die($e->getMessage());
    }
?>