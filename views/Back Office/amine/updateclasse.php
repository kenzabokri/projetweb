<?php

include '../../../controller/amine/classec.php';
include '../../../model/amine/classe.php';


$error = "";

// create client
$classe = null;

// create an instance of the controller
$classec = new classec();

if (
    isset($_POST["idclasse"]) &&
    isset($_POST["nomclasse"]) &&
    isset($_POST["nbpatient"]) 
) {
    if (
        !empty($_POST["idclasse"]) &&
        !empty($_POST['nomclasse']) &&
        !empty($_POST["nbpatient"])
    ) {
        $classe = new classe(
            $_POST['idclasse'],
            $_POST['nomclasse'],
            $_POST['nbpatient']
        );
        $classec->update($classe, $_POST["idclasse"]);

        // Rediriger vers la page du formulaire
        header('Location:listclasse.php');
    } else {
        $error = "Missing information";
    }
}    
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <script src="./verification.js"></script>
</head>

<body>
    <button><a href="listclasse.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idclasse'])) {
        $classe = $classec->show($_POST['idclasse']);

    ?>

    <form action="" method="POST" onsubmit="return validateForm();">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idclasse">Id Classe:
                        </label>
                    </td>
                    <td><input type="text" name="idclasse" id="idclasse" value="<?php echo $classe['idclasse']; ?>" maxlength="20">
                </tr></td>
                <tr>
                    <td>
                        <label for="nomclasse">nom de la classe:</label>
                    </td>
                    <td><input type="text" name="nomclasse" id="nomclasse" value="<?php echo $classe['nomclasse']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nbpatient">nombre de patient:</label>
                    </td>
                    <td><input type="text" name="nbpatient" id="nbpatient" value="<?php echo $classe['nbpatient']; ?>" maxlength="20"></td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>