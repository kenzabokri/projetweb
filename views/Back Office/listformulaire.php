<?php
include "../../controller/formulairef.php";

$f = new formulairef();
$tab = $f->list();
?>

<center>
    <h1>List of participants</h1>
</center>
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
<table border="1" align="center" width="70%">
    <tr>
            <th>ID</th>
            <th>Nom personne</th>
            <th>prenom personne</th>
            <th>ticket</th>
            <th>role</th>
            <th>nome</th>
            <th>numero</th>
    </tr>


    <?php
    foreach ($tab as $formulaire) {
    ?>




        <tr>
        <td><?= $formulaire['id']; ?></td>
                <td><?= $formulaire['nom']; ?></td>
                <td><?= $formulaire['prenom']; ?></td>
                <td><?= $formulaire['ticket']; ?></td>
                <td><?= $formulaire['role']; ?></td>
                <td><?= $formulaire['nome']; ?></td>
                <td><?= $formulaire['numero']; ?></td>
        </tr>
    <?php
    }
    ?>