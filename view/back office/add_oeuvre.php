<?php
include 'C:/xampp/htdocs/gestio_oeuvre2/controller/oeuvreC.php';
include 'C:/xampp/htdocs/gestio_oeuvre2/model/oeuvre2.php';

$error = "";

$oe = null;
$oeuvreC = new oeuvreC();

$catC = new oeuvreC();
$cat = $catC->listcategory();

$userC = new oeuvreC();
$user = $userC->listUser();

if (
    isset($_POST["user"]) &&
    isset($_POST["categorie"]) &&
    isset($_POST["url"])
) {
    if (
        !empty($_POST['user']) &&
        !empty($_POST['categorie']) &&
        !empty($_POST['url'])
    ) {
        $oe = new oeuvres(
            null,
            $_POST['url'],
            $_POST['categorie'],
            $_POST['user']
        );

        $oeuvreC->addoeuvre($oe);
        header('Location: gestionOeuvre.php');
    } else {
        $error = "Missing information";
    }
}
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
                <div class="seperator"></div>
                <div class="list">
                    <a href="./gestionOeuvre.php" class="item">Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./add_oeuvre.php" class="item selected">Add Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./showcategory.php" class="item ">Categorie</a>
                    <div class="seperator"></div>
                    <a href="./addcategory.php" class="item">Add Categorie</a>
                    <div class="seperator"></div>
                    <a href="./statistics.php" class="item">Statistics</a>
                    <div class="seperator"></div>
                </div>
            </div>
            <div class="view">
                <div class="sub-title">YASSINE'S PANEL</div>
                <div class="main-title">Ajouter Oeuvre</div>
                <div class="seperator"></div>

                <form action="" method="POST">
                    <div>
                        <label for="user">User:</label>
                        <select id="user" name="user">
                            <?php
                            if (empty($user)) {
                                echo "<option>No users found.</option>";
                            } else {
                                foreach ($user as $u) {
                                    echo "<option value='" . $u['id_user'] . "'>" . $u['username'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="seperator"></div>
                    <div>
                        <label for="categorie">Categorie:</label>
                        <select id="categorie" name="categorie">
                            <?php
                            if (empty($cat)) {
                                echo "<option>No categories found.</option>";
                            } else {
                                foreach ($cat as $c) {
                                    echo "<option value='" . $c['ID_cat'] . "'>" . $c['nom_cat'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="seperator"></div>
                    <div>
                        <label for="url">URL:</label>
                        <input type="text" id="url" name="url" placeholder="Enter URL">
                    </div>
                    <div class="seperator"></div>
                    <div>
                        <input type="submit" value="Save">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
