<?php
namespace Controller;

use Model\UsersRepository;
use Model\VideoRepository;

class UsersControllers
{
    private $repository;
    private $video;
    public function __construct(\PDO $PDO)
    {
        $this->repository = new UsersRepository($PDO);
        $this->video = new VideoRepository($PDO);
    }
    
    public function listeAction(){
        $users = $this->repository->selectAllUsers();
        include 'Views/monde.php';
    }
}