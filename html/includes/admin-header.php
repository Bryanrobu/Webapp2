<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Homepage</title>

</head>

<body>
    <header>
        <div class="header-sides-cont">

            <a href="../index.php" class="naam-doos">
                <img src="../images/HorizonTravelsLogo.png" class="reisbureau-logo" alt="Reisbureau logo">
            </a>
            <span class="naam-reisbureau">Horizon Travels</span>
        </div>
        <nav class="menu-bar">
            <a href="../index.php" class="menu-text">
                Home
            </a>
            <a href="../admin/admin.php" class="menu-text">
                Admin
            </a>
            <a href="../admin/geboekt.php" class="menu-text center">
                Admin-reizen
            </a>
        </nav>

        <?php
        if (!$is_logged_in) {
            echo '<div class="header-sides-cont">
                    <a href="/login.php" class="black login">Inloggen</a>
                </div>';
        } else {
            echo '<div class="header-sides-cont">
                <a href="/account.php?id=' . $_SESSION["id"] . '" class="black login">Account</a>
                </div>';
        }
        ?>
    </header>
</body>

</html>