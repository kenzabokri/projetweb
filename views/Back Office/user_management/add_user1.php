<?php
    require '../../../config.php';
    include '../../../controller/user_management/user_control.php';
    include '../../../model/user_management/User.php';

    $user=new user($_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["role"],$_POST["password"]);
    $db=config::getConnexion();
    $res=User_control::show_users($db);
    $found=0;
    foreach($res as $t){
        if($t['email']==$user->get_email()){
            $found=1;
            break;
        }
    }
    /*if (isset($_POST['recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secret = "6Le7QycpAAAAANmnSRQGQYZ0Q4amcis1WDjuLegH";
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $data = json_decode($response);

        if ($data->success) {*/
            // Verification successful
            if(!$found){
                User_control::add_user($db, $user);
                echo"<p style='color:green' >registered successfully</p>";
            }
            else{
                echo"<p style='color:red' >email already registered</p>";
            }
            
        /*} else {
             //Verification failed
            echo "<p style='color:red' >Error: Captcha verification failed.</p>";
        }
    } else {
        // No captcha response
        echo "<p style='color:red' >Please try again</p>";

    }*/

?>  
    
    
