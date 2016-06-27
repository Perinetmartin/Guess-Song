<?php
namespace Controller;

use Model\PageRepository;
use Model\VideoRepository;
class PageControllers
{
    private $repository;
    private $video;
    public function __construct(\PDO $PDO)
    {
        $this->repository = new PageRepository($PDO);
        $this->video = new VideoRepository($PDO);
    }

    public function route(){
        if(isset($_GET['route'])){
            $currentRoute = $_GET['route'];
        }else{
            $currentRoute = 'home';
        }
        switch ($currentRoute){
            case 'home':
                include 'Views/home.php';
                $this->getScript(0);
            break;

            case 'micro':
                // Uploader un fichier
                // Envoyer ce fichier sur l'id_file
                if(isset($_GET['num'])) {
                    $number = $_GET['num'];
                    $data = $this->repository->selectId($number);
                    if (!$data) {
                        include "Views/page404.php";
                        return;
                    }
                    $this->uploadFile($data);
                    $this->getScript(0);
                }
            break;

            case 'monde':
                $this->listeAction();
                $this->getScript(0);
            break;

            case 'profil':
                if(isset($_GET['num'])) {
                    $number = $_GET['num'];
                    $data = $this->repository->selectId($number);
                    if(!$data){
                        include "Views/page404.php";
                        return;
                    }
                    include 'Views/profil.php';
                }
            break;

            default:
                include 'Views/home.php';
                $this->getScript(0);
        }
    }

    public function getScript($state){
        // On ajoute les scripts dans le footer.
        // en fonction du paramètre que l'utilisateur a passé
        switch ($state){
            case '0' || 0:
                // Appel du script de base
                include 'Views/footer/scripts.php';
            break;
        }
        $this->getFoot();
    }

    public function getFoot(){
        // foot.php comporte :
        // </body>
        // </html>
        include 'Views/footer/foot.php';
    }

    public function listeAction(){
        $users = $this->repository->selectAllUsers();
        include 'Views/monde.php';
    }

    public function uploadFile($data){
        if(count($_FILES) === 0) {
            include 'Views/micro.php';
        }else{
            if(!empty($_FILES)){
                var_dump($_FILES);
                $file_name = $_FILES['fichier']['name'];
                $file_extension = strrchr($file_name, ".");
                $extensions_autorisee = ['.mp4', '.MP4'];
                $file_tmp = $_FILES['fichier']['tmp_name'];
                $file_dest =  'assets/video/' . $file_name;
                echo uniqid();
                if(in_array($file_extension, $extensions_autorisee)){
                    // Il rentre dans le dossier assets/video puis il va ajouter le nom du fichier
                    // Le fichier temporaire sera mis dans le dossier
                    if(move_uploaded_file($file_tmp, $file_dest)){
                        echo 'Fichier envoyé avec succès';
                        $this->video->insertUploadedFile($file_name, $file_dest);
                    }else{
                        echo "Une erreur est survenue lors de l'envoi";
                    }
                }else{
                    echo 'Seul les fichiers mp4 sont autorisées';
                }
            }
            header( 'Location: index.php?route=monde' );
        }
    }

}