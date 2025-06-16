<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $email = $_POST["email"];

    require('db.php');

    $db = new db();
    $users = $db->get_users($user);
    
    $row = $users[0] ?? null;
    
    if ($row != null) {
        header("location: /");
        exit;
    }

    $success = $db->add_user($user, $pass, $email);
    if ($success) {
        // Get the user back to set session
        $users = $db->get_users($user);
        $row = $users[0] ?? null;

        if ($row) {
            session_start();
            $_SESSION["user"] = $row["username"];
            $_SESSION["mail"] = $row["email"];
            $_SESSION["id"] = $row["id"];
            $_SESSION["admin"] = false;
            header("Location: /account.php?id=" . $row["id"]);
            exit;
        }
    }
}
header("location: ../reizen.php");