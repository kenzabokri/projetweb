<?php
    require ('C:\xampp\htdocs\ESPRIT\PROJET_WEB_Bechir\config.php');
    include ('../../../../controller/user_control.php');
    $db=config::getConnexion();
    $res=User_control::show_users($db);
    $username=$_POST['user'];
    $password=$_POST['password'];
    $verif=0;
    foreach($res as $t){
        if(($t['username']==$username || $t['mail']==$username)&& $t['password']==$password){
            $verif=1;
            $id=$t['id_user'];
            //echo  $t['role'];
            break;
        }
    }
    if($verif==1 && $t['role']=="Patient"){
        header("location: ../../index1.php?id=$id");
    }
    if($verif==1 && $t['role']=="Art thearpists"){
        header("location: ../../index2.php?id=$id");
    }
    if($verif==1 && $t['role']=="Administrator"){
        header("location: ../../../back_office/New folder/dashbord.php");
    }


?>