<h3>id : <?= $data->id ?></h3><br/>
<video src="<?= $data->file_url ?>" width="400" controls></video><br/>
<p>difference : <?= $data->difference_like ?></p><br/>
<?php
    if(!empty($_SESSION)) {
?>
<!--        Requete ajax pour incrémenter et décrémenter-->
        <button class="btn-like">Like</button>
        <button class="btn-dislike">Dislike</button>
        <input type="hidden" class="id_hidden" value="<?= $data->id ?>"/>
<?php
    }
?>
