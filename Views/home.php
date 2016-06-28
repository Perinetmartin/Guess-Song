<?php
    if(empty($_SESSION)){
?>
        <a href="index.php?route=register">Register</a>
        <a href="index.php?route=login">Login</a>
        <a href="index.php?route=top">Top</a>
        <a href="index.php?route=shots">shots</a>
<?php
    }else{
?>
        <a href="index.php?route=profil"><?= $_SESSION['pseudo'] ?></a>
        <p>Bonjour <?= $_SESSION['prenom'] ?></p>
        <a href="index.php?route=disconnect">Disconnect</a>
        <a href="index.php?route=top">Top</a>
        <a href="index.php?route=shots">shots</a>
<?php
    }
?>
