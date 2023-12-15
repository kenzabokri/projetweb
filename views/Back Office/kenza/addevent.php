<?php
include '../../../controller/kenza/evente.php';
include '../../../config5.php';
include '../../../model/kenza/event.php';


$db=config2::getConnexion();
$res=$db->query("select * from type");


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

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
</head>
<body>
<body>
  <div class="background">   
  </div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
      <a href="../../Front Office/index.php">Home </a>
      <p><a href="../../Front Office/user_management/logout.php">Log out</a></p>
        <div class="seperator"></div>
        <div class="list">
       <h1> <a href="./listevent.php" class="item ">events</a></h1>
        <div class="seperator"></div>
        <h1><a href="./addevent.php" class="item selected">ADD event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listtype.php" class="item ">type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./addtype.php" class="item ">ADD type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./searchevent.php" class="item ">search event</a></h1>
        <h1> <a href="./listformulaire.php" class="item ">form</a></h1>
        <h1> <a href="./statistique.php" class="item ">stat</a></h1>
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">kenza'S PANEL</div>
        <div class="main-title">Add event</div>
        <div class="seperator"></div>

<body>
    
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
            <?php 
                foreach($res as $t){
            ?>
                <option value="<?php echo$t['idtype']?>"><?php echo$t['nomtype'] ?></option>
            <?php
                }
            ?>
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
    <script src="../../../model/kenza/verif.js"></script>
</body>

</html>          