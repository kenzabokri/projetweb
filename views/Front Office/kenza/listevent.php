<?php
include "../../../controller/kenza/evente.php";

$e = new eventc();
$tab = $e->list();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/final avec jointure sm - Copie/model/kenza/style.css">
    <link rel="stylesheet" href="/final avec jointure sm - Copie/model/kenza/icofont.css">
    <title>events</title>
    
   <!-- <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh;
            margin: 200;
            background-color: #fff;
            background-image: url('ba.png');
            background-size: cover;
            background-position: center;
        }
    </style>-->
</head>
<body>
<header>
    <a href="#" class="logo"><img src="/final avec jointure sm - Copie/images/logo_2.png" alt=""></a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#banniere" onclick="toggleMenu();">Home</a></li>
        <li><a href="#apropos" onclick="toggleMenu();">About</a></li>
        <li><a href="#menu" onclick="toggleMenu();">Lessons</a></li>
        <li><a href="/final avec jointure sm - Copie/views/Front Office/kenza/event.php">Events</a></li>
        <li><a href="#expert" onclick="toggleMenu();">Our Art Therapists</a></li>
        <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>
        <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
        <li><a href="#donation" onclick="toggleMenu();">Donation</a></li>
        <li><a href="#signup" onclick="toggleMenu();">SignUp</a></li>
        <a href="#login" class="btn-reserve" onclick="toggleMenu();">Login</a>
    </ul>
</header>

</body>
</html>
<style>
body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 200;
            background-color: #fff; 
            background-image: url('/final avec jointure sm - Copie/views/Front Office/kenza/ra.jpg'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
    
    
        <h1>List of events</h1>
<table border="1" align="center" width="70">
    <tr>
            <th>Nom de l'événement</th>
            <th>Date</th>
            <th>Description</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Capacité</th>
            <th>Image</th>
            <th>Lieu</th>
    </tr>


    <?php
    foreach ($tab as $event) {
    ?>




        <tr>
                <td><?= $event['nomevent']; ?></td>
                <td><?= $event['date']; ?></td>
                <td><?= $event['description']; ?></td>
                <td><?= $event['heuredebut']; ?></td>
                <td><?= $event['heurefin']; ?></td>
                <td><?= $event['capacite']; ?></td>
                <td><?= $event['image']; ?></td>
                <td><?= $event['lieu']; ?></td>
        </tr>
    <?php
    }
    ?>