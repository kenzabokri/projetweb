<?php


include 'C:\xampp\htdocs\Ajax - Copy\controller\oeuvre_mana\categorieC.php';



$o = new CategorieC();
$tab = $o->listcategory();

$url2="../../Front Office/index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ADMIN PANEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./styletab.css">

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">

</head>

<body>

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
                        <a href="./gestionOeuvre.php" class="item">Oeuvre</a>
                        <div class="seperator"></div>
                        <a href="./add_oeuvre.php" class="item">Add Oeuvre</a>
                        <div class="seperator"></div>
                        <a href="./showcategory.php" class="item selected">Categorie</a>
                        <div class="seperator"></div>
                        <a href="./addcategory.php" class="item  ">Add Categorie</a>
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
                    <div class="main-title">Toutes les categories</div>
                    <div class="seperator"></div>

                    <style>
                        .scrollable-table {
                            max-height: 400px;
                            overflow-y: auto;
                        }
                    </style>

                    <div class="scrollable-table">
                        <table class="rwd-table" border="1" align="center" width="70%">
                            <tr>
                                <th>Id categorie</th>
                                <th>Nom categorie</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                            foreach ($tab as $cours) {
                                $id=$cours['ID_cat'];
                                $url="updatecategory.php?id=$id";
                            ?>
                                <tr>
                                    <td data-th="Movie Title"><?= $cours['ID_cat']; ?></td>
                                    <td data-th="Genre"><?= $cours['nom_cat']; ?></td>
                                    <td>
                                        <button><a href="<?php echo $url?>" class="item">Update Category</a></button>
                                    </td>
                                    <td>
                                        <button><a href="deletecategory.php?ID_cat=<?= $cours['ID_cat']; ?>" class="item">Delete Category</a></button>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </table>
                    </div>

    </body>
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>