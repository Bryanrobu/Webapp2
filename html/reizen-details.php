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
            <img src="../images/VakantiePlaatje.jpg" alt="Foto van een vakantie" class="plaatje-details">

            <div class="details-beschrijving-cont center row">
                <div class="details-beschrijving">
                    <div class="land">
                        <h1>Mallorca</h1> <br>
                    </div>
                    <div class="land">
                        <h2>Mallorcastraat 27</h2>
                    </div>
                    <div class="lange-beschrijving-land">
                        Mallorca is het grootste en meest veelzijdige eiland van de Balearen. Geniet van uitgestrekte
                        zandstranden, helderblauwe baaien en charmante dorpjes zoals Valldemossa en Sóller. De bruisende
                        hoofdstad Palma biedt cultuur, gastronomie en sfeervolle straatjes, terwijl de ruige bergen van
                        de Serra de Tramuntana uitnodigen tot wandelen en fietsen. Of je nu op zoek bent naar
                        ontspanning, natuur of cultuur. Mallorca heeft het allemaal.
                    </div>
                    <div class="algemene-info-hotel center column">
                        <h1>Algemene informatie over het hotel</h1>
                        <div class="cont-faciliteiten-activiteiten center row">
                            <div class="faciliteiten column center">
                                <h1>Faciliteiten</h1> <br>
                                - Gratis wifi in openbare ruimte <br>
                                - Gratis wifi op de kamer<br>
                                - Receptie (24 uur)<br>
                                - Bagageruimte<br><br>
                                Tegen betaling<br>
                                - Winkeltje(s)<br>
                                - Wasservice<br>
                            </div>
                            <div class="activiteiten column center">
                                <h1>Activiteiten</h1> <br>
                                - Beachvolleybal <br>
                                - Fitnessfaciliteiten <br>
                                - Multisportterrein <br>
                                - RiuFit groepslessen <br><br>
                                Tegen betaling<br>
                                - RiuArt atelier<br>
                            </div>

                        </div>
                        <div class="cont-faciliteiten-activiteiten center row">
                            <div class="restaurants column center">
                                <h1>Restaurants</h1> <br>
                                - 4 buffetrestaurants: Da Marcello (Italiaans), Kabuki (Aziatisch), Bereber (grill) en
                                Santo
                                Antao <br>
                                - 2 à-la-carterestaurants: Kulinarium (alleen voor Adults Only gasten) (Internationaal)
                                en
                                Boavista (Kaapverdisch) <br>
                                - 7 bars
                            </div>
                            <div class="zwembaden column center">
                                <h1>Zwembaden</h1> <br>
                                - 6 buitenbaden <br>
                                - 2 kinderbaden buiten <br>
                                - Badhanddoeken, ligbedden en parasols <br>
                                - Zonneterras
                            </div>
                        </div>
                    </div>


                    <div class="datum-vertrek center column">
                        <label for="datum" class="datum-text">Kies een datum van vertrek:</label>
                        <input type="date" id="datum" class="label-date">
                        <label for="datum" class="datum-text">Kies een datum van terugkomst:</label>
                        <input type="date" id="datum" class="label-date">
                        <button type="submit" class="boek-nu-knop">Boek nu</button>
                    </div>
                </div>
            </div>
            <div class="reviews-cont center column">
                <h1>Reviews</h1>
                <div class="reviews">
                    <h1>Bart Jansen</h1> <br>
                    Ik heb een heerlijke vakantie gehad op Mallorca! Het eiland is echt prachtig. We hebben genoten van
                    de
                    zon, de mooie stranden en de gezellige sfeer in de dorpjes. Palma was levendig en sfeervol, met
                    leuke
                    restaurants en mooie bezienswaardigheden zoals de kathedraal. Een hoogtepunt was zeker de wandeling
                    in
                    de Serra de Tramuntana; het uitzicht was adembenemend. Ook het eten was top, vooral de tapas en
                    verse
                    vis. Ik kom zeker nog eens terug!
                </div>
            </div>
        </div>
    </main>
    <?php include_once('includes/footer.php'); ?>
</body>

</html>