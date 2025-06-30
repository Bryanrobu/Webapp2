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

        <?php
        require_once 'process/db.php';
        $db = new db();
        $conn = $db->get_connection(); //connectie maken met de database
        $sql = "SELECT reizen.id, reizen.land AS bestemming, COUNT(user_reizen.id) AS aantal_boekingen
            FROM reizen 
            JOIN user_reizen ON reizen.id = user_reizen.reis_id 
            GROUP BY reizen.land, reizen.id 
            ORDER BY aantal_boekingen DESC"; // SQL-query om de populairste bestemmingen te krijgen
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Voer de query uit en haal de resultaten op
        ?>

        <div class="row mobile-column">
            <div class="homepage-bestemmingen-cont center column">
                <h1 class="homepage-bestemmingen-title">Populaire bestemmingen</h1>
                <?php
                if ($result) {
                    $top3 = array_slice($result, 0, 3);
                    foreach ($top3 as $row) { // Loop door de resultaten en toon de bestemmingen
                        ?>
                        <div class="populaire-bestemmingen-blokje center column">
                            <h2><?php echo $row['bestemming']; ?></h2>
                            <a href="reizen-details.php?id=<?php echo ($row['id']); ?>" class="go-to-button center">Ga naar
                                pagina</a>
                                <!-- echo row id zorgt ervoor dat als je op de bestemming klikt, je naar de details van die specifieke reis gaat. -->
                        </div> 
                        <?php
                    }
                }
                ?>
            </div>
            <div class="homepage-bestemmingen-cont column">
                <h1 class="homepage-bestemmingen-title">Last-minute bestemmingen</h1>
                <?php
                $sql = "SELECT id, land FROM reizen WHERE last_minute = 1 ORDER BY RAND() LIMIT 3"; // SQL-query om last-minute bestemmingen te krijgen
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $lastMinutes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Voer de query uit en haal de resultaten op

                if ($lastMinutes) { // Controleer of er last-minute bestemmingen zijn
                    foreach ($lastMinutes as $reis) {
                        ?>
                        <div class="populaire-bestemmingen-blokje center column">
                            <h2><?php echo htmlspecialchars($reis['land']); ?></h2>
                            <a href="reizen-details.php?id=<?php echo $reis['id']; ?>" class="go-to-button center">Ga naar
                                pagina</a>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Geen last-minute bestemmingen beschikbaar.</p>";
                }
                ?>

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