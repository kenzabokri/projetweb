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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chart Page</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <button class="button"><a href="./mainGestionInscription.php">Back</a></button>
</head>
<body>
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

