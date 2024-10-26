<?php

namespace src;

use Exception;
use PDO;

class Database
{
    private ?PDO $pdo = null;


    public function __construct()
    {
        $db_config = (require_once __DIR__ . '/../config.php')['db'];

        try {
            if($this->pdo === null) {
                $this->pdo = new PDO(
                    'mysql:host=' . $db_config['host'] . ';dbname=' . $db_config['db_name'] . ';port=' . $db_config['port'],
                    $db_config['username'],
                    $db_config['password']
                );
            }
        } catch (Exception $e) {
            die("error pdo connect" . $e->getMessage());
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}