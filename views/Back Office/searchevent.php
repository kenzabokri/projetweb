<?php
require_once "../../controller/typet.php";

$typet = new typet();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idtype']) && isset($_POST['search'])) {
        $idtype = $_POST['idtype'];
        $list = $typet->list($idtype);
    }
}
$types = $typet->listtype();
?>
<!DOCTYPE html>
<head>
    <title>Recherche event</title>
</head>
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
<body>
    <h1>Recherche event par type</h1>
    <form action="" method="POST">
        <label for="idtype">Sélectionnez un type:</label>
        <select name="idtype" id="idtype">
            <?php
            foreach ($types as $type) {
                echo '<option value="' . $type['idtype'] . '">' . $type['nomtype'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search">
    </form>
    <?php if (isset($list)) { ?>
        <br>
        <h2>Events correspondants au type sélectionné:</h2>
        <ul>
            <?php foreach ($list as $event) { ?>
               <h2> <li><?= $event['nomevent'] ?> - <?= $event['lieu'] ?></li></h2>
            <?php } ?>
        </ul>
    <?php } ?>
</body>
</html>
