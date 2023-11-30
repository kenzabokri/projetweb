<?php
include '../../Controller/evente.php';
include '../../model/event.php';

$error = "";

// create client
$event = null;

// create an instance of the controller
$eventc = new eventc();
if (
    isset($_POST["nomevent"]) &&
    isset($_POST["description"]) &&
    isset($_POST["date"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["capacite"]) &&
    isset($_POST["heuredebut"]) &&
    isset($_POST["heurefin"]) &&
    isset($_POST["image"]) &&
    isset($_POST["idtype"])
) {
    if (
        !empty($_POST['nomevent']) &&
        !empty($_POST["description"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST['capacite']) &&
        !empty($_POST["heuredebut"]) &&
        !empty($_POST["heurefin"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["idtype"])
    ) {
        $event = new event(
            null,
            $_POST['nomevent'],
            $_POST['date'],
            $_POST['description'],
            $_POST['heuredebut'],
            $_POST['heurefin'],
            $_POST['capacite'],
            $_POST['image'],
            $_POST['lieu'],
            $_POST['idtype']
        );

        $eventc->add($event);
        header('Location:listevent.php');
    } else {
        $error = "Missing information";
        echo $error; // Ajout de message pour le débogage
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh;
            margin: 200;
            background-color: #fff;
            background-image: url('ba.png');
            background-size: cover;
            background-position: center;
        }
    </style>
    <title>admin Display</title>
</head>

<body>
    <a href="./listevent.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm();">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="nomevent">nomevent:
                    </label>
                </td>
                <td><input type="text" name="nomevent" id="nomevent" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="description">description:
                    </label>
                </td>
                <td><input type="text" name="description" id="description" maxlength="300"></td>
            </tr>
            <tr>
                <td>
                    <label for="lieu">lieu:
                    </label>
                </td>
                <td>
                    <input type="text" name="lieu" id="lieu">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Date :
                    </label>
                </td>
                <td>
                    <input type="date" name="date" id="date">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="heuredebut">heuredebut:
                    </label>
                </td>
                <td><input type="text" name="heuredebut" id="heuredebut"></td>
            </tr>
            <tr>
                <td>
                    <label for="heurefin">heurefin:
                    </label>
                </td>
                <td><input type="text" name="heurefin" id="heurefin"></td>
            </tr>
            <tr>
                <td>
                    <label for="capacite">capacite:
                    </label>
                </td>
                <td>
                    <input type="text" name="capacite" id="capacite">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image">image:
                    </label>
                </td>
                <td>
                    <input type="text" name="image" id="image">
                </td>
            </tr>
            <tr>
    <td>
        <label for="idtype">Type d'événement:</label>
    </td>
    <td>
        <select name="idtype" id="idtype">
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
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
    <script src="../../model/verif.js"></script>
</body>

</html>          