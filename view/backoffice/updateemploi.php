<?php
include '../../controller/emploic.php';

$error = "";
$emploi = null;
$emploic = new emploic();

if (isset($_POST["idemploi"])) {
    $emploi = $emploic->show($_POST["idemploi"]);
}

if (isset($_POST["update"])) {
    $emploi = new emploi(
        null,
        $_POST['date'],
        $_POST['seance'],
        $_POST['dateDebut'],
        $_POST['dateFin'],
        $_POST['idclasse']
    );
    $emploic->update($emploi, $_POST["idemploi"]);
    header('Location: showemploi.php');
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <script src="./verif.js"></script>
</head>

<body>
    <button><a href="showemploi.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php if ($emploi) : ?>
        <form action="" method="POST" onsubmit="return validateForm();">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idemploi">Id Emploi:
                        </label>
                    </td>
                    <td><input type="text" name="idemploi" id="idemploi" value="<?php echo $emploi['idemploi']; ?>" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date:</label>
                    </td>
                    <td><input type="date" name="date" id="date" value="<?php echo $emploi['date']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="seance">Séance:</label>
                    </td>
                    <td><input type="text" name="seance" id="seance" value="<?php echo $emploi['seance']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dateDebut">Date de Début:</label>
                    </td>
                    <td><input type="text" name="dateDebut" id="dateDebut" value="<?php echo $emploi['dateDebut']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dateFin">Date de Fin:</label>
                    </td>
                    <td><input type="text" name="dateFin" id="dateFin" value="<?php echo $emploi['dateFin']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="idclasse">idclasse:</label>
                    </td>
                    <td><input type="text" name="idclasse" id="idclasse" value="<?php echo $emploi['idclasse']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="update" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php endif; ?>
</body>

</html>
