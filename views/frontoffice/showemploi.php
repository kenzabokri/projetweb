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
      background-image: url('./back.png'); 
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
  <?php foreach ($emplois as $emploi) { ?>
    var date = '<?= $emploi['date']; ?>';
    var dateDebut = '<?= $emploi['dateDebut']; ?>';

    // Appeler la fonction pour afficher le rappel de manière interactive
    afficherRappelModal(date, dateDebut);
  <?php } ?>
};

    </script>
      
      <style>
        .modal {
  display: none; /* Par défaut, la modal est cachée */
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
    /* Vos styles personnalisés pour le tableau */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      color: #333;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f5f5f5;
    }
    /* Style pour la première ligne du tableau (en-têtes) */
table tr:first-child {
  background-color: #f2f2f2; /* Couleur différente pour la première ligne */
}

/* Style pour les lignes autres que la première */
table tr:not(:first-child) {
  background-color: #ffffff; /* Couleur pour les autres lignes */
}

  </style>
</head>

<body>
<header>
<a href="#" class="logo"><img src="logo.png" alt=""></a>
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
        <div id="modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Rappel</h2>
    <p id="modalDate"></p>
    <p id="modalDateDebut"></p>
  </div>
  </div>
        <input type="text" id="searchInput" placeholder="Recherche par séance..." onkeyup="searchEmploi()">
        <div class="resultats-recherche" id="searchResults"></div>
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
  
<script src="../../views/backoffice/rechercheajax.js"></script>
<script>
  // Obtenez la modal
var modal = document.getElementById('modal');

// Obtenez le span élément pour fermer la modal
var span = document.getElementsByClassName('close')[0];

// Fonction pour afficher la modal avec les rappels
function afficherRappelModal(date, dateDebut) {
  // Afficher la modal
  modal.style.display = 'block';

  // Afficher les rappels dans la modal
  document.getElementById('modalDate').innerText = 'Date: ' + date;
  document.getElementById('modalDateDebut').innerText = 'Date de début: ' + dateDebut;
}

// Fermer la modal lorsqu'on clique sur 'x'
span.onclick = function () {
  modal.style.display = 'none';
}

// Fermer la modal lorsqu'on clique en dehors de celle-ci
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}

</script>

</body>
</html>

</body>

</html>
