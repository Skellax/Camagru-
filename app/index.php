<?php 

require_once 'controllers/user.php';

$controller = new UserController();

if (isset($_GET['action']) && $_GET['action'] !== ''){
    if ($_GET['action'] === 'register')
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $controller->register();
        }

    }
    if ($_GET['action'] === 'inscription')
    {
        require('views/inscription.php');
    }
    if ($_GET['action'] === 'submit')
    {
        require('views/register.php');
    }
}
else
{
    require('views/login.php');

}
