<?php
namespace Controller;

use Model\UsersRepository;
use Model\VideoRepository;

class VideoControllers
{
    private $repository;
    private $video;

    public function __construct(\PDO $PDO)
    {
        $this->repository = new UsersRepository($PDO);
        $this->video = new VideoRepository($PDO);
    }

    public function uploadAction($data)
    {
        // On passe la variable $data
        // Cette variable correspond à $data = $this->repositoryUsers->selectId($number);
        // Dans le frontController
        if (count($_FILES) === 0) {
            include 'Views/upload.php';
        } else {
            if (!empty($_FILES)) {
                // Nom du fichier
                $file_name = $_FILES['fichier']['name'];

                // Récupère l'extension après le "." du fichier
                $file_extension = strrchr($file_name, ".");

                // Les extensions autorisées sont mp4 ou MP4
                $extensions_autorisee = ['.mp4', '.MP4', '.webm', '.WEBM'];

                // On récupère le poid du fichier
                $size = $_FILES['fichier']['size'];

                // La répertoire temporaire stockée dans une variable
                $file_tmp = $_FILES['fichier']['tmp_name'];

                // Le repertoire de destination avec le nom dedans
                $file_dest = 'assets/video/' . $file_name;

                // Si l'extension envoyés par le fichier fait parti de l'extension autorisées
                if (in_array($file_extension, $extensions_autorisee) && $size <= 5000000) {
                    // Le fichier temporaire sera mis dans le dossier de destination
                    if (move_uploaded_file($file_tmp, $file_dest)) {
                        echo 'Fichier envoyé avec succès';
                        // Insertion du chemin du fichier dans la base de données
                        $this->video->insertUploadedFile($file_name, $file_dest);
                    } else {
                        // Si l'envoi de marche pas : message d'erreur
                        echo "Une erreur est survenue lors de l'envoi";
                    }
                } else {
                    echo 'Seul les fichiers mp4 sont autorisées';
                }
            }
            header('Location: index.php?route=shots');
        }
    }

    public function uploadVideoWebcam(){
        $file_tmp = $_FILES['files']['tmp_name'];
        $file_name = $_FILES['files']['name'];

        $file_tmp = $file_tmp[0];
        $file_name = $file_name[0];
        $file_dest = 'assets/video/' . $file_name;
        if(!empty($_POST['nom_musique'])){
            if (move_uploaded_file($file_tmp, $file_dest)) {
                $this->video->insertVideoWebcam($file_name, $file_dest);
                echo 'Great ! You have upload';
            } else {
                echo 'error';
            }
        }else{
            echo 'Veuillez rentrer un texte';
        }
    }

    public function guessNameVideo(){
        $a = $_SESSION['id'];
        $data = $this->video->selectNomMusique($a);
        var_dump($data);
    }
}