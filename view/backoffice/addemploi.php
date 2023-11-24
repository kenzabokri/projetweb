
<?php
include '../../controller/emploic.php';
include '../../model/emploi.php';



$error = "";

// create classe
$emploi = null;

// create an instance of the controller
$emploic = new emploic();
if (
    isset($_POST["date"]) &&
    isset($_POST["seance"]) &&
    isset($_POST["dateDebut"]) &&
    isset($_POST["dateFin"])&&
    isset($_POST["idclasse"])

    ) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST['seance']) &&
        !empty($_POST['dateDebut']) &&
        !empty($_POST['dateFin'])&& 
        !empty($_POST['idclasse'])
    ) {
        $emploi = new emploi(
            null,
            $_POST['date'],
            $_POST['seance'],
            $_POST['dateDebut'],
            $_POST['dateFin'],
            $_POST['idclasse']

        );
        $emploic->add($emploi);
        header('Location:showemploi.php');
    } else
        $error = "Missing information";
}


?><html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <script src="./verif.js"></script>
</head>

<body>
    <a href="/try amine 2 - Copie/views/backoffice/showemploi.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm();">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="date">Date:</label>
                </td>
                <td><input type="date" name="date" id="date" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="seance">Séance:</label>
                </td>
                <td><input type="text" name="seance" id="seance" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="dateDebut">Date de début:</label>
                </td>
                <td><input type="text" name="dateDebut" id="dateDebut" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="dateFin">Date de fin:</label>
                </td>
                <td><input type="text" name="dateFin" id="dateFin" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="idclasse"> idclasse :</label>
                </td>
                <td>
                    <select name="idclasse" id="idclasse">
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                    </select>
                </td>
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
