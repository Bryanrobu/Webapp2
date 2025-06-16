<?php
 
class db {
    private $pdo;
 
    public function __construct() {
       
        $host = "db";
        $db = "mydatabase";
        $user = "user";
        $password = "password";
        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    }

    public function get_users($name) {
        $sql = "SELECT * FROM users WHERE username = :name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name]);
        return $stmt->fetchAll();
    }
   
    public function get_connection(): PDO {
        return $this->pdo;
    }
}

