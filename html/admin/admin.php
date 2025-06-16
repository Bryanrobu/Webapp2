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
    <title>Admin</title>
</head>
<body>
    <?php include_once ('../includes/admin-header.php'); ?>
    <div class="form-cont admin-bg center column">
        <h1 class="admin-headtxt">Welkom op de admin pagina</h1>
        <h1 class="admin-subtxt">Reizen toevoegen</h1>
            <form class="formulier" action="../process/reis-toevoegen.php" method="POST">
                <input type="text" class="formulier-input" name="land" placeholder="Land:" required>
                <input type="text" class="formulier-input" name="adress" placeholder="adres:" required>
                <textarea class="formulier-input-medium" name="omschrijving" placeholder="Korte omschrijving:" required></textarea>
                <textarea class="formulier-input-lang" name="beschrijving" placeholder="Lange beschrijving:" required></textarea>
                <textarea class="formulier-input-lang" name="faciliteiten" placeholder="Faciliteiten (gescheiden door <br>):" required></textarea>
                <textarea class="formulier-input-lang" name="activiteiten" placeholder="Activiteiten (gescheiden door <br>):" required></textarea>
                <button type="submit" class="verzend-knop">Verzend</button>
            </form>
        </div>
    <?php include_once ('../includes/footer.php'); ?>
</body>
</html>