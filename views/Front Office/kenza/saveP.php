<?php
include "../../../controller/kenza/formulairef.php";
include '../../../model/kenza/formulaire.php';

$error = "";


$formulaire = null;

$formulairef = new formulairef();
var_dump($_POST);

        $formulaire = new formulaire(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['nome'],
            $_POST['numero']
        );

        $formulairef->add($formulaire);
        header("location: ../index.php");
   


?>