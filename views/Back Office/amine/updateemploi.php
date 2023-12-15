<?php

include '../../../controller/amine/emploic.php';
include '../../../model/amine/emploi.php';

$error = "";
$emploi = null;
$emploic = new emploic();

if (
    isset($_POST["idemploi"]) &&
    isset($_POST["date"]) &&
    isset($_POST["dateDebut"]) &&
    isset($_POST["dateFin"])
    ) {
    if (
        !empty($_POST['idemploi']) &&
        !empty($_POST['date']) &&
        !empty($_POST["dateDebut"]) &&
        !empty($_POST['dateFin'])
    ) {
        $emploi = new emploi(
            $_POST['idemploi'],
            new DateTime($_POST['date']),
            $_POST['dateDebut'],
            $_POST['dateFin']
            
        );
        $emploic->update($emploi, $_POST["idemploi"]);
        header('Location:showemploi.php');
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Display</title>
    <script src="./verif.js"></script>
</head>

<body>
    <button><a href="showemploi.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idemploi'])) {
        $emploi = $emploic->show($_POST['idemploi']);
    ?>

<form action="" method="POST" onsubmit="return validateForm();">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idemploi">id :
                        </label>
                    </td>
                    <td><input type="text" name="idemploi" id="idemploi" value="<?php echo $emploi['idemploi']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date" value="<?php echo $emploi['date']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dateDebut">dateDebut:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="dateDebut" value="<?php echo $emploi['dateDebut']; ?>" id="dateDebut">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dateFin">dateFin:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="dateFin" id="dateFin" value="<?php echo $emploi['dateFin']; ?>">
                    </td>
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
        <script src="../../model/verif.js"></script>
    <?php
    }
    ?>
</body>

</html>
