<?php
namespace Model;
class PageRepository
{
    private $PDO;
    function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    public function selectAllUsers(){
        $sql = "
        SELECT 
          `id`, 
          `nom`, 
          `prenom`, 
          `pseudo`, 
          `password`, 
          `email`
        FROM 
          `users` 
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function selectVideobyId(){
        $sql = "
        SELECT 
        * 
        FROM 
        users 
        INNER JOIN 
        video 
        ON 
        users.id = video.id_poste;";
    }
}