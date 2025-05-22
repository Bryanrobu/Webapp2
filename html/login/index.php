<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../images/HorizonTravelsLogo.png" type="image/x-icon">  
    <title>Login</title>
</head>
<body>
    <?php include_once ('../includes/header.php'); ?>
    <main>
        <form class="login-form center column" action="login_process.php" method="POST">
            <label for="username" class="login-text">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" class="login-input" placeholder="Gebruikersnaam" required>
            
            <label for="password" class="login-text">Wachtwoord:</label>
            <input type="password" id="password" name="password" class="login-input" placeholder="Wachtwoord" required>
            
            <button type="submit" class="login-button">Login</button>
        </form>
        <div class="signup-forgot-cont row">
            <div class="signup-forgot-link">
                <p>Geen account? <a href="../signup" class="black underline">Registreer hier</a></p>
            </div>
            <div class="signup-forgot-link">
                <p>Wachtwoord vergeten? <a href="../forgot-password" class="black underline">Klik hier</a></p>
            </div>
        </div>
    </main>
    <?php include_once ('../includes/footer.php'); ?>
</body>
</html>