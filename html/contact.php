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
    <div class="titel-contact center">
        <h1>Contacteer ons</h1>
    </div>

        <div class="form-cont center row">
            <form class="formulier" action="https://formsubmit.co/1211888@student.roc-nijmegen.nl" method="POST">
                <input type="text" class="formulier-input" name="naam" placeholder="Volledige naam:" required>
                <input type="text" class="formulier-input" name="email" placeholder="E-mail:" required>
                <input type="email" class="formulier-input" name="phone" placeholder="Telefoon nummer:" required>
                <textarea class="formulier-input-lang" name="bericht" placeholder="Bericht/opmerking:"></textarea>
                <button type="submit" class="verzend-knop">Verzend</button>
            </form>
        </div>

        <div class="andere-mogelijkheden-cont center column">
            <h1>Andere mogelijkheden voor contact</h1>
            <h1>‎</h1>
            <span>Mail naar: info@horizontravels.nl </span>
            <span>Bel naar: +31 6 123 456 78</span>
            <span>Kom langs: Ziekerstraat 77, 6511 LG Nijmegen</span>
        </div>

    </main>

    <?php include_once('includes/footer.php'); ?>
</body>

</html>