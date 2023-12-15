<?php
    require '../../../config.php';

    $db = config::getConnexion();
    $id=$_POST['id_rec'];
    $db->query("delete from reclamation where id_reclamation=$id");
    header("location: ./reponse .php");
?>