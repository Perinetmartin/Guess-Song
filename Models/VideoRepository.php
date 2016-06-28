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
                (`file`, `file_url`, `id_file`) 
                VALUES
                (:file, :file_url, :id_file)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue(':file', $name);
        $stmt->bindValue(':file_url', $fileUrl);
        $stmt->bindValue(':id_file', $_POST['id_file']);
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

    public function like()
    {
        $sql= "UPDATE 
                `users`
              SET 
                `like_count` = 	like_count + 1,
                `difference_like` = difference_like + 1
              WHERE 
                `id` = :id
            ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'],\PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    public function dislike()
    {
        $sql= "UPDATE 
                `users`
              SET 
                `dislike_count` = 	dislike_count + 1,
                `difference_like` = difference_like - 1
              WHERE 
                `id` = :id
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'],\PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    
//    public function differencelike(){
////        $this->selectVideoById($id);
//        $sql = "UPDATE
//        `video`
//        SET 
//          `difference_like` = like_count - dislike_count
//        WHERE
//          `id` = :id
//        ";
//        $stmt = $this->PDO->prepare($sql);
//        $stmt->bindParam(':id', $_POST['id_file']);
//        $stmt->execute();
//    }
}