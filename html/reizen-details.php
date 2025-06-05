<?php
session_start();
$is_logged_in = isset($_SESSION["user"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/HorizonTravelsLogo.png" type="image/x-icon">
    <title>Contact</title>
</head>

<body>
    <?php include_once('includes/header.php'); ?>
    <main>
        <div class="details-cont center column">
            <div class="plaatje-details">

            </div>
            <div class="details-beschrijving-cont center">
                <div class="details-beschrijving">

                </div>
            </div>

        </div>
    </main>
    <?php include_once('includes/footer.php'); ?>
</body>

</html>