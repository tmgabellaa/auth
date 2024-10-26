<?php

namespace app\Repositories;

use PDO;
use src\Database;

abstract class Repository
{
    protected ?PDO $pdo = null;
    public function __construct()
    {
        if($this->pdo === null){
            $db = new Database();
            $this->pdo = $db->getPdo();
        }
    }
}