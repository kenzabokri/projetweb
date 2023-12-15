<?php
include "../../../controller/kenza/formulairef.php";

$f = new formulairef();
$tab = $f->list();

// Initialisation des compteurs
$nombreVisiteurs = 0;
$nombreParticipants = 0;
$statistiquesEvenements = array();

foreach ($tab as $formulaire) {
    // Statistiques des personnes (visiteur/participant)
    if ($formulaire['role'] == 'visiteur') {
        $nombreVisiteurs++;
    } elseif ($formulaire['role'] == 'participant') {
        $nombreParticipants++;
    }

    // Statistiques des événements
    $evenement = $formulaire['nome'];
    if (!isset($statistiquesEvenements[$evenement])) {
        $statistiquesEvenements[$evenement] = 1;
    } else {
        $statistiquesEvenements[$evenement]++;
    }
}

// Création d'un tableau pour les données des événements
$labelsEvenements = [];
$dataEvenements = [];

foreach ($statistiquesEvenements as $evenement => $nombreParticipants) {
    $labelsEvenements[] = $evenement;
    $dataEvenements[] = $nombreParticipants;
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<style>
  .scrollable-table {
    max-height: 400px; /* ajustez la hauteur maximale selon vos besoins */
    overflow-y: auto;
  }
</style>
</head>

<body>
  <div class="background">   
  </div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
      <a href="../../Front Office/index.php">Home </a>
      <p><a href="../../Front Office/user_management/logout.php">Log out</a></p>
        <div class="seperator"></div>
        <div class="list">
       <h1> <a href="./listevent.php" class="item ">events</a></h1>
        <div class="seperator"></div>
        <h1><a href="./addevent.php" class="item ">ADD event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listtype.php" class="item ">type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./addtype.php" class="item ">ADD type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./searchevent.php" class="item selected">search event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listformulaire.php" class="item ">form</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./statistique.php" class="item ">stat</a></h1>
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">kenza'S PANEL</div>
        <div class="main-title">Add event</div>
        <div class="seperator"></div>
<body>
<div class="scrollable-table">
  <div>
    <canvas id="personnesChart"></canvas>
  </div>
  
  <div>
    <canvas id="evenementsChart"></canvas>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctxPersonnes = document.getElementById('personnesChart');
    const ctxEvenements = document.getElementById('evenementsChart');

    // Graphique Personnes (Visiteurs et Participants)
    new Chart(ctxPersonnes, {
      type: 'bar',
      data: {
        labels: ['Nombre de visiteurs', 'Nombre de participants'],
        datasets: [
          {
            label: 'Visiteurs',
            data: [<?php echo $nombreVisiteurs; ?>, 0],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          },
          {
            label: 'Participants',
            data: [0, <?php echo $nombreParticipants; ?>],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          },
        ]
      },
      options: {
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    // Graphique Événements
    new Chart(ctxEvenements, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($labelsEvenements); ?>,
        datasets: [{
          label: 'Statistiques des événements',
          data: <?php echo json_encode($dataEvenements); ?>,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            // Ajoutez autant de couleurs que nécessaire
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>
  </div>
</body>
</html>
