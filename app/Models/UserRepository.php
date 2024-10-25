<?php

namespace app\Models;
use PDO;
use PDOException;

class UserRepository
{

     private PDO $pdo;

     public function __construct(PDO $pdo)
     {
         $this->pdo = $pdo;
     }

     public function register(User $user) : void
     {
         $sql = "INSERT INTO users (name,email,password) values (:name, :email, :password)";

         $stmt = $this->pdo->prepare($sql);

         try {
             $stmt->execute([
                 'name' => $user->getName(),
                 'email' => $user->getEmail(),
                 'password' => $user->getPassword()
             ]);
         }catch (PDOException $e){
             die("error register" . $e->getMessage());
         }

     }
}