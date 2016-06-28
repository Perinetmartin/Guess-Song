<?php
    foreach ($data as $item) {
?>
    <p><?= $item->id ?></p>
    <video src="<?= $item->file_url ?>" width="400" autoplay></video>
    <br/>
<?php
    }
?>