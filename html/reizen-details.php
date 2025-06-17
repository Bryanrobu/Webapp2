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
    $id = $_GET["id"];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $sql = "SELECT * FROM reizen WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
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
                        echo '<div class="center"><div class="boek-nu-knop">Je hebt deze reis al geboekt!</div></div>';
                    } else {
                        echo '<form class="center column" method="post" action="process/boeken.php?id=' . $row["id"] . '">
                                        <button type="submit" class="boek-nu-knop">Boek nu</button>
                                    </form>';
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


                $template = '<div class="reviews column"> <h1 class="review-template-name"> %s </h1> <h2 class="review-template-stars"> %s </h2>  <h3 class="review-template-message"> %s </h3> </div>';

                $stmt = $pdo->prepare("SELECT * FROM recensies WHERE reis_id=:reis_id");
                $stmt->execute(["reis_id" => $_GET["id"]]);
                $rows = $stmt->fetchAll();

                foreach ($rows as $row) {

                    $stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
                    $stmt->execute(["id" => $row["user_id"]]);
                    $user = $stmt->fetch();

                    echo sprintf($template, $user["username"], $row["score"] > 0 ? "Score: " . $row["score"] . "/5" : "", $row["content"], );
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