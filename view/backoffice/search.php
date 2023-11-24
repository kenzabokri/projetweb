<?php
require_once "../../controller/classec.php";

$classec = new classec();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idclasse']) && isset($_POST['search'])) {
        $idclasse = $_POST['idclasse'];
        $emplois = $classec->list($idclasse);
    }
}

$classes = $classec->list();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recherche emploi</title>
</head>

<body>
    <h1>Recherche emploi par classe</h1>
    <form action="" method="POST">
        <label for="idclasse">Sélectionnez une classe:</label>
        <select name="idclasse" id="idclasse">
            <?php
            foreach ($classes as $classe) {
                echo '<option value="' . $classe['idclasse'] . '">' . $classe['idclasse'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>
    <?php if (isset($emplois)) { ?>
        <br>
        <h2>Emplois correspondants à la classe sélectionnée:</h2>
        <ul>
            <?php foreach ($emplois as $emploi) { ?>
                <li>
                    <?php
                    if (isset($emploi['seance'])) {
                        echo $emploi['seance'];
                    } else {
                        echo 'Undefined Seance';
                    }
                    echo ' - ';
                    if (isset($emploi['dateFin'])) {
                        echo $emploi['dateFin'];
                    } else {
                        echo 'Undefined DateFin';
                    }
                    ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
</body>

</html>
