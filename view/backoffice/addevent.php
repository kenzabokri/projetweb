
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
</head>

<body>
    <a href="listevent.php">Back to list </a>
    <hr>

   

    <form action="addevent.php" method="POST">
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
                    <label for="date">date:
                    </label>
                </td>
                <td>
              <input
                type="date"
                id="date"
                name="date"
                required
                min="2024-01-01"
                max="2024-12-31"
              
                >
            </td>
            </tr>
            <tr>
                <td>
                    <label for="description">description:
                    </label>
                </td>
                <td>
                    <input type="text" name="description" id="description">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="heuredebut">heuredebut:
                    </label>
                </td>
                <td>
                    <input type="text" name="heuredebut" id="heuredebut">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="heurefin">heurefin:
                    </label>
                </td>
                <td>
                    <input type="text" name="heurefin" id="heurefin">
                </td>
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
                    <label for="type">type:
                    </label>
                </td>
                <td>
                    <input type="text" name="type" id="type">
                </td>
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
            
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                
            </tr>
        </table>
    </form>
</body>

</html>
<?php
require_once 'C:\xampp\htdocs\projet\views\Back Office\config.php';

$pdo = config::getConnexion();





   
    $nomevent = htmlspecialchars($_POST["nomevent"]);
    $date = htmlspecialchars($_POST["date"]);
    $description = htmlspecialchars($_POST["description"]);
    $heuredebut = htmlspecialchars($_POST["heuredebut"]);
    $heurefin = htmlspecialchars($_POST["heurefin"]);
    $capacite = htmlspecialchars($_POST["capacite"]);
    $image = htmlspecialchars($_POST["image"]);
    $type = htmlspecialchars($_POST["type"]);
    $lieu = htmlspecialchars($_POST["lieu"]);
   

    try {
        // Insert into Event table
        $query = $pdo->prepare("INSERT INTO event (nomevent, date , description, heuredebut, heurefin, capacite, image, type, lieu) VALUES ( :nomevent, :date, :description, :heuredebut, :heurefin, :capacite, :image, :type, :lieu)");
        $query->bindParam(':nomevent', $nomevent);
        $query->bindParam(':date', $date);
        $query->bindParam(':description', $description);
        $query->bindParam(':heuredebut', $heuredebut);
        $query->bindParam(':heurefin', $heurefin);
        $query->bindParam(':capacite', $capacite);
        $query->bindParam(':image', $image);
        $query->bindParam(':type', $type);
        $query->bindParam(':lieu', $lieu);
        
        $query->execute();

        

        // Redirect after successful submission
        header("Location: ./addevent.php");
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        //die('Error: ' . $e->getMessage());
    }

?>
