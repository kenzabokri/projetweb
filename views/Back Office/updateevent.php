<?php

include '../../Controller/evente.php';
include '../../model/event.php';

$error = "";
$event = null;
$eventc = new eventc();

if (
    isset($_POST["idevent"]) &&
    isset($_POST["nomevent"]) &&
    isset($_POST["description"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["capacite"]) &&
    isset($_POST["heuredebut"]) &&
    isset($_POST["heurefin"]) &&
    isset($_POST["image"]) &&
    isset($_POST["date"])&&
    isset($_POST["idtype"])
    ) {
    if (
        !empty($_POST['idevent']) &&
        !empty($_POST['nomevent']) &&
        !empty($_POST["description"]) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST['capacite']) &&
        !empty($_POST["heuredebut"]) &&
        !empty($_POST["heurefin"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["date"])&&
        !empty($_POST["idtype"])
    ) {
        $event = new event(
            $_POST['idevent'],
            $_POST['nomevent'],
            new DateTime($_POST['date']),
            $_POST['description'],
            $_POST['heuredebut'],
            $_POST['heurefin'],
            
            
            $_POST['capacite'],
           
            $_POST['image'],
            $_POST['lieu'],
            $_POST['idtype']
        );
        $eventc->update($event, $_POST["idevent"]);
        header('Location:listevent.php');
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
</head>

<body>
    <button><a href="./listevent.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idevent'])) {
        $event = $eventc->show($_POST['idevent']);
    ?>

<form action="" method="POST" onsubmit="return validateForm();">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idevent">id de l'événement:
                        </label>
                    </td>
                    <td><input type="text" name="idevent" id="idevent" value="<?php echo $event['idevent']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomevent">nom événement:
                        </label>
                    </td>
                    <td><input type="text" name="nomevent" id="nomevent" value="<?php echo $event['nomevent']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description:
                        </label>
                    </td>
                    <td><input type="text" name="description" id="description" value="<?php echo $event['description']; ?>" maxlength="300"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lieu">Lieu:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="lieu" value="<?php echo $event['lieu']; ?>" id="lieu">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date" id="date" value="<?php echo $event['date']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="heuredebut">heure début:
                        </label>
                    </td>
                    <td><input type="text" name="heuredebut" id="heuredebut" value="<?php echo $event['heuredebut']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="heurefin">heure fin:
                        </label>
                    </td>
                    <td><input type="text" name="heurefin" id="heurefin" value="<?php echo $event['heurefin']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="capacite">Capacité:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="capacite" id="capacite" value="<?php echo $event['capacite']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image">Image:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="image" id="image" value="<?php echo $event['image']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="idtype">idtype:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="idtype" id="idtype" value="<?php echo $event['idtype']; ?>">
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
