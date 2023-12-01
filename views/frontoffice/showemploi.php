<?php

include '../../controller/emploic.php';

$emploic = new emploic();
$emplois = $emploic->list(); 

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../../model/style2.css">
  <link rel="stylesheet" href="../../model/style.css">
    <link rel="stylesheet" href="../../model/icofont.css">
    <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 200;
      background-color: #fff; 
      background-image: url('./back.jpg'); 
      background-size: cover; 
      background-position: center; 
    }
</style>
<script>
        // Fonction pour afficher la fenêtre pop-up
        function afficherRappel(date, dateDebut) {
            alert("Rappel:\nDate: " + date + "\nDate de début: " + dateDebut);
        }

        // Fonction pour exécuter le rappel lors du chargement de la page
        window.onload = function () {
            // Récupérer les données nécessaires pour le rappel
            <?php foreach ($emplois as $emploi) { ?>
                var date = '<?= $emploi['date']; ?>';
                var dateDebut = '<?= $emploi['dateDebut']; ?>';

                // Appeler la fonction pour afficher le rappel
                afficherRappel(date, dateDebut);
            <?php } ?>
        };
    </script>

</head>

<body>
<header>
        <a href="#" class="logo"><img src="../../images/logo_2.png" alt=""></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navbar">
            <li><a href="#banniere" onclick="toggleMenu();">Home</a></li>
            <li><a href="#apropos" onclick="toggleMenu();">About</a></li>
            <li><a href="#menu" onclick="toggleMenu();">Lessons</a></li>
            <li><a href="event.html">Events</a></li>
            <li><a href="#expert" onclick="toggleMenu();">Our Art thearpists</a></li>
            <li><a href="#temoignage" onclick="toggleMenu();">Temoignage</a></li>
            <li><a href="#contact" onclick="toggleMenu();">Contact</a></li>
            <li><a href="#donation" onclick="toggleMenu();">Donation</a></li>
            <li><a href="#signup" onclick="toggleMenu();">signUp</a></li>
            <a href="#login" class="btn-reserve"onclick="toggleMenu();">Login</a>
        </ul>
    </header>
  <div class="background"></div>
      </div>
      <div class="view">
<h1>        <div class="main-title">Emploi</div></h1>
        <div class="seperator"></div>
        <table border="1" align="center" width="70%">
          <tr>
            <th>id emploi</th>
            <th>date</th>
            <th>seance</th>
            <th>dateDebut</th>
            <th>dateFin</th>
            <th>idclasse</th>
          </tr>
          <?php
          foreach ($emplois as $emploi) {
          ?>
            <tr>
              <td><?= $emploi['idemploi']; ?></td>
              <td><?= $emploi['date']; ?></td>
              <td><?= $emploi['seance']; ?></td>
              <td><?= $emploi['dateDebut']; ?></td>
              <td><?= $emploi['dateFin']; ?></td>
              <td><?= $emploi['idclasse']; ?></td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
