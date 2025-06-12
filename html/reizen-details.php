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
                                - Bagageruimte<br>
                                - Zwembad <br> <br>
                                Tegen betaling<br>
                                - Restaurant<br>
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
            <div class="reviews-titel">
                <h1>Reviews</h1>
            </div>

            <div class="reviews-cont center row">


                <?php

                require_once 'process/db.php';
                $db = new db();
                $pdo = $db->get_connection();


                $template = '<div class="reviews"> <h1> %s </h1> <br> %s </div>';

                $stmt = $pdo->prepare("SELECT * FROM recensies WHERE reis_id=:reis_id");
                $stmt->execute(["reis_id" => $_GET["id"]]);
                $rows = $stmt->fetchAll();

                foreach ($rows as $row) {

                    $stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
                    $stmt->execute(["id" => $row["user_id"]]);
                    $user = $stmt->fetch();

                    echo sprintf($template, $user["username"], $row["content"]);
                }

                ?>
            </div>

            <div class="titel-contact center">
                <h1>Recenseer dit item</h1>
            </div>

            <div class="form-cont center row">
                <form class="formulier" action="process/post-review.php" method="POST">
                    <input name="travel_id" type="hidden" value="<?php echo $_GET["id"] ?>">
                    <input required type="number" class="formulier-input" name="score" max="5" min="1"
                        placeholder="Score (1-5)">
                    <textarea required class="formulier-input-lang" name="content"
                        placeholder="Bericht/opmerking:"></textarea>
                    <button type="submit" class="verzend-knop">Verzend</button>
                </form>
            </div>
        </div>
    </main>
    <?php include_once('includes/footer.php'); ?>
</body>

</html>