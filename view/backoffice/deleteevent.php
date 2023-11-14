<form align='center' action="./deleteevent.php">
    <h1>
        <input type="text" name='idevent'>
    <input type="submit" value="ok" >
</h1>


</form>
<?php
require_once 'C:\xampp\htdocs\projet\views\Back Office\config.php';

$pdo = config::getConnexion();
$idevent=$_GET['idevent'];
if (isset($_GET['idevent'])) {
    $id = htmlspecialchars($_GET['idevent']);

    try {
        // Supprimer l'événement de la table
        $query = $pdo->prepare("DELETE FROM Event WHERE idevent = :idevent");
        $query->bindParam(':idevent', $idevent);
        $query->execute();

        // Rediriger après la suppression réussie
       
        exit();
    } catch (PDOException $e) {
        // Gérer les erreurs de la base de données
        // die('Error: ' . $e->getMessage());
        echo 'Error: ' . $e->getMessage();
    }
}
?>
