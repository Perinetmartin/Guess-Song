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

    public function insertUser(){
        $sql = "INSERT INTO
                users
                (nom, prenom, pseudo, password, email) 
                VALUES 
                (:nom, :prenom, :pseudo, :password, :email)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindValue(':nom', $_POST['nom']);
        $stmt->bindValue(':prenom', $_POST['prenom']);
        $stmt->bindValue(':pseudo', $_POST['pseudo']);
        $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
    }

    public function addPoint($id_user){
        $sql = "UPDATE `users`
              SET 
                `points` = points + 1
              WHERE 
                `id` = :id
            ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
    }

    public function removePoint($id_user){
        $sql = "UPDATE `users`
              SET 
                `points` = points - 1
              WHERE 
                `id` = :id
            ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
    }
}