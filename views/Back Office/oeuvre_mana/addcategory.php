<?php
include 'C:\xampp\htdocs\Ajax - Copy\controller\oeuvre_mana\categorieC.php';
include 'C:\xampp\htdocs\Ajax - Copy\model\oeuvre_mana\categorie2.php';

$error = "";
$categoryC = new CategorieC();

if (isset($_POST["nom_cat"])) {
    if (!empty($_POST['nom_cat'])) {
        $category = new Categories(null, $_POST['nom_cat']);

        $categoryC->addCategory($category);
        header('Location:showcategory.php');
    } else {
        $error = "Category name is required.";
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
                    <a href="./gestionOeuvre.php" class="item">Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./add_oeuvre.php" class="item">Add Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./showcategory.php" class="item ">Categorie</a>
                    <div class="seperator"></div>
                    <a href="./addcategory.php" class="item selected">Add Categorie</a>
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
                <div class="main-title">Add Category</div>
                <div class="seperator"></div>

                <form action="" method="POST">
                    <div>
                        <label for="nom_cat">Category Name:</label>
                        <input type="text" id="nom_cat" name="nom_cat" placeholder="Enter Category Name">
                    </div>
                    <div class="seperator"></div>
                    <div>
                        <input type="submit" value="Save">
                        <input type="reset" value="Reset">
                    </div>
                </form>

                <?php
                if (!empty($error)) {
                    echo "<p style='color: red;'>$error</p>";
                }
                ?>
            </div>

</body>
</html>