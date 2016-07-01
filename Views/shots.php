<?php
    include 'Views/header/nav.php';
?>
<div class="center_bloc">
    <div class="bloc_shot">
        <ul>
        <?php
            foreach ($data as $item) {
        ?>
            <li><a href="index.php?route=post&id=<?= $item->id ?>"><video src="<?= $item->file_url ?>" width="400" height="300" muted class="video-top"></video></a></li>
        <?php
            }
        ?>
        </ul>
    </div>
</div>
</div>
<div class="bloc_droite"></div>
    