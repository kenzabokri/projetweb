<?php
    require '../../../config.php';

    $db = config::getConnexion();
    $id=$_POST['tem_id'];
    $db->query("delete from temoignages where id_tem=$id");
    header("location: ./comment.php");
?>