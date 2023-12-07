<?php
require "C:/xampp/htdocs/gestio_oeuvre2/controller/categorieC.php";
require "C:/xampp/htdocs/gestio_oeuvre2/model/categorie2.php";

$error = '';

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
                    <a href="./add_oeuvre.php" class="item">Add Oeuvre</a>
                    <div class="seperator"></div>
                    <a href="./showcategory.php" class="item selected">Categorie</a>
                    <div class="seperator"></div>
                    <a href="./addcategory.php" class="item">Add Categorie</a>
                    <div class="seperator"></div>
                    <a href="./statistics.php" class="item">Statistics</a>
                    <div class="seperator"></div>
                </div>
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
                    <label for="category_id">Category ID:</label>
                    <input type="text" id="category_id" name="category_id" required>
                    <div class="seperator"></div>
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