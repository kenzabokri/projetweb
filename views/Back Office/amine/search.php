<?php
require_once "../../../controller/amine/classec.php";

$classec = new classec();
$error = "";

$emplois = null; // Initialisation à null

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
        <label for="idclasse">Sélectionnez une classe :</label>
        <select name="idclasse" id="idclasse">
            <?php
            foreach ($classes as $classe) {
                echo '<option value="' . $classe['idclasse'] . '">' . $classe['nomclasse'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>
    <?php if (!empty($emplois)) { ?>
        <br>
        <h2>Emplois correspondants à la classe sélectionnée :</h2>
        <ul>
            <?php foreach ($emplois as $emploi) { ?>
                <li>
                    <?php
                    echo 'ID Classe: ' . $emploi['idclasse'] . ', ';
                    echo 'Nom Classe: ' . $emploi['nomclasse'] . ', ';
                    echo 'Nombre de Patients: ' . $emploi['nbpatient'];
                    ?>
                </li>
            <?php } ?>
        </ul>
    <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST") { // Afficher un message si la classe n'a pas été trouvée ?>
        <p>Aucun emploi trouvé pour la classe sélectionnée.</p>
    <?php } ?>
</body>

</html>
