<?php
include "../../controller/evente.php";

$e = new eventc();
$tab = $e->list();

?>

<center>
    <h1>List of events</h1>
    <h2>
        <a href="./addevent.php">Add event</a>
    </h2>
</center>
<style>
body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh;
            margin: 200;
            background-color: #fff; 
            background-image: url('ba.png'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
<table border="1" align="center" width="70%">
    <tr>
            <th>ID</th>
            <th>Nom de l'événement</th>
            <th>Date</th>
            <th>Description</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Capacité</th>
            <th>Image</th>
            <th>Lieu</th>
            <th>idtype</th>
            <th>Update</th>
            <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $event) {
    ?>




        <tr>
        <td><?= $event['idevent']; ?></td>
                <td><?= $event['nomevent']; ?></td>
                <td><?= $event['date']; ?></td>
                <td><?= $event['description']; ?></td>
                <td><?= $event['heuredebut']; ?></td>
                <td><?= $event['heurefin']; ?></td>
                <td><?= $event['capacite']; ?></td>
                <td><?= $event['image']; ?></td>
                <td><?= $event['lieu']; ?></td>
                <td><?= $event['idtype']; ?></td>
            <td align="center">
                <form method="POST" action="./updateevent.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $event['idevent']; ?> name="idevent">
                </form>
            </td>
            <td>
               <!-- <a href="deleteClient.php?id=<?php echo $event['idevent']; ?>">Delete</a>-->
                <a href="./deleteevent.php?idevent=<?php echo $event['idevent']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>