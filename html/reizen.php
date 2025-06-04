<?php
session_start();
$is_logged_in = isset($_SESSION["user"]);
$zoekterm = isset($_GET['search']) ? $_GET['search'] : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/HorizonTravelsLogo.png" type="image/x-icon">  
    <title>Reizen</title>
</head>
<body>
    <?php include_once ('includes/header.php'); ?>
    <?php 

    include("process/db.php");

    $db = new db();

    $conn = $db->get_connection();

    $result = [];

    $sql = "SELECT * FROM reizen";

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
        $search = "%" . $_GET["search"] . "%";
        $sql = "SELECT * FROM reizen WHERE land LIKE :search OR adress LIKE :search";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['search' => $search]);
        $result = $stmt->fetchAll();
    }

    $template = '
    <div>
        <div>
            <h1>%s</h1>
            <h2>%s</h2>
        </div>
        <h2">%s</h2>
    </div>
    ';
    ?>
    <?php
        foreach ($result as $row) {
            echo sprintf($template, $row["land"], $row["adress"], $row["omschrijving"]);
        }
        ?>
    <?php include_once ('includes/footer.php'); ?>
</body>
</html>