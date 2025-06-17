<?php
session_start();

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    die("Geen toegang");
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["reis_id"])) {
    include('../process/db.php');
    $db = new db();
    $conn = $db->get_connection();

    $reis_id = $_POST["reis_id"];
    $stmt = $conn->prepare("DELETE FROM reizen WHERE id = :id");
    $stmt->bindParam(':id', $reis_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ../admin/geboekt.php");
        exit;
    } else {
        echo "Verwijderen mislukt.";
    }
} else {
    echo "Ongeldige aanvraag.";
}
?>