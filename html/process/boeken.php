<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: /login.php");
    exit;
}

require_once '../process/db.php';
$db = new db();
$conn = $db->get_connection();

$reis = $_GET["id"] ?? null;
$user = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && $reis) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM user_reizen WHERE user_id = :user_id AND reis_id = :reis_id");
    $stmt->execute(['user_id' => $user, 'reis_id' => $reis]);
    $exists = $stmt->fetchColumn();

    if (!$exists) {
        $stmt = $conn->prepare("INSERT INTO user_reizen (user_id, reis_id) VALUES (:user_id, :reis_id)");
        $stmt->execute([
            'user_id' => $user,
            'reis_id' => $reis
        ]);
        echo "Boeking toegevoegd! <br>";
    } else {
        echo "Je hebt deze reis al geboekt. <br>";
    }
}

echo "Reis ID: " . htmlspecialchars($reis) . "<br>";
echo "Gebruiker ID: " . htmlspecialchars($user);
?>