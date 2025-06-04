<?php

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $db = new db();
    $users = $db->get_users($user);
    
    $row = $users[0] ?? null;
    
    if ($row == null) {
        header("location: /");
        exit;
    }

    if ($user == $row["username"] && $pass == $row["password"]) {
            session_start();
            $_SESSION["user"] = $row["username"];
            $_SESSION["mail"] = $row["email"];
            if ($row["is_admin"] == 1) {
                $_SESSION["admin"] = true;
                header("location: /admin/admin.php");
                exit;
            }
            header("location: /acount.php?id=" . $row["id"]);
            exit;
        }
}
header("location: ../");