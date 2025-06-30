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
    <?php include_once('includes/header.php');
    include("process/db.php");
    $db = new db();
    $conn = $db->get_connection();
    $result = [];
    $id = $_GET["id"]; // Get the id from the URL parameters
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) { // Check if the request method is GET and id is set
        $sql = "SELECT * FROM reizen WHERE id = :id"; // Prepare the SQL statement to fetch travel details by id
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]); // Execute the statement with the id parameter
        $result = $stmt->fetchAll();
        $row = $result[0] ?? null;
    }
    ?>
    <main>
        <div class="details-cont center column">
            <img src="../images/VakantiePlaatje.jpg" alt="Foto van een vakantie" class="plaatje-details">

            <div class="details-beschrijving-cont center row">
                <div class="details-beschrijving">
                    <div class="land">
                        <h1><?php echo $row["land"] ?></h1>
                    </div>
                    <div class="land">
                        <h2><?php echo $row["adress"] ?></h2>
                    </div>
                    <div class="lange-beschrijving-land">
                        <?php echo $row["beschrijving"] ?>
                    </div>
                    <div class="algemene-info-hotel center column">
                        <h1>Algemene informatie over het hotel</h1>
                        <div class="cont-faciliteiten-activiteiten center row">
                            <div class="faciliteiten column center">
                                <h1>Faciliteiten</h1> <br>
                                <?php echo $row["faciliteiten"] ?>
                            </div>
                            <div class="activiteiten column center">
                                <h1>Activiteiten</h1> <br>
                                <?php echo $row["activiteiten"] ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    if ($_GET["error"] ?? null == "already_booked") {
                        echo '<div class="center"><div class="boek-nu-knop">Je hebt deze reis al geboekt!</div></div>'; // Display a message if the user has already booked this trip
                    } else {
                        echo '<form class="center column" method="post" action="process/boeken.php?id=' . $row["id"] . '">
                                        <button type="submit" class="boek-nu-knop">Boek nu</button>
                                    </form>'; // Display the booking button if the user has not booked this trip yet
                    }
                    ?>

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


                $template = '<div class="reviews column"> <h1 class="review-template-name"> %s </h1> <h2 class="review-template-stars"> %s </h2>  <h3 class="review-template-message"> %s </h3> </div>'; // Template for displaying each review

                $stmt = $pdo->prepare("SELECT * FROM recensies WHERE reis_id=:reis_id"); // Prepare the SQL statement to fetch reviews for the specific travel id
                $stmt->execute(["reis_id" => $_GET["id"]]); // Execute the statement with the travel id parameter
                $rows = $stmt->fetchAll();

                foreach ($rows as $row) {

                    $stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id"); // Prepare the SQL statement to fetch user details by user id
                    $stmt->execute(["id" => $row["user_id"]]); // Execute the statement with the user id parameter
                    $user = $stmt->fetch();

                    echo sprintf($template, $user["username"], $row["score"] > 0 ? "Score: " . $row["score"] . "/5" : "", $row["content"], ); // Display each review using the template, including the username, score, and content
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
    <button id="topBtn">↑ Top</button>
</body>
<script src="../process/main.js"></script>

</html>