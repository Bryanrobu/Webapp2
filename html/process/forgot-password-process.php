<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $newPassword = $_POST["new-pass"];

    $db = new db();
    $conn = $db->get_connection();

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user) {
        $update = $conn->prepare("UPDATE users SET password = :password WHERE username = :username");
        $update->execute([
            'password' => $newPassword,
            'username' => $username
        ]);

        // Redirect or confirm success
        header("Location: /login.php?reset=success");
        exit;
    } else {
        // User not found — optional error message
        header("Location: /forgot-password.php?error=user-not-found");
        exit;
    }
}