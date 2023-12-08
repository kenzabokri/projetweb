<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include '../../controller/user_control.php';
require '../../config.php';

$db=config::getConnexion();
$res=User_control::show_users($db);
$found=0;
foreach($res as $t){
    if($t['email']==$_POST["email"]){
        $password=$t["password"];
        $id=$t["user_id"];
        $found=1;
        break;
    }
}

try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'healart61@gmail.com';
    $mail->Password = 'cxgbwcisakbmmmuj'; // Use App Password if using 2-step verification
    $mail->SMTPSecure = 'tls'; // Use TLS instead of SSL
    $mail->Port = 587; // TLS port

    $mail->setFrom('healart61@gmail.com');

    // Check if the email key is set in the POST data
    if (isset($_POST["email"]) && $found==1) {
        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);

        $mail->Subject = "PASSWORD RECOVERY!!";
        $mail->Body = "http://192.168.1.166/Ajax/views/Front%20Office/passworRecovery.php?id=$id";

        $mail->send();

        echo "
        <script>
            document.location.href = './forget1.html';
        </script>";
    } else {
        echo "
        <script>
            alert('Email not registred');
            document.location.href = './forget.html';
        </script>";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
