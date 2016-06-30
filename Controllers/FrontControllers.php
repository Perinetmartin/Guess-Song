<?php
namespace Controller;
use Model\UsersRepository;
use Model\VideoRepository;

class FrontControllers
{
    private $repositoryUsers;
    private $repositoryVideo;
    private $users;
    private $video;
    public function __construct(\PDO $PDO)
    {
        $this->repositoryUsers = new UsersRepository($PDO);
        $this->repositoryVideo = new VideoRepository($PDO);
        $this->users = new UsersControllers($PDO);
        $this->video = new VideoControllers($PDO);
    }
    
    public function route(){
        session_start();
        if(isset($_GET['route'])){
            $currentRoute = $_GET['route'];
        }else{
            $currentRoute = 'home';
        }
        switch ($currentRoute){
            case 'home':
                $this->getHeader();
                include 'Views/home.php';
                $this->getFoot();
            break;

            case 'top':
                $this->getHeader();
                $data = $this->repositoryVideo->listerVideo();
                include "Views/top.php";
                $this->getFoot();
            break;

            case 'post':
                $this->getHeader();
                if(isset($_GET['id'])){
                    $currentId = $_GET['id'];
                    $data = $this->repositoryVideo->videoLauncher($currentId);
                    include 'Views/post.php';
                    
                }else{
                    include 'Views/page404.php';
                }
                $this->getFoot();
            break;
            
            case 'shots':
                $this->getHeader();
                $data = $this->repositoryVideo->selectAllVideo();
                include 'Views/shots.php';
                $this->getFoot();
            break;

            case 'upload':
                // Uploader un fichier
                // Envoyer ce fichier sur l'id_file
                if(isset($_GET['num'])) {
                    $number = $_GET['num'];
                    $data = $this->repositoryUsers->selectId($number);
                    if (!$data) {
                        include "Views/page404.php";
                        return;
                    }
                    // On passe $data en paramètre d'upload
                    $this->video->uploadAction($data);
                }
            break;

            case 'register':
                $this->users->register();
            break;
            
            case 'login':
                $this->users->login();
            break;

            case 'disconnect':
                include 'Views/auth/session.php';
            break;

            case 'like':
                if(isset($_GET['id'])){
                    $currentId = $_GET['id'];
                }else{
                    include 'Views/page404.php';
                    return;
                }
                $this->repositoryVideo->like($currentId);
                $id_user = $this->repositoryVideo->selectVideoById_file();
                $this->repositoryUsers->addPoint($id_user->id_user);
            break;

            case 'dislike':
                if(isset($_GET['id'])){
                    $currentId = $_GET['id'];
                }else{
                    include 'Views/page404.php';
                    return;
                }
                $this->repositoryVideo->dislike($currentId);
                $id_user = $this->repositoryVideo->selectVideoById_file();
                $this->repositoryUsers->removePoint($id_user->id_user);
            break;

            default:
                include 'Views/home.php';
                
        }
    }

    public function getHeader(){
        include "Views/header/header.php";
    }

    public function getFoot(){
        // On ajoute les scripts dans le footer.
        // en fonction du paramètre que l'utilisateur a passé
        $this->getScript();
        include 'Views/footer/foot.php';
    }

    public function getScript(){
        // foot.php comporte :
        // </body>
        // </html>
        include 'Views/footer/scripts.php';
    }
}