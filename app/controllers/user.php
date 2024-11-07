<?php

require_once('models/user.php');
require_once('lib/functions.php');

class UserController
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function register()
    {
        $errors = [];

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username'] ?? ''));
            $email = htmlspecialchars(trim($_POST['email'] ?? ''));
            $password = trim($_POST['password'] ?? '');

            if (empty($username)) {
                throw new Exception("Le nom d'utilisateur est requis !");
            }
            if ($this->userRepo->isUsernameExist($username)) {
                throw new Exception("Le nom d'utilisateur existe déjà !");
            }
            if (empty($email)) {
                throw new Exception("Un email est requis !");
                
            } 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("L' email n'existe pas !");
            }
            if (empty($password) || strlen($password) < 8) {
                throw new Exception ("Le mot de passe doit contenir au moins 8 caractères !");
            } 
            if (!strpbrk($password, "QWERTYUIOPASDFGHJKLZXCVBNM") || !strpbrk($password, "0123456789")) {
                throw new Exception ("Le mot de passe doit avoir au moins une majuscule et un chiffre !");
            }
            
            $user = new User($username, $email, $password);
                
            $success = $this->userRepo->registerUser($user);

                if ($success) {
                    header('Location: index.php?action=inscription');
                    get_mail($user);
                    exit();
                } else {
                    throw new Exception("Erreur lors de l'inscription");
                }

            }
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }
        
        require('views/register.php');
        
    }
}
