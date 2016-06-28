<?php
namespace Model;
class UsersRepository
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

    public function selectId($id){
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
        WHERE 
          `id` = :id
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }
}