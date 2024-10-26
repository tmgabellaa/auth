<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dsn = "mysql:dbname=auto;host=localhost;port=3306;charset=utf8";
$user = "root";
$password = "";

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

$sql = "SELECT * FROM users";
foreach ($dbh->query($sql, PDO::FETCH_ASSOC) as $row) {
    print_r($row);
}
