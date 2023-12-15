<?php
include 'C:/xampp/htdocs/Ajax - Copy/controller/oeuvre_mana/oeuvreC.php';

$oeuvreController = new oeuvreC();

$distinctUserIds = $oeuvreController->listDistinctUserIds();

$totalOeuvres = $oeuvreController->getTotalOeuvresCount();

$userIds = [];
$usernames = [];
$percentages = [];

foreach ($distinctUserIds as $userId) {
    $username = $oeuvreController->getUsernameForUserId($userId);
    $userOeuvresCount = $oeuvreController->getUserOeuvresCount($userId);
    $percentages[] = round(($userOeuvresCount / $totalOeuvres) * 100, 2);
    $userIds[] = $userId;
    $usernames[] = $username;
}

$url2="../../Front Office/index.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN PANEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./styletab.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./style.css">
    <style>
        .scrollable-table {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="body-wrapper">
        <div class="panel">
            <div class="aside">
            <a href="<?php echo $url2?>">
                     <span>Home</span>
                </a>
                <div class="seperator"></div>
                <div class="list">
                    <a href="./gestionOeuvre.php" class="item">Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./add_oeuvre.php" class="item">Add Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./showcategory.php" class="item">Categorie</a>
                    <div class="seperator"></div>
                    <a href="./addcategory.php" class="item">Add Categorie</a>
                    <div class="seperator"></div>
                    <a href="./statistics.php" class="item selected">Statistics</a>
                    <div class="seperator"></div>
                </div>
                <a href="../../Front Office/user_management/logout.php">
                     <span>log out</span>
                </a>
            </div>
            <div class="view">
                <div class="sub-title">YASSINE'S PANEL</div>
                <div class="main-title">Users Statistics</div>
                <div class="seperator"></div>

                <div class="scrollable-table">
                    <table class="rwd-table" border="1" align="center" width="70%">
                        <tr>
                            <th>Id User</th>
                            <th>Username</th>
                            <th>% of All Oeuvres</th>
                        </tr>
                        <?php
                        foreach ($distinctUserIds as $index => $userId) {
                            $username = $oeuvreController->getUsernameForUserId($userId);
                            $userOeuvresCount = $oeuvreController->getUserOeuvresCount($userId);
                            $percentage = ($userOeuvresCount / $totalOeuvres) * 100;
                            ?>
                            <tr>
                                <td><?= $userId; ?></td>
                                <td><?= $username; ?></td>
                                <td><?= number_format($percentage, 1) . ' %' ;?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <!-- Add a canvas for the chart -->
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Initialize the chart -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($usernames); ?>,
                datasets: [{
                    label: '% of All Oeuvres',
                    data: <?= json_encode($percentages); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: '#7f8818',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>

    <script src="./script.js"></script>
</body>
</html>
