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
    <?php include_once ('includes/header.php'); ?>

    <main>
        <form class="home-cont center column">
            <input type="text" id="destination" name="destination" class="zoek-balk" placeholder="Bestemming zoeken">
            <button type="submit" class="verzend-knop">Zoeken</button>
        </form>

        <div class="populaire-bestemmingen-cont center column">
            <div class="populaire-bestemmingen-blokje">
                
            </div>
            <div class="populaire-bestemmingen-blokje">
                
            </div>
            <div class="populaire-bestemmingen-blokje">
                
            </div>
            
        </div>

        <div class="welkom-text">
            
        </div>
    </main>
    <?php include_once ('includes/footer.php'); ?>
</body>
</html>