<?php

session_start();

$is_logged_in = $_SESSION["admin"] ?? false;

if (!$is_logged_in) {
    die("You dont have permission to view this page");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>
    <?php include_once ('../includes/header.php'); ?>
    
</body>
</html>