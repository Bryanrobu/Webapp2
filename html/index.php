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
    <title>Home</title>
</head>

<body>
    <?php include_once('includes/header.php'); ?>

    <main>
        <form class="home-cont center column" action="process/reizen-zoeken.php" method="_GET">
            <input type="text" id="destination" name="destination" class="zoek-balk" placeholder="Bestemming zoeken">
            <button type="submit" class="verzend-knop">Zoeken</button>
        </form>

        <div class="row mobile-column">
            <div class="homepage-bestemmingen-cont center column">
                <h1 class="homepage-bestemmingen-title">Populaire bestemmingen</h1>
                <div class="populaire-bestemmingen-blokje">
                </div>
                <div class="populaire-bestemmingen-blokje">
                </div>
                <div class="populaire-bestemmingen-blokje">
                </div>
            </div>
            <div class="homepage-bestemmingen-cont column">
                <h1 class="homepage-bestemmingen-title">Last-minute bestemmingen</h1>
                <div class="populaire-bestemmingen-blokje">
                </div>
                <div class="populaire-bestemmingen-blokje">
                </div>
                <div class="populaire-bestemmingen-blokje">
                </div>
            </div>
        </div>
        <div class="home-page-welkom-cont center">
            <div class="welkom-text center column">
                <h1>Welkom bij Horizon Travels - Jouw avontuur begint hier!</h1>

                <h1>Droom jij van witte zandstranden, levendige steden of verborgen natuurparels? Bij Horizon Travels
                    maken
                    we jouw reiswensen werkelijkheid! Of je nu verlangt naar een ontspannen zonvakantie, een culturele
                    stedentrip of een avontuurlijke rondreis, er is voor iedereen een perfecte reis.</h1>

                <h1>Laat je inspireren door onze zorgvuldig geselecteerde topbestemmingen, of neem contact met ons op
                    voor
                    een reis op maat die helemaal bij jou past. Wij nemen al het werk uit handen en zorgen voor een
                    zorgeloze ervaring, van het moment van boeken tot je terugkomst thuis.</h1>

                <h1>Boek vandaag nog en maak herinneringen voor het leven!</h1>
                <a href="reizen.php" class="boek-nu">
                    <h1 class="pointer">Boek nu <img src="../images/arrow-right.png" alt="Een pijltje naar rechts"
                            class="pijltje pointer"></h1>
                </a>
            </div>

        </div>
    </main>
    <?php include_once('includes/footer.php'); ?>
    <button id="topBtn">↑ Top</button>
</body>
<script src="../process/main.js"></script>

</html>