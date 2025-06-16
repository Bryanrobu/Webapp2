<?php
session_start();
$is_logged_in = isset($_SESSION["user"]);

if (!isset($_SESSION["user"])) {
        header("location: /");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/HorizonTravelsLogo.png" type="image/x-icon">  
</head>
<body>
    <?php include_once ('includes/header.php'); ?>
    <div class="form-cont center column">
        <h1 class="reizen-headtxt">Wachtwoord vergeten</h1>
        <form class="formulier" action="../process/forgot-password-process.php" method="POST">
            <input type="name" class="formulier-input" name="name" placeholder="Name:" required>
            <input type="password" class="formulier-input" name="new-pass" placeholder="New password:" required>
            <button type="submit" class="verzend-knop">Aanpassen</button>
        </form>
    <?php include_once ('includes/footer.php'); ?>
</body>
</html>