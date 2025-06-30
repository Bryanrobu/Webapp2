<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $newPassword = $_POST["new-pass"]; // Get the username and new password from the POST request

    $db = new db();
    $conn = $db->get_connection();

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username"); // Prepare the SQL statement to check if the user exists
    $stmt->execute(['username' => $username]); 
    $user = $stmt->fetch(); 

    if ($user) {
        $update = $conn->prepare("UPDATE users SET password = :password WHERE username = :username"); 
        $update->execute([ 
            'password' => $newPassword, // Update the user's password
            'username' => $username // Use the username to identify the user
        ]);

        header("Location: /login.php?reset=success");
        exit;
    } else {
        header("Location: /forgot-password.php?error=user-not-found");
        exit;
    }
}