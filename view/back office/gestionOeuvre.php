<?php
include 'C:/xampp/htdocs/gestio_oeuvre2/controller/oeuvreC.php';

$o = new oeuvreC();
$tab = $o->listoeuvre();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN PANEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./styletab.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./style.css">
    <style>
        .scrollable-table {
            max-height: 400px; 
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="body-wrapper">
        <div class="panel">
            <div class="aside">
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
            </div>
            <div class="view">
                <div class="sub-title">YASSINE'S PANEL</div>
                <div class="main-title">Toutes les oeuvres</div>
                <div class="seperator"></div>

                <div class="scrollable-table">
                    <table class="rwd-table" border="1" align="center" width="70%">
                        <tr>
                            <th>Id Oeuvre</th>
                            <th>Id Categorie</th>
                            <th>Id User</th>
                            <th>Url</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        <?php foreach ($tab as $cours) : ?>
                            <tr>
                                <td data-th="Movie Title"><?= $cours['id_oeuvre']; ?></td>
                                <td data-th="Genre"><?= $cours['categorie']; ?></td>
                                <td data-th="Year"><?= $cours['user']; ?></td>
                                <td data-th="Gross"><?= $cours['url']; ?></td>
                                <td>
                                    <form method="POST" action="update_oeuvre.php">
                                        <input type="submit" name="update" value="Update Oeuvre">
                                        <input type="hidden" value="<?= $cours['id_oeuvre']; ?>" name="id_cours">
                                    </form>
                                </td>
                                <td>
                                    <button><a href="deleteOeuvre.php?id_oeuvre=<?= $cours['id_oeuvre']; ?>" class="item">Delete Oeuvre</a></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="./script.js"></script>
</body>
</html>
