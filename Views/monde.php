<?php
    foreach ($users as $item) {
?>
    <h2><?= $item->pseudo ?></h2>
    <a href="index.php?route=micro&num=<?= $item->id ?>">Micro</a>
<?php
    }
?>