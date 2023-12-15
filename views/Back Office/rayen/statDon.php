<?php
include '../../../controller/rayen/donC.php';

$donC = new donC();
$stats = $donC->getStatsByDestination();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN PANEL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./styletab.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="background"></div>
    <div class="body-wrapper">
        <div class="panel">
            <div class="aside"> 
            <a href="../../Front Office/index.php">home</a>
                <div class="seperator"></div>
                <div class="list">
                    <a href="listDon.php" class="item">DONS</a>
                    <div class="seperator"></div>
                    <a href="addDon.php" class="item">ADD DONS</a>
                    <div class="seperator"></div>
                    <a href="listDest.php" class="item">Destination</a>
                    <div class="seperator"></div>
                    <a href="addDest.php" class="item">ADD DES</a>
                    <div class="seperator"></div>
                    <a href="statDon.php" class="item selected">STAT</a>
                    <div class="seperator"></div>
                    <a href="exportDonations.php" class="button">Download CSV</a>
                    <div class="seperator"></div>
                </div>
                <a href="../../Front Office/user_management/logout.php">logout</a>
            </div>
            <div class="view">
                <div class="sub-title">RAYEN'S PANEL</div>
                <div class="main-title">Statistiques des Dons par Destination</div>
                <div class="seperator"></div>

                <canvas id="myChart" width="400" height="200"></canvas>

                <script>
                    var stats = <?php echo json_encode($stats); ?>;
                    var labels = stats.map(stat => stat.destination);
                    var data = stats.map(stat => stat.totalMontant);

                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Montant par Destination',
                                data: data,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</body>
</html>
