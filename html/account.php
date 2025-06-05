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
    $users = $db->get_users($username);
    
    $row = $users[0] ?? null;
    
    if ($row == null) {
        header("location: /");
        exit;
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </main>
    
    <?php include_once ('includes/footer.php'); ?>
</body>
</html>