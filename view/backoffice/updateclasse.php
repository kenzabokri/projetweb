
<?php
require_once 'C:\xampp\htdocs\projetamine\views\Back Office\config.php';

$pdo = config::getConnexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idclasse_to_update = htmlspecialchars($_POST["idclasse_to_update"]);

    $query = $pdo->prepare("SELECT * FROM class WHERE idclasse = :idclasse");
    $query->bindParam(':idclasse', $idclasse_to_update);
    $query->execute();
    $classe = $query->fetch(PDO::FETCH_ASSOC);

    if (!$classe) {
        echo "Classe non trouvée.";
        exit();
    }

    $nomclasse = htmlspecialchars($_POST["nomclasse"]);
    $nbpatient = htmlspecialchars($_POST["nbpatient"]);

    try {
        $query = $pdo->prepare("UPDATE class SET nomclasse = :nomclasse, nbpatient = :nbpatient WHERE idclasse = :idclasse");
        $query->bindParam(':idclasse', $idclasse_to_update);
        $query->bindParam(':nomclasse', $nomclasse);
        $query->bindParam(':nbpatient', $nbpatient);

        $query->execute();

        
        header("Location: ./updateclasse.php?idclasse=$idclasse_to_update");
        exit();
    } catch (PDOException $e) {
      
        // die('Error: ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
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

<body class="g-sidenav-show  bg-gray-100">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <form action="updateclasse.php" method="POST">
                                <label for="idclasse_to_update">ID de la classe à modifier:</label>
                                <input type="text" name="idclasse_to_update" id="idclasse_to_update" required>
                                <br>

                                <label for="nomclasse">Nom de la classe:</label>
                                <input type="text" name="nomclasse" id="nomclasse" required>
                                <br>

                                <label for="nbpatient">Nombre de patients:</label>
                                <input type="text" name="nbpatient" id="nbpatient" required>
                                <br>

                                <input type="submit" value="Enregistrer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
