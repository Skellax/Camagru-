<?php

require_once('config/database.php');

class User 
{
    public string $username;
    public string $email;
    public string $password;

    public function __construct(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

}

class UserRepository
{
    private \PDO $database;

    public function __construct(){

        $this->database = (new Database())->dbConnect();

    }

    public function registerUser(User $user): bool
    {
        $query = $this->database->prepare(
            "INSERT INTO users(username, email, password) VALUES(:username, :email, :password)"
        );

        return $query->execute([
            ':username' => $user->username,
            ':email'=> $user->email,
            ':password' => $user->password,
        ]);
    }
}