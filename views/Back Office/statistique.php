<?php
include "../../controller/formulairef.php";

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>statistique</title>
    <style>
body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh;
            margin: 200;
            background-color: #fff; 
            background-image: url('ra.jpg'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
</head>
<body>
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
</body>
</html>
