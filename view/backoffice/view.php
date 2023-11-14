<?php
// Inclure le fichier de configuration de la base de données
require_once 'C:\xampp\htdocs\projet\views\Back Office\config.php';

// Établir une connexion à la base de données
$pdo = config::getConnexion();

// Requête SQL pour sélectionner tous les événements
$query = $pdo->prepare("SELECT * FROM event");
$query->execute();
$events = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Événements</title>
</head>

<body>
    <h1>Liste des Événements</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom de l'événement</th>
            <th>Date</th>
            <th>Description</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Capacité</th>
            <th>Image</th>
            <th>Type</th>
            <th>Lieu</th>
            <!-- Ajoutez d'autres colonnes en fonction de votre structure de base de données -->
        </tr>

        <?php foreach ($events as $event) : ?>
            <tr>
                <td><?php echo $event['idevent']; ?></td>
                <td><?php echo $event['nomevent']; ?></td>
                <td><?php echo $event['date']; ?></td>
                <td><?php echo $event['description']; ?></td>
                <td><?php echo $event['heuredebut']; ?></td>
                <td><?php echo $event['heurefin']; ?></td>
                <td><?php echo $event['capacite']; ?></td>
                <td><?php echo $event['image']; ?></td>
                <td><?php echo $event['type']; ?></td>
                <td><?php echo $event['lieu']; ?></td>
                <!-- Ajoutez d'autres colonnes en fonction de votre structure de base de données -->
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
