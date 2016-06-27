<?php
namespace Model;
class PageRepository
{
    private $PDO;
    function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }
    
    function insertUploadedFile($name, $fileUrl){
        $sql = "INSERT INTO
                `video`
                (`file`, `file_url`) 
                VALUES
                (:file, :file_url)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue(':file', $name);
        $stmt->bindValue(':file_url', $fileUrl);
        $stmt->execute();
    }
}