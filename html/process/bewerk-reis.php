<?php
session_start();

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    die("Geen toegang");
}

include('../process/db.php');
$db = new db();
$conn = $db->get_connection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!isset($_POST["reis_id"]) or !is_numeric($_POST["reis_id"])) {
        die("Ongeldig of ontbrekend reis-ID.");
    }

    $reis_id = $_POST["reis_id"];
    $land = $_POST["land"];
    $adress = $_POST["adress"];
    $beschrijving = $_POST["beschrijving"];
    $omschrijving = $_POST["omschrijving"];
    $faciliteiten = $_POST["faciliteiten"];
    $activiteiten = $_POST["activiteiten"];

    $stmt = $conn->prepare
    ("UPDATE reizen 
        SET land = :land, 
            adress = :adress, 
            omschrijving = :omschrijving, 
            beschrijving = :beschrijving,
            faciliteiten = :faciliteiten, 
            activiteiten = :activiteiten 
        WHERE id = :reis_id"
        );

    $stmt->bindParam(':land', $land);
    $stmt->bindParam(':adress', $adress);
    $stmt->bindParam(':beschrijving', $beschrijving);
    $stmt->bindParam(':omschrijving', $omschrijving);
    $stmt->bindParam(':faciliteiten', $faciliteiten);
    $stmt->bindParam(':activiteiten', $activiteiten);
    $stmt->bindParam(':reis_id', $reis_id);

    if ($stmt->execute()) {
        header("Location: ../admin/geboekt.php");
        exit;
    } else {
        $foutmelding = "Fout bij opslaan van aanpassingen.";
    }
} else {
    if (!isset($_GET["reis_id"]) || !is_numeric($_GET["reis_id"])) {
        die("Ongeldig of ontbrekend reis-ID (GET).");
    }

    $reis_id = (int) $_GET["reis_id"];

    // Ophalen van gegevens
    $stmt = $conn->prepare("SELECT * FROM reizen WHERE id = :reis_id");
    $stmt->bindParam(':reis_id', $reis_id, PDO::PARAM_INT);
    $stmt->execute();
    $reis = $stmt->fetch();

    if (!$reis) {
        die("Reis met ID $reis_id niet gevonden.");
    }
}
?>