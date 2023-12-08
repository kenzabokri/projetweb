<?php
include '../../controller/classec.php';
include '../../model/classe.php';



$error = "";

// create classe
$classe = null;

// create an instance of the controller
$classec = new classec();
if (
    isset($_POST["nomclasse"]) &&
    isset($_POST["nbpatient"]) 
) {
    if (
        !empty($_POST['nomclasse']) &&
        !empty($_POST["nbpatient"]) 
    ) {
        $classe = new classe(
            null,
            $_POST['nomclasse'],
            $_POST['nbpatient']
        );
        $classec->add($classe);
        header('Location:listclasse.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <script src="./verification.js"></script>
    <style>
    body {
      display: flex;
      align-items: center;
      justify-content: right;
      height: 100vh;
      margin: 50;
      background-color: #fff; 
      background-image: url('ko.png'); 
      background-size: cover; 
      background-position: center; 
    }
    form {
            /* Ajoutez ces styles pour centrer le formulaire */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 200px;
            border: 8px solid #ccc;
            background-color: #f9f9f9;
            background-image: url('ko.png'); 
        }
</style>
</head>

<body>
<a href="/try amine 2 - Copie/views/backoffice/listclasse.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm();">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="nomclasse">nom de la classe:
                    </label>
                </td>
                <td><input type="text" name="nomclasse" id="nomclasse" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nbpatient">nombre de patient:
                    </label>
                </td>
                <td><input type="text" name="nbpatient" id="nbpatient" maxlength="20"></td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>