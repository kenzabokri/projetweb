<?php
include '../../../controller/rayen/donC.php';
include '../../../model/rayen/don2.php';

$error = "";


$d = null;


$donC = new donC();
$destination = $donC->getDest();

// ... (your existing code)

if (
    isset($_POST["Montant"]) &&
    isset($_POST["destination"]) &&
    isset($_POST["description"]) 
) {
    if (
        !empty($_POST['Montant']) &&
        !empty($_POST['destination']) &&
        !empty($_POST["description"]) 
    ) {
        $d = new dons(
            null,
            $_POST['Montant'],
            $_POST['destination'],
            $_POST['description']
        );
        $donC->addDons($d);

        // Retrieve the values from the added donation for redirection
        $Montant = $_POST["Montant"];
        $destination = $_POST["destination"];
        $description = $_POST["description"];

        header("location: ../index.php?add=5");
        exit();
    } else {
        $error = "Missing information";
    }
}
?>