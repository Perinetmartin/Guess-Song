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
        $this->getHeader();
        if(isset($_GET['route'])){
            $currentRoute = $_GET['route'];
        }else{
            $currentRoute = 'home';
        }
        switch ($currentRoute){
            case 'home':
                include 'Views/home.php';
                $this->getScript();
            break;

            case 'top':
                $data = $this->repositoryVideo->listerVideo();
                include "Views/top.php";
            break;

            case 'post':
                if(isset($_GET['id'])){
                    $currentId = $_GET['id'];
                    $data = $this->repositoryVideo->videoLauncher($currentId);
                    include 'Views/post.php';
                }else{
                    include 'Views/page404.php';
                }
            break;
            
            case 'shots':
                $data = $this->repositoryVideo->selectAllVideo();
                include 'Views/shots.php';
            break;

            case 'micro':
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
                    $this->getScript();
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

            default:
                include 'Views/home.php';
                $this->getScript();
        }
    }

    public function getHeader(){
        include "Views/header/header.php";
    }

    public function getScript(){
        // On ajoute les scripts dans le footer.
        // en fonction du paramètre que l'utilisateur a passé
        include 'Views/footer/scripts.php';
        $this->getFoot();
    }

    public function getFoot(){
        // foot.php comporte :
        // </body>
        // </html>
        include 'Views/footer/foot.php';
    }
}