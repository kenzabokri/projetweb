<?php
    require ('../../../config.php');
    include("../../../controller/user_control.php");
    $firstName =$_POST["n"];
    $lastName =$_POST["p"];
    $username =$_POST["un"];
    $mail =$_POST["m"];
    $role ="";
    $description =$_POST["desc"];
    $password =$_POST["pass"];
    $userIdToUpdate=$_POST['id'];
    $db=config::getConnexion();
    User_control::update_user($db,$userIdToUpdate,$firstName,$lastName,$username,$mail,$role,$description,$password);
    echo$_POST['r'];
    if($_POST['r']=="Patient"){
        header("location: ../index1.php?id=$userIdToUpdate");
    }
    if( $_POST['r']=="Art thearpists"){
        header("location: ../index2.php?id=$userIdToUpdate");
    }
    if( $_POST['r']=="Administrator"){
        header("location: ../../back_office/New folder/dashbord.php");
    }

?>