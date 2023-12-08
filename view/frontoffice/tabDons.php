<?php
include '../../controller/donC.php';
include '../../model/don2.php';

$d = new donC();
$tab = $d->listdons();

// Récupérer les paramètres de l'URL
$Montant = isset($_GET['Montant']) ? $_GET['Montant'] : '';
$destination = isset($_GET['destination']) ? $_GET['destination'] : '';
$description = isset($_GET['description']) ? $_GET['description'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="icofont.css">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ART THERAPY</title>
<body>
<header>
    <a href="#" class="logo"><img src="./images/logo_2.png" alt=""></a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#banniere" onclick="toggleMenu();">Home</a></li>
        <li><a href="#apropos" onclick="toggleMenu();">About</a></li>
        <li><a href="#menu" onclick="toggleMenu();">Lessons</a></li>
        <li><a href="#event" onclick="toggleMenu();">Events</a></li>
        <li><a href="#expert" onclick="toggleMenu();">Our Art thearpists</a></li>
        <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>
        <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
        <li><a href="#donation" onclick="toggleMenu();">Donation</a></li>
        <li><a href="#signup" onclick="toggleMenu();">signUp</a></li>
        <a href="#login" class="btn-reserve"onclick="toggleMenu();">Login</a>
    </ul>
</header>

<section class="login" id="donation">
    <div class="titre noir">
        <h2 class="titre-text"><span>Your</span> donation</h2>
    </div>
    <div class="contactform">
        <div>
            <table border="1" align="center" width="70%">
                <tr>
                    <th>Montant</th>
                    <th>Destination</th>
                    <th>Description</th>
                </tr>
                <?php
                if (!empty($Montant) && !empty($destination) && !empty($description)) {
                ?>
                    <tr>
                        <td><?= $Montant; ?></td>
                        <td><?= $destination; ?></td>
                        <td><?= $description; ?></td>
                    </tr>
                <?php
                }
                ?>
            
            </table>
        </div>
    </div>
</section>



</html>
