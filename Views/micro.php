<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="fichier" id="icone"/><br />
    <input type="submit" name="submit" value="Envoyer" />
    <input type="hidden" name="id_file" value="<?= $data->id ?>">
</form>
