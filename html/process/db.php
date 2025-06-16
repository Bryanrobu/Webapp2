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

    public function add_user($username, $password, $email) {
    $stmt = $this->pdo->prepare("INSERT INTO users (username, password, email, is_admin) VALUES (?, ?, ?, 0)");
    return $stmt->execute([$username, $password, $email]);
}
   
    public function get_connection(): PDO {
        return $this->pdo;
    }
}

