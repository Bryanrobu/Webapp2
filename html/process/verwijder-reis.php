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
    $stmt = $conn->prepare("DELETE FROM reizen WHERE id = :id"); // Prepare the SQL statement to delete the travel entry
    $stmt->bindParam(':id', $reis_id, PDO::PARAM_INT); // Bind the reis_id parameter to the prepared statement

    if ($stmt->execute()) { // Execute the statement to delete the travel entry
        header("Location: ../admin/geboekt.php");
        exit;
    } else {
        echo "Verwijderen mislukt.";
    }
} else {
    echo "Ongeldige aanvraag.";
}
?>