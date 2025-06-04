<<<<<<< Updated upstream
=======
<?php
session_start();
$is_logged_in = isset($_SESSION["user"]);
?>

>>>>>>> Stashed changes
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
    <?php include_once ('includes/footer.php'); ?>
</body>
</html>