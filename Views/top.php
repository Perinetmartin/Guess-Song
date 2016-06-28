<?php
    foreach ($data as $item) {
?>
    <a href="index.php?route=post&id=<?= $item->id ?>"><video src="<?= $item->file_url ?>" width="400" autoplay></video></a><br/>
    <p>difference : <?= $item->difference_like ?></p><br/>
    <input type="hidden">
<?php
    }
?>