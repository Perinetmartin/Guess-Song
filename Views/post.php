<?php
    include 'Views/header/nav.php';
?>
<div class="bloc_video_post">
    <video src="<?= $data->file_url ?>" width="1000" height="570" controls class="video-post" ></video><br/>
    <?php
        if(!empty($_SESSION)) {
    ?>
        <form action="index.php?route=guess" method="post">
            <input type="text" class="devine" placeholder="Guess the music !">
            <input type="submit" value="Deviner" class="btn-submit-devine">
        </form>
        <div class="resultat"></div>
    <!--        Requete ajax pour incrémenter et décrémenter-->
            <p>Like : <?= $data->like_count ?></p>
            <p>Like : <?= $data->dislike_count ?></p>
            <button class="btn-like-dislike btn-like ad">Like</button>
            <button class="btn-like-dislike btn-dislike">Dislike</button>
            <input type="hidden" class="id_hidden" value="<?= $data->id ?>"/>
    <?php
        }
    ?>
</div>
</div>
<div class="bloc_droite"></div>
