<?php
session_start();
require '../../../config.php';
$db = Config::getConnexion();
$id = $_SESSION['id'];
$res = $db->query("SELECT * FROM inscription WHERE user=$id");
$i = 0;

foreach ($res as $t) {
    $tab[$i] = $t['emploi'];
    $tab1[$i] = $t['cours'];
    $tab2[$i] = $t['class'];
    $i++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            background-color: aliceblue;
            border-collapse: collapse;
            width: 70%;
            margin: 200px auto; /* Center the table */
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: white;
        }
    </style>
</head>
<body>

<?php

for ($row = 0; $row < $i; $row++) {
    $res = $db->query("SELECT * FROM emploi WHERE idemploi=$tab[$row]");
    $res1 = $db->query("SELECT * FROM cours WHERE id_cours=$tab1[$row]");
    $res2 = $db->query("SELECT * FROM class WHERE idclasse=$tab2[$row]");
    ?>

    <table>
        <?php
            if($tab2[$row]==0){
                 ?>
                    <tr>
                        <th>In process</th>
                    </tr>
                 <?php
            }
            else{
                ?>
        
                <tr>
                    <th>Date</th>
                    <th>Begining hour</th>
                    <th>ending hour</th>
                    <th>Course</th>
                    <th>Classroom</th>
                </tr>

        <?php

            }
        
        foreach ($res as $t) {
            
                foreach($res1 as $t1){
                    $cours=$t1['nom_cours'];
                }
                foreach($res2 as $t2){
                    $class=$t2['nomclasse'];
                }
                echo "
                    <tr>
                        <td>" . $t['date'] . "</td>
                        <td>" . $t['dateDebut'] . "</td>
                        <td>" . $t['dateFin'] . "</td>
                        <td>" . $cours . "</td>
                        <td>" . $class . "</td>
                    </tr>
                ";
        
            
        }
        ?>
    </table>

<?php } ?>

</body>
</html>
