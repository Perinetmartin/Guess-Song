<?php
    foreach ($data as $item) {
?>
    <h3>id : <?= $item->id ?></h3><br/>
    <video src="<?= $item->file_url ?>" width="400" autoplay></video><br/>
    <p>difference : <?= $item->difference_like ?></p><br/>
<?php
    }
?>