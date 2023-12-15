<?php
include 'C:/xampp/htdocs/Ajax - Copy/controller/oeuvre_mana/oeuvreC.php';

$o = new oeuvreC();
$tab = $o->listoeuvre();

$url2="../../Front Office/index.php";
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
                        <?php foreach ($tab as $cours) : 
                            $id=$cours['id_oeuvre'];
                            $url="deleteOeuvre.php?id_oeuvre=$id";
                            $url1="update_oeuvre.php?id_oeuvre=$id";
                            ?>
                            <tr>
                                <td data-th="Movie Title"><?= $cours['id_oeuvre']; ?></td>
                                <td data-th="Genre"><?= $cours['categorie']; ?></td>
                                <td data-th="Year"><?= $cours['user']; ?></td>
                                <td data-th="Gross"><?= $cours['url']; ?></td>
                                <td>
                                    <button><a href="<?php echo$url1?>" class="item">Update Oeuvre</a></button>
                                </td>
                                <td>
                                    <button><a href="<?php echo$url?>" class="item">Delete Oeuvre</a></button>
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
