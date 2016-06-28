<?php
    foreach ($data as $item) {
?>
    <p><?= $item->id ?></p>
    <a href="index.php?route=post&id=<?= $item->id ?>"><video src="<?= $item->file_url ?>" width="400" autoplay muted></video></a>
    <br/>
<?php
    }
?>