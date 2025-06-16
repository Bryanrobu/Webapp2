<?php
session_start();

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    die("Geen toegang");
}

include('../process/db.php');
$db = new db();
$conn = $db->get_connection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verwerking van het updateformulier
    $reis_id = $_POST["reis_id"];
    $land = $_POST["land"];
    $prijs = $_POST["prijs"];
    $beschrijving = $_POST["beschrijving"];
    $datum = $_POST["datum"];

    $stmt = $conn->prepare("UPDATE reizen SET land = :land, prijs = :prijs, beschrijving = :beschrijving, datum = :datum WHERE id = :id");
    $stmt->bindParam(':land', $land);
    $stmt->bindParam(':prijs', $prijs);
    $stmt->bindParam(':beschrijving', $beschrijving);
    $stmt->bindParam(':datum', $datum);
    $stmt->bindParam(':id', $reis_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: admin-reizen.php");
        exit;
    } else {
        $foutmelding = "Fout bij opslaan van aanpassingen.";
    }
} else {
    // Ophalen van gegevens voor weergave in formulier
    if (!isset($_GET["reis_id"])) {
        die("Geen reis geselecteerd.");
    }

    $reis_id = $_GET["reis_id"];
    $stmt = $conn->prepare("SELECT * FROM reizen WHERE id = :id");
    $stmt->bindParam(':id', $reis_id, PDO::PARAM_INT);
    $stmt->execute();
    $reis = $stmt->fetch();

    if (!$reis) {
        die("Reis niet gevonden.");
    }
}
?>