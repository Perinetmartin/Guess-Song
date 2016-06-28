<?php
namespace Controller;

use Model\UsersRepository;
use Model\VideoRepository;

class UsersControllers
{
    private $users;
    private $video;
    public function __construct(\PDO $PDO)
    {
        $this->users = new UsersRepository($PDO);
        $this->video = new VideoRepository($PDO);
    }
    
    public function register(){
        if(count($_POST) === 0){
            include 'Views/auth/register.php';
        }else{
            $this->test_register();
        }
    }
    
    private function test_register()
    {
        $errors = 0;
        // Si c'est vide
        if($errors == 0) {
            // Si les champs sont vide
            if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_repeat'])) {
                $errors = 1;
                echo 'All the field is not fill';
                return;
            }

            // Le mot de passe et la comfirmation du mot de passe doit correspondrent
            else if ($_POST['password'] != $_POST['password_repeat']) {
                $errors = 1;
                echo 'Please comfirm the same password';
                return;
            }

            // Le mot de passe ne doit pas être inférieur à 6 caractère
            else if (strlen($_POST['password']) < 6) {
                $errors = 1;
                echo 'Veuillez entrer un ';
                return;
            }
            // le prenom, nom et pseudo ne doit que contenir des caractère entre a-z, au minimun 2 caractère et maximu 64 caractères et
            else if (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['nom']) || !preg_match('/^[a-z\d]{2,64}$/i', $_POST['prenom']) || !preg_match('/^[a-z\d]{2,64}$/i', $_POST['pseudo'])) {
                $errors = 1;
                echo 'Only this character is accept between : "a-z, 2-64';
                return;
            }

            // Teste si le nom d'utilisateur rentré par l'utilisateur existe déjàa
            $this->AlreadyUsers();

            if($errors == 0){
                $this->users->insertUser();
                echo 'Very good ! You are now registered on Guess Song ! Enjoy :P';
            }
        }
    }

    private function AlreadyUsers(){
        // Si le pseudo ou l'email existe deja
        $users = $this->users->selectAllUsers();
        foreach ($users as $user) {
            if($user->pseudo === $_POST['pseudo'] || $user->email === $_POST['email']){
                echo 'The pseudo or the email is already taken';
                return;
            }
        }
    }

    public function login(){
        if(count($_POST) === 0) {
            include 'Views/auth/login.php';
        }else{
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];
            if(empty($pseudo) || empty($password)){
                echo 'Please enter a pseudo or a password';
                return;
            }

            $data = $this->users->selectAllUsers();
            foreach ($data as $item) {
                if($pseudo === $item->pseudo && password_verify($password, $item->password)){
                    echo "That's great ! You are now loged in";
                    return;
                }
            }
            echo 'The username or password are wrong';
        }
    }
}