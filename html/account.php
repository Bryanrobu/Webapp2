<?php
    session_start();
    $is_logged_in = isset($_SESSION["user"]);

    if (!isset($_SESSION["user"])) {
        header("location: /");
        exit;
    }

    $username = $_SESSION["user"];
    $email = $_SESSION["mail"];
    
    require 'process/db.php';
       
    $db = new db();
    $conn = $db->get_connection();
    $users = $db->get_users($username);
    
    $row = $users[0] ?? null;
    
    if ($row == null) {
        header("location: /");
        exit;
    }

    $user_id = $_SESSION["id"];

    $stmt = $conn->prepare("
        SELECT reizen.* 
        FROM reizen
        JOIN user_reizen ON reizen.id = user_reizen.reis_id
        WHERE user_reizen.user_id = :user_id
    ");
    $stmt->execute(['user_id' => $user_id]);
    $geboekte_reizen = $stmt->fetchAll();
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/HorizonTravelsLogo.png" type="image/x-icon">
    <title>Account</title>
</head>
<body>
        
    <?php include_once ('includes/header.php'); ?>
    
    <main>
        <div class="account-info-container column center">
            <h1 class="account-headtxt">Account van <?php echo htmlspecialchars($username); ?></h1>
            <p class="account-subtxt">Email: <?php echo htmlspecialchars($email); ?></p>
            <div class="account-button-container row">
                <?php if ($_SESSION["admin"] == true): ?>
                    <a href="/admin/admin.php"><p class="account-button pointer">Admin pagina</p></a>
                <?php endif; ?>
            
                <a href="process/logout-process.php"><p class="account-button pointer">Uitloggen</p></a>
            </div>
        </div>
        <h2 class="center">Mijn geboekte reizen</h2>
        <div class="reizen-lijst">
            <?php if (empty($geboekte_reizen)): ?>
                <p class="center">Je hebt nog geen reizen geboekt.</p>
            <?php else: ?>
                <?php foreach ($geboekte_reizen as $reis): ?>
                    <div class="reis-card row center">
                        <div class="column center">
                            <h3><?php echo $reis['land']; ?></h3>
                            <p>omschrijving: <?php echo $reis['omschrijving']; ?></p>
                            <a href="/reizen-details.php?id=<?php echo $reis['id']; ?>">Bekijk details</a>
                            <form action="process/annuleer.php" method="POST">
                                <input type="hidden" name="reis_id" value="<?php echo $reis['id']; ?>">
                                <button type="submit"> Annuleer boeking </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>    
    <?php include_once ('includes/footer.php'); ?>
</body>
</html>