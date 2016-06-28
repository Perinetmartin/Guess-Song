<?php
    foreach ($data as $item) {
?>
    <h3>id : <?= $item->id ?></h3><br/>
    <a href="index.php?route=post&id=<?= $item->id ?>"><video src="<?= $item->file_url ?>" width="400"></video></a><br/>
    <p>difference : <?= $item->difference_like ?></p><br/>
<?php
    }
?>