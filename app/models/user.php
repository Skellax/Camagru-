<?php

require_once('config/database.php');
require_once('lib/functions.php');

class User 
{
    public string $username;
    public string $email;
    public string $password;
    public string $token = '';
    public bool $isValid = false;

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
        //Generate token for inscription
        $user->token = generate_token();

        //SQL REQUEST for adding user
        $query = $this->database->prepare(
            "INSERT INTO users(username, email, password, token, isValid) VALUES(:username, :email, :password, :token, :isValid)"
        );

        return $query->execute([
            ':username' => $user->username,
            ':email'=> $user->email,
            ':password' => $user->password,
            ':token' => $user->token,
            ':isvalid' => false,
        ]);
    }

    //Find if username exists or not
    public function isUsernameExist(string $username): bool
    {
        $query = $this->database->prepare(
            "SELECT COUNT(*) FROM users WHERE username = :username"
        );

        $query->execute(['username' => $username]);

        return $query->fetchColumn() > 0;
    }


    //Return a  user  content token in  parameter
    public function findUserByToken(string $token): ?object
    {
        $query = $this->database->prepare(
            "SELECT * FROM users WHERE token = :token"
        );

        $query->execute(['token' => $token]);
        return $query->fetch(PDO::FETCH_OBJ);
    }



    public function validateUser(int $user_id)
    {
        $query = $this->database->prepare(
            "UPDATE users SET isValid = 1 WHERE user_id = :user_id"
        );
        $query->execute(['user_id' => $user_id]);
    }
}