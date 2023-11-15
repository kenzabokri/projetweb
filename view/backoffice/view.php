<?php
require_once 'C:\xampp\htdocs\projetamine\views\Back Office\config.php';

$pdo = config::getConnexion();


$query = $pdo->prepare("SELECT * FROM class");
$query->execute();
$classes = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des classes</title>
    <style> 
body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #fff; 
            background-image: url('../Back Office/logo_2.png'); 
            background-size: cover;
            background-position: center; 
        }

       
    </style>
</head>

<body>
    <h1>Liste des classes</h1>

    <table border="1" align="center">
        <tr>
            <th>idclasse</th>
            <th>nomclasse</th>
            <th>nbpatient</th>
        </tr>

        <?php foreach ($classes as $classe) : ?>
            <tr>
                <td><?php echo $classe['idclasse']; ?></td>
                <td><?php echo $classe['nomclasse']; ?></td>
                <td><?php echo $classe['nbpatient']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
