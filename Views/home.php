<div class="homepage">
    <div class="bloc_gauche"></div>
    <div class="bloc_centrage">
        <header>
            <ul>
        <?php
            if(empty($_SESSION)){
        ?>
                <li><a href="index.php?route=register">Register</a></li>
                <li><a href="index.php?route=login">Login</a></li>
                <li><a href="index.php?route=top">Top</a></li>
                <li><a href="index.php?route=shots">shots</a></li>
        <?php
            }else{
        ?>
                <a href="index.php?route=profil"><?= $_SESSION['pseudo'] ?></a>
                <a href="index.php?route=disconnect">Disconnect</a>
                <a href="index.php?route=top">Top</a>
                <a href="index.php?route=shots">shots</a>
                <a href="index.php?route=upload&num=<?= $_SESSION['id'] ?>">Upload</a>
        <?php
            }
        ?>
            </ul>
        </header>
        <div class="container"></div>
    </div>
    <div class="bloc_droite"></div>
