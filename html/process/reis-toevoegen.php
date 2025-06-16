<?php
session_start();

if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    die("Geen toegang.");
}

require_once 'db.php';
$db = new db();
$conn = $db->get_connection();

$land = $_POST["land"];
$adres = $_POST["adress"];
$omschrijving = $_POST["omschrijving"];
$beschrijving = $_POST["beschrijving"];
$faciliteiten = $_POST["faciliteiten"];
$activiteiten = $_POST["activiteiten"];

$stmt = $conn->prepare("
    INSERT INTO reizen (land, adress, omschrijving, beschrijving, faciliteiten, activiteiten)
    VALUES (:land, :bestemming, :omschrijving, :beschrijving, :faciliteiten, :activiteiten)
");

$stmt->execute([
    'land' => $land,
    'bestemming' => $adres,
    'omschrijving' => $omschrijving,
    'beschrijving' => $beschrijving,
    'faciliteiten' => $faciliteiten,
    'activiteiten' => $activiteiten,
]);

header("Location: ../admin/admin.php");
exit;