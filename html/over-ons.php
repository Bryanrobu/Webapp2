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
    <title>Over ons</title>
</head>

<body>
    <?php include_once ('includes/header.php'); ?>
    <main>
        <div class="over-ons-cont">
            <h1>
                Over ons
            </h1>
            <span>
                Horizon Travels is jouw partner in onvergetelijke reiservaringen. Sinds 2010 brengen wij mensen naar de
                mooiste bestemmingen wereldwijd, met oog voor cultuur, comfort en duurzaamheid.
            </span>
        </div>
        <div class="over-ons-cont">
            <h1>
                Onze missie
            </h1>
            <span>
                We willen mensen inspireren en verbinden door middel van betekenisvolle reizen. Elke klant verdient een
                unieke, persoonlijke reiservaring.
            </span>
        </div>
        <div class="over-ons-cont">
            <h1>
                Waarom kiezen voor ons?
            </h1>
            <span>
                - Persoonlijke service op maat<br>
                - Unieke en verrassende bestemmingen<br>
                - 24/7 ondersteuning tijdens jouw reis<br>
                - Duurzaam en verantwoord reizen
            </span>
        </div>
        <div class="over-ons-cont">
            <h1>
                Ons team
            </h1>
            <span>
                <table>
                    <tr>
                        <th>Naam</th>
                        <th>Functie</th>
                        <th>Favoriete bestemming</th>
                    </tr>
                    <tr>
                        <td>Bryan van Wissen</td>
                        <td>Oprichter</td>
                        <td>Noorwegen</td>
                    </tr>
                    <tr>
                        <td>Sander Smits</td>
                        <td>Oprichter</td>
                        <td>Amerika</td>
                    </tr>
                    <tr>
                        <td>Cas Wenting</td>
                        <td>Reisadviseur</td>
                        <td>Griekenland</td>
                    </tr>
                    <tr>
                        <td>Niek de Heij</td>
                        <td>Social media manager</td>
                        <td>Zweden</td>
                    </tr>
                    <tr>
                        <td>Max van de Peppel</td>
                        <td>Marketing adviseur</td>
                        <td>Portugal</td>
                    </tr>
                </table>
            </span>
        </div>
    </main>
    <?php include_once ('includes/footer.php'); ?>
</body>

</html>