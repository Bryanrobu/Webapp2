<?php

session_start();
$is_admin = $_SESSION["admin"] ?? false;
$is_logged_in = isset($_SESSION["user"]);


if (!$is_admin) {
    die("You dont have permission to view this page");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/HorizonTravelsLogo.png" type="image/x-icon">
    <title>Geboekt</title>
</head>
<body>
    <?php include_once ('../includes/admin-header.php'); ?>
    <?php $template = 
    '
    <div class="reizen-blokje center column">
        <div class="reizen-blokje-header center column">
            <h1 class="reizen-headtxt">Reis naar %s</h1>
        </div>
        <form method="POST" action="../process/verwijder-reis.php"">
            <input type="hidden" name="reis_id" value="%s">
            <button type="submit" class="delete-edit-button pointer">Verwijder</button>
        </form>
        <form method="POST" action="bewerken.php?reis_id=%s">
            <button type="submit" class="delete-edit-button pointer">Aanpassen</button>
        </form>
    </div>
    '; 

    include('../process/db.php');
    $db = new db();
    $conn = $db->get_connection();
    $result = [];

    $sql = "SELECT * FROM reizen";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    ?>

    <section class="reizen-spacer-container center row">
    <?php
        foreach ($result as $row) {
            echo sprintf($template, $row["land"], $row["id"], $row["id"]);
        }
    ?>
    </section>

    <?php include_once ('../includes/footer.php'); ?>
</body>
</html>