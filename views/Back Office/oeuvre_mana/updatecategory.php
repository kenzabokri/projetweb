<?php
include 'C:/xampp/htdocs/Ajax - Copy/controller/oeuvre_mana/categorieC.php';
include 'C:/xampp/htdocs/Ajax - Copy/model/oeuvre_mana/categorie2.php';
$error = '';

$id=$_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['new_category_name'], $_POST['category_id'])) {
        $newCategoryName = $_POST['new_category_name'];
        $id = $_POST['category_id']; 

        $category = new Categories(null, $newCategoryName);
        $categorieC = new CategorieC();
        $categorieC->updateCategory($category, $id);

        header("Location: showcategory.php");
        exit();
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
                    <a href="./showcategory.php" class="item selected">Categorie</a>
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
                <div class="main-title">Update Category</div>
                <div class="seperator"></div>

                <button><a href="./showcategory.php">Back to list categories</a></button>
                <hr>

                <div id="error">
                    <?php echo $error; ?>
                </div>

                <form action="updatecategory.php" method="POST" border="1" align="center">  
                    <input type="text" id="category_id" name="category_id" value="<?php echo $id?>" hidden>
                    <label for="new_category_name">New Category Name:</label>
                    <input type="text" id="new_category_name" name="new_category_name" required>
                    <div class="seperator"></div>
                    <button type="submit">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="./script.js"></script>

</html>