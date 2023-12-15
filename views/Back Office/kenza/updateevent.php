<?php

include '../../../controller/kenza/evente.php';
include '../../../model/kenza/event.php';
include '../../../config5.php';
$db=config2::getConnexion();
$res=$db->query("select * from type");
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
        <h1><a href="./addevent.php" class="item ">ADD event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listtype.php" class="item ">type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./addtype.php" class="item ">ADD type</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./searchevent.php" class="item ">search event</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./listformulaire.php" class="item selected">form</a></h1>
        <div class="seperator"></div>
        <h1> <a href="./statistique.php" class="item ">stat</a></h1>
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">kenza'S PANEL</div>
        <div class="main-title">Add event</div>
        <div class="seperator"></div>
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
                        <select name="idtype" id="">
                        <?php 
                            foreach($res as $t){
                        ?>
                            <option value="<?php echo$t['idtype']?>"><?php echo$t['nomtype']?></option>
                            <?php 
                            }
                            ?>
                        </select>
                            
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
        <script src="../../../model/kenza/verif.js"></script>
    <?php
    }
    ?>
</body>

</html>
