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
echo "<h2>Statistiques des personnes</h2>";
echo "<table border='1' align='center'>";
echo "<tr><th>Catégorie</th><th>Nombre</th><th>Pourcentage</th></tr>";
$totalPersonnes = $nombreVisiteurs + $nombreParticipants;
$pourcentageVisiteurs = ($totalPersonnes > 0) ? number_format(($nombreVisiteurs / $totalPersonnes) * 100, 1) : 0;
$pourcentageParticipants = ($totalPersonnes > 0) ? number_format(($nombreParticipants / $totalPersonnes) * 100, 1) : 0;
echo "<tr><td>Nombre de visiteurs</td><td>$nombreVisiteurs</td><td>$pourcentageVisiteurs%</td></tr>";
echo "<tr><td>Nombre de participants</td><td>$nombreParticipants</td><td>$pourcentageParticipants%</td></tr>";
echo "</table>";

echo "<h2>Statistiques des événements</h2>";
echo "<table border='1' aligh='center'>";
echo "<tr><th>Événement</th><th>Nombre de participants</th><th>Pourcentage par rapport au total</th></tr>";
foreach ($statistiquesEvenements as $evenement => $nombreParticipants) {
    $pourcentageEvenement = ($totalPersonnes > 0) ? number_format(($nombreParticipants / $totalPersonnes) * 100, 1) : 0;
    echo "<tr><td>$evenement</td><td>$nombreParticipants</td><td>$pourcentageEvenement%</td></tr>";
}
echo "</table>";

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

</html>