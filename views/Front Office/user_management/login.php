<?php
    session_start();
    include '../../../controller/user_management/user_control.php';
    require '../../../config.php';
    
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secret = "6Le7QycpAAAAANmnSRQGQYZ0Q4amcis1WDjuLegH";
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $data = json_decode($response);

        if ($data->success) {
            $db=config::getConnexion();
            $res=User_control::show_users($db);
            $found=0;
            foreach($res as $t){
                if($t["email"]==$_POST["email"] && $t["password"]==$_POST["password"]){
                    $role=$t["role"];
                    $id=$t["user_id"];
                    $found=1;
                    $_SESSION['email']=$_POST["email"];
                    $_SESSION['id']=$t["user_id"];
                    $_SESSION['role']=$role;
                    $_SESSION['loggedIn']=1;
                    break;
                }
            }
            if($found==1 && $role=="PATIENT"){
                header("location: ./patient_panel.php?id=$id&role=PATIENT");
            }
            elseif($found==1 && $role=="ART THERAPIST"){
                header("location: ./artTherapist_panel.php?id=$id&role=ART THERAPIST");
            }
            elseif($found==1 && $role=="UserAdmin"){
                header("location: ..\..\Back Office\user_management\admin.php?id=$id&role=Administrator");
            }
            elseif($found==1 && $role=="LessionsAdmin"){
                header("location: ../../Back Office/hejer/mainGestionCat.php?id=$id&role=LessionsAdmin");
            }
            elseif($found==1 && $role=="artpiecesAdmin"){
                header("location: ../../Back Office/oeuvre_mana/gestionOeuvre.php?id=$id&role=artpiecesAdmin");
            }
            elseif($found==1 && $role=="DonAdmin"){
                header("location: ../../Back Office/rayen/listDon.php?id=$id&role=artpiecesAdmin");
            }
            elseif($found==1 && $role=="EventAdmin"){
                header("location: ../../Back Office/kenza/back.php?id=$id&role=artpiecesAdmin");
            }
            elseif($found==1 && $role=="EmploiAdmin"){
                header("location: ../../Back Office/amine/mainGestionCat.php?id=$id&role=artpiecesAdmin");
            }
            else{
                echo"mail and password not match";
            }
        } else {
            // Verification failed
            echo "Error: Captcha verification failed.";
        }
    } else {
        // No captcha response
        echo "Please try again";
    }

    
?>