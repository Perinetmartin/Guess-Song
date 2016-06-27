<?php
namespace Controller;

use Model\PageRepository;

class PageControllers
{
    private $repository;
    public function __construct(\PDO $PDO)
    {
        $this->repository = new PageRepository($PDO);
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
                $this->uploadFile();
                $this->getScript(0);
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

    public function uploadFile(){
        if(count($_FILES) === 0) {
            include 'Views/micro.php';
        }else{
            if(!empty($_FILES)){
                $file_name = $_FILES['fichier']['name'];
                $file_extension = strrchr($file_name, ".");
                $extensions_autorisee = ['.mp4', '.MP4'];
                $file_tmp = $_FILES['fichier']['tmp_name'];
                $file_dest =  $file_name;
                if(in_array($file_extension, $extensions_autorisee)){
                    // Il rentre dans le dossier assets/video puis il va ajouter le nom du fichier
                    // Le fichier temporaire sera mis dans le dossier
                    if(move_uploaded_file($file_tmp, 'assets/video/' . $file_dest)){
                        echo 'Fichier envoyé avec succès';
                        $this->repository->insertUploadedFile($file_name, $file_dest);
                    }else{
                        echo "Une erreur est survenue lors de l'envoi";
                    }
                }else{
                    echo 'Seul les fichiers mp4 sont autorisées';
                }
            }
        }
    }

}