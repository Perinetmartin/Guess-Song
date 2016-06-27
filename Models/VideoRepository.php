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
                (`file`, `file_url`) 
                VALUES
                (:file, :file_url)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue(':file', uniqid() . $name);
        $stmt->bindValue(':file_url', uniqid() . $fileUrl);
        $stmt->execute();
    }
}