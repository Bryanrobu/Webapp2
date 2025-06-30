<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    require('db.php');

    $db = new db();
    $users = $db->get_users($user);
    
    $row = $users[0] ?? null; // Fetch the first user from the result set, or null if no users found
    
    if ($row == null) {
        header("location: /");
        exit;
    }

    if ($user == $row["username"] && $pass == $row["password"]) { // Check if the provided username and password match the database record
            session_start();
            $_SESSION["user"] = $row["username"]; // Store the username in the session
            $_SESSION["mail"] = $row["email"];
            $_SESSION["admin"] = false; // Initialize admin session variable to false
            $_SESSION["id"] = $row["id"]; 
            if ($row["is_admin"] == 1) { // Check if the user is an admin
                $_SESSION["admin"] = true;
                header("location: /admin/admin.php");
                exit;
            }
            header("location: /account.php?id=" . $row["id"]);
            exit;
        }
}
header("location: ../");