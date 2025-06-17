<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    require('db.php');

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
            $_SESSION["admin"] = false;
            $_SESSION["id"] = $row["id"];
            if ($row["is_admin"] == 1) {
                $_SESSION["admin"] = true;
                header("location: /admin/admin.php");
                exit;
            }
            header("location: /account.php?id=" . $row["id"]);
            exit;
        }
}
header("location: ../");