<?php

namespace app\Controllers;

use app\Models\User;
use app\Repositories\UserRepository;
use Exception;

class UserControllers
{
   private UserRepository $userRepository;

   public function __construct()
   {
       $this->userRepository = new UserRepository();
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
               header("Location: /app1/public/login");
               die();
           }
       }
       require_once __DIR__ . '/../Views/register.php';
   }

   public function login() :void
   {
       if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $email = $_POST['email']??'';
           $password = $_POST['password']??'';

           if(!empty($email) && !empty($password)){
               session_start();
               $user = new User('',$email,$password);
               $result = $this->userRepository->login($user);

               if($result !== null) {
                   $_SESSION['user']['id'] = $result['id'];
                   $_SESSION['user']['name'] = $result['name'];
                   try {
                       header("Location: /app1/app/Views/admin.php");
                       die();
                   } catch (Exception $e) {
                       die("error redirect to admin from login" . $e->getMessage());
                   }
               } echo 'вернул нуулл';
           }
       }
       echo require_once __DIR__ . '/../Views/login.php';
   }
}
