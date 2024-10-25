<?php

namespace app\Controllers;

use app\Models\User;
use app\Models\UserRepository;
use src\Database;

class UserControllers
{
   private UserRepository $userRepository;

   public function __construct()
   {
       $db = new Database();
       $pdo = $db->getPdo();
       $this->userRepository = new UserRepository($pdo);
   }

   public function register() : void
   {
       error_log("Register method called");
       if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $name = $_POST['name']?? '';
           $email = $_POST['email']?? '';
           $password = $_POST['password']?? '';
           $passwordConf = $_POST['confirm_password']?? '';

           if(!empty($name) && !empty($email) && !empty($password) && $password === $passwordConf){
               $user = new User($name,$email,$password);
               $this->userRepository->register($user);
               header("Location: /app1/app/Views/login.php");
           }
       }
       require_once __DIR__ . '/../Views/register.php';
   }
}