<?php
    session_start();
    include '../controller/user_control.php';
    require '../config.php';
    
    $db=config::getConnexion();
    $res=User_control::show_users($db);
    $found=0;
    foreach($res as $t){
        if($t["email"]==$_POST["email"] && $t["password"]==$_POST["password"]){
            $role=$t["role"];
            $id=$t["user_id"];
            $found=1;
            $_SESSION['email']=$_POST["email"];
            break;
        }
    }
    if($found==1 && $role=="PATIENT"){
        header("location: ./patient_panel/index.php?id=$id");
    }
    elseif($found==1 && $role=="ART THERAPIST"){
        header("location: ./arttherapist_panel/index.php?id=$id");
    }
    elseif($found==1 && $role=="Administrator"){
        header("location: .\back_office\Simple_Admin_Panel_In_PHP_With_Source_code\admin_panel\index.php");
    }
    else{
        echo"mail and password not match";
    }
?>