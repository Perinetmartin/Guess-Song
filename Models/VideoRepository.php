<?php
namespace Model;
class VideoRepository
{
    private $PDO;

    function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    public function insertUploadedFile($name, $fileUrl)
    {
        $sql = "INSERT INTO
                `video`
                (`file`, `file_url`, `id_user`, `nom_musique`) 
                VALUES
                (:file, :file_url, :id_user, :nom_musique)";
        $stmt = $this->PDO->prepare($sql);
        // Md5 pour pouvoir générer un nom afin d'avoir plusieurs fois la vidéo dans la bdd
        $stmt->bindValue(':file', $name . md5($name));
        $stmt->bindValue(':file_url', $fileUrl);
        $stmt->bindValue(':id_user', $_POST['id_user']);
        $stmt->bindValue(':nom_musique', $_POST['nom_musique']);
        $stmt->execute();
    }

    public function insertVideoWebcam($name, $fileUrl)
    {
        $sql = "INSERT INTO
                `video`
                (`file`, `file_url`, `id_user`, `nom_musique`) 
                VALUES
                (:file, :file_url, :id_user, :nom_musique)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue(':file', $name);
        $stmt->bindValue(':file_url', $fileUrl);
        $stmt->bindValue(':id_user', $_SESSION['id']);
        $stmt->bindValue(':nom_musique', $_POST['nom_musique']);
        $stmt->execute();
    }

    public function selectVideoById($id){
        $sql = "
        SELECT 
          `id`,
          `file`,
        FROM 
          `video` 
        WHERE 
          `id` = :id
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function selectNomMusique($id){
        $sql = "
        SELECT 
          `id`,
          `nom_musique`,
        FROM 
          `video` 
        WHERE 
          `id` = :id
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function selectVideoById_file(){
        $sql = "
        SELECT 
          `id`,
          `id_user`
        FROM 
          `video` 
        WHERE 
          `id` = :id
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function selectAllVideo(){
        $sql = "
        SELECT 
          `id`, 
          `file`, 
          `file_url`
        FROM 
          `video` 
        ORDER BY id DESC
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function listerVideo(){
        $sql = "SELECT 
        id,
        file,
        file_url,
        difference_like
        FROM
        video
        ORDER BY difference_like DESC
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function like($currentId)
    {
        $sql= "UPDATE 
                `video`
              SET 
                `like_count` = 	like_count + 1,
                `difference_like` = difference_like + 1 
              WHERE 
                `id` = :id
            ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $currentId);
        $stmt->execute();
    }

    public function dislike($currentId)
    {
        $sql= "UPDATE 
                `video`
              SET 
                `dislike_count` = dislike_count + 1,
                `difference_like` = difference_like - 1
              WHERE 
                `id` = :id
            ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $currentId);
        $stmt->execute();
    }

    public function videoLauncher($id){
        $sql = " 
            SELECT 
            * 
            FROM users
            INNER JOIN video
                ON users.id = video.id_user 
            WHERE video.id = :id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }
}