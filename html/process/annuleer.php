<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: /login.php");
    exit;
}

require_once 'db.php';
$db = new db();
$conn = $db->get_connection();

$user_id = $_SESSION["id"];
$reis_id = $_POST["reis_id"] ?? null; // Get reis_id from POST data, if available

if ($reis_id !== null) {
    $stmt = $conn->prepare("DELETE FROM user_reizen WHERE user_id = :user_id AND reis_id = :reis_id");
    $stmt->execute([
        'user_id' => $user_id,
        'reis_id' => $reis_id
    ]); // Delete the specific trip for the user
}

header("Location: /account.php");
exit;