<?php
    include 'Views/header/nav.php';
?>
<div class="bloc_upload">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="blocUpload">
            <div class="uploadSing">
                <p>You have an funny sing video ?</p>
                <p>Upload it !</p>
            </div>
            <input type="file" name="fichier" id="fichier" class="inputFile"/><br />
        </div>
        <input type="submit" name="submit" value="Envoyer" class="btn-submit-upload"/>
        <input type="text" name="nom_musique" class="btn-guess-music" placeholder="What is the title of your music ?" required>
        <input type="hidden" name="id_user" value="<?= $data->id ?>">
    </form>
</div>
<p class="or">Or</p>
<a href="index.php?route=webcam">
    <div class="bloc_camera">
        <p>Sing on the webcam</p>
    </div>
    <div class="webcam">
        <a href="" class="closeWebcam">X</a>
        <video id="myVideo" class="pilou video-js vjs-default-skin"></video>

        <form action="" enctype="multipart/form-data" method="post" class="form_web">
            <input id="fileupload" type="file" name="files[]" multiple class="uploadFilechamp">
            <input type="text" name="nom_musique" class="btn-guess-musicWebcam" placeholder="What is the title of your music ?" required>
        </form>
    </div>
</a>
<div class="bloc_droite"></div>