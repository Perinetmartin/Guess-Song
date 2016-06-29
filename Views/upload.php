<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="fichier" id="fichier"/><br />
    <input type="submit" name="submit" value="Envoyer" />
    <input type="hidden" name="id_user" value="<?= $data->id ?>">
</form>