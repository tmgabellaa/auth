<?php

namespace app\Repositories;
use app\Models\User;
use Exception;
use PDO;
use PDOException;

class UserRepository extends Repository
{

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
             die("error register repository" . $e->getMessage());
         }
     }

     public function login(User $user)
     {
         $sql = "SELECT * FROM users where email = :email";
         $stmt = $this->pdo->prepare($sql);

         try {
             $stmt->execute(['email' => $user->getEmail()]);
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
         } catch (Exception $e) {
             die("error login repository or fetch_assoc" . $e->getMessage());
         }

         if ($result && password_verify($user->getPassword(), $result['password'])) {
             return $result;
         } else {
             echo "Неверный логин или пароль.";
             return null;
         }
     }
}