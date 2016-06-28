<?php
namespace Model;
class VideoRepository
{
    private $PDO;

    function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    function insertUploadedFile($name, $fileUrl)
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
}