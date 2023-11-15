<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="controle.js" defer></script>
    <title>Class</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #fff; 
            background-image: url('../Back Office/logo_2.png'); 
            background-size: cover;
            background-position: center; 
        }

       
    </style>
</head>

<body>

    <header>
        <a href="classe.php">Back to list</a>
        <hr>
    </header>

    <main>
        <form  action="addclass.php" method="POST" onsubmit="return validateForm();">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="nomclasse">Nom de la classe:</label>
                    </td>
                    <td>
                        <input type="text" name="nomclasse" id="nomclasse" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nbpatient">Nombre de patients:</label>
                    </td>
                    <td>
                        <input type="text" name="nbpatient" id="nbpatient" required>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" value="Save">
                    </td>
                </tr>
            </table>
        </form>
    </main>

    <?php
    require_once 'C:\xampp\htdocs\projetamine\views\Back Office\config.php';

    $pdo = config::getConnexion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomclasse = htmlspecialchars($_POST["nomclasse"]);
        $nbpatient = htmlspecialchars($_POST["nbpatient"]);

        try {
           
            $query = $pdo->prepare("INSERT INTO class (nomclasse, nbpatient) VALUES (:nomclasse, :nbpatient)");
            $query->bindParam(':nomclasse', $nomclasse);
            $query->bindParam(':nbpatient', $nbpatient);

            $query->execute();

            header("Location: ./addclass.php");
            exit();
        } catch (PDOException $e) {
            // die('Error: ' . $e->getMessage());
        }
    }
    ?>

</body>

</html>
