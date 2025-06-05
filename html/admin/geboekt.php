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
    <?php include_once ('../includes/footer.php'); ?>
</body>
</html>