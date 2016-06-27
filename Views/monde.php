<?php
    foreach ($users as $item) {
?>
    <h2><?= $item->pseudo ?></h2>
    <a href="index.php?route=profil&num=<?= $item->id ?>">Profil</a>
    <a href="index.php?route=micro&num=<?= $item->id ?>">Chanter</a>
<?php
    }
?>