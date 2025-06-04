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
    <title>Sign up</title>
</head>
<body>
    <?php include_once ('includes/header.php'); ?>
    <main>
        <form class="login-form center column" action="login_process.php" method="POST">
            <h1 class="login-title">Registreren</h1>
            <label for="username" class="login-text">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" class="login-input" placeholder="Gebruikersnaam" required>
            
            <label for="password" class="login-text">Wachtwoord:</label>
            <input type="password" id="password" name="password" class="login-input" placeholder="Wachtwoord" required>
            
            <button type="submit" class="login-button">Registreer</button>
        </form>
        <div class="signup-forgot-cont row">
            <div class="signup-forgot-link">
                <p>Heb je al een account? <a href="../login.php" class="black underline">Log hier in</a></p>
            </div>
            <div class="signup-forgot-link">
                <p>Wachtwoord vergeten? <a href="../forgot-password.php" class="black underline">Klik hier</a></p>
            </div>
        </div>
    </main>
    <?php include_once ('includes/footer.php'); ?>
</body>
</html>