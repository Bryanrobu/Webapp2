<?php

session_start();
$is_admin = $_SESSION["admin"] ?? false;
$is_logged_in = isset($_SESSION["user"]);


if (!$is_admin) {
    die("You dont have permission to view this page");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/HorizonTravelsLogo.png" type="image/x-icon">
    <title>Edit</title>
</head>
<body>
    <?php include_once ('../includes/admin-header.php'); ?>
    <?php
    include('../process/db.php');
    $db = new db();
    $conn = $db->get_connection();
    $sql = 'SELECT * FROM reizen WHERE id = :id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['reis_id']);
    $stmt->execute();
    $reis = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="form-container center column">
        <h2 class="edit-subtxt">Reis aanpassen</h2>
        <?php if (isset($foutmelding)) echo "<p class='error'>$foutmelding</p>"; ?>

        <form class="formulier" action="../process/bewerk-reis.php" method="POST">
                <input type="text" class="formulier-input" name="land" placeholder="Land:" required value="<?php echo ($reis['land']); ?>">
                <input type="text" class="formulier-input" name="adress" placeholder="adres:" required value="<?php echo ($reis['adress']); ?>">
                <textarea class="formulier-input-medium" name="omschrijving" placeholder="Korte omschrijving:" required><?php echo ($reis['omschrijving']); ?></textarea>
                <textarea class="formulier-input-lang" name="beschrijving" placeholder="Lange beschrijving:" required><?php echo ($reis['beschrijving']); ?></textarea>
                <textarea class="formulier-input-lang" name="faciliteiten" placeholder="Faciliteiten (gescheiden door <br>):" required><?php echo ($reis['faciliteiten']); ?></textarea>
                <textarea class="formulier-input-lang" name="activiteiten" placeholder="Activiteiten (gescheiden door <br>):" required><?php echo ($reis['activiteiten']); ?></textarea>
                <button type="submit" class="verzend-knop">Verzend</button>
            </form>
    </div>
    <?php include_once ('../includes/footer.php'); ?>
</body>
</html>