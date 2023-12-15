<?php
include '../../../controller/hejer/inscriptionC.php';

$i = new InscriptionC();
$tab = $i->listInscriptionNew();

// Check if the query was successful before using $tab
if ($tab !== false) {
    // Fetch data from the query result
    $tab = $tab->fetchAll(PDO::FETCH_ASSOC);
}

// Create an associative array to store the total registrations for each course
$totalRegistrations = [];

foreach ($tab as $row) {
    $course = $row['nom_cours'];
    $totalRegistrations[$course] = isset($totalRegistrations[$course]) ? $totalRegistrations[$course] + 1 : 1;
}

$nomCours = array_keys($totalRegistrations);
$registrations = array_values($totalRegistrations);


?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<meta charset="UTF-8">
    <title>Chart Page</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div class="background"></div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
        <div class="seperator"></div>
        <div class="list">
        <a href="./mainGestionCours.php" class="item ">COURS</a>
        <div class="seperator"></div>
        <a href="./add_cours.php" class="item">ADD COURS</a>
        <div class="seperator"></div>
        <a href="./mainGestionCat.php" class="item ">CATEGORIES</a>
        <div class="seperator"></div>
        <a href="./add_categories.php" class="item selected ">ADD CATEG</a>
        
        <div class="seperator"></div>
        <a href="./mainGestionPeriode.php" class="item">PERIODE</a>
        <div class="seperator"></div>
        <a href="./add_periode.php" class="item ">ADD PERIODE</a>
        <div class="seperator"></div>
        <a href="./mainGestionInscription.php" class="item">INSCRIPTION</a>
        <div class="seperator"></div>
        <a href="./add_inscription.php" class="item ">ADD INSCRIPTION</a>
        <div class="seperator"></div>
        </div>
        <a href="../../Front Office/user_management/logout.php" class="btn-reserve" style="color: black;">Log Out</a>
      </div>
      <div class="chart-container">
        <canvas id="myChart" width="400" height="200"></canvas>
        
    </div>

    <script>
        // PHP data
        var nomCours = <?php echo json_encode($nomCours); ?>;
        var registrations = <?php echo json_encode($registrations); ?>;

        // Create a data object for the chart
        var data = {
            labels: nomCours,
            datasets: [{
                label: 'Number of Registrations',
                data: registrations,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Configure the chart options
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Get the canvas element and initialize the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
</html>
<style>
    .chart-container {
            width: 80%; /* Adjust the width as needed */
            margin: auto; /* Center the container */
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    .button {
 color: #ecf0f1;
 font-size: 17px;
 background-color: #e67e22;
 border: 1px solid #f39c12;
 border-radius: 5px;
 padding: 10px;
 box-shadow: 0px 6px 0px #d35400;
 transition: all .1s;
}

.button:active {
 box-shadow: 0px 2px 0px #d35400;
 position: relative;
 top: 2px;
}
</style>

