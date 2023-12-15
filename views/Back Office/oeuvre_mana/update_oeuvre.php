<?php
include 'C:/xampp/htdocs/Ajax - Copy/controller/oeuvre_mana/oeuvreC.php';
include 'C:/xampp/htdocs/Ajax - Copy/controller/user_management/user_control.php';
include 'C:/xampp/htdocs/Ajax - Copy/model/oeuvre_mana/oeuvre2.php';
$db=config::getConnexion();

$id_oeuvre = $_GET['id_oeuvre'];

$error = '';

$oeuvreC = new oeuvreC();
$users=User_control::show_users($db);
$categories = $oeuvreC->listcategory();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_oeuvre'], $_POST['new_url'], $_POST['user'], $_POST['categorie'])) {
        $id_oeuvre = $_POST['id_oeuvre'];
        $newUrl = $_POST['new_url'];
        $userId = $_POST['user'];
        $categorie = $_POST['categorie'];

        $oeuvreC = new oeuvreC();
        $oeuvreData = $oeuvreC->showoeuvre($id_oeuvre);

        if ($oeuvreData) {
            $oeuvre = new oeuvres($id_oeuvre, $newUrl, $categorie, $userId);

            $oeuvreC->updateoeuvre($categorie, $id_oeuvre, $userId, $oeuvre);

            header("Location: gestionOeuvre.php");
            exit();
        } else {
            $error = 'Oeuvre not found.';
        }
    }
}

$url2="../../Front Office/index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ADMIN PANEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">
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
                    <a href="./gestionOeuvre.php" class="item selected">Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./add_oeuvre.php" class="item">Add Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./showcategory.php" class="item">Categorie</a>
                    <div class="seperator"></div>
                    <a href="./addcategory.php" class="item">Add Categorie</a>
                    <div class="seperator"></div>
                    <a href="./statistics.php" class="item">Statistics</a>
                    <div class="seperator"></div>
                </div>
                <a href="../../Front Office/user_management/logout.php">
                     <span>log out</span>
                </a>
            </div>
            <div class="view">
                <div class="sub-title">YASSINE'S PANEL</div>
                <div class="main-title">Update Oeuvre</div>
                <div class="seperator"></div>

                <button><a href="./gestionOeuvre.php">Back to list oeuvres</a></button>
                <hr>

                <div id="error">
                    <?php echo $error; ?>
                </div>

                <form action="update_oeuvre.php" method="POST" border="1" align="center">
                  
                    <input type="text" id="id_oeuvre" name="id_oeuvre" value="<?php echo$id_oeuvre?>" hidden>
                 

                    <label for="categorie">Select Categorie:</label>
                    <select id="categorie" name="categorie" required>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['ID_cat']; ?>"><?= $category['nom_cat']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="seperator"></div>

                    <label for="user">Select User:</label>
                    <select id="user" name="user" required>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user['user_id']; ?>"><?= $user['first_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="seperator"></div>

                    <label for="new_url">New Oeuvre URL:</label>
                    <input type="text" id="new_url" name="new_url" >
                    <div class="seperator"></div>
                    <button type="submit">Update Oeuvre</button>
                </form>
            </div
