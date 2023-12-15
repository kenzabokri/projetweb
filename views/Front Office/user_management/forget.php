<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include '../../../controller/user_management/user_control.php';
require '../../../config.php';

$db=config::getConnexion();
$res=User_control::show_users($db);
$found=0;
foreach($res as $t){
    if($t['email']==$_POST["email"]){
        $first_name=$t["first_name"];
        $last_name=$t["last_name"];
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
        $resetLink="http://192.168.1.166/Ajax%20-%20Copy/views/Front%20Office/user_management/passworRecovery.php?id=$id";
        $mail->Body = "
    <div style='font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px;'>
        <p style='font-size: 18px; color: #333;'>Hi $first_name $last_name,</p>
        <p style='font-size: 16px; color: #555;'>We received a request to reset your password. If you did not make this request, please ignore this email.</p>
        <p style='font-size: 16px; color: #555;'>To reset your password, click the following button:</p>
        <a href='$resetLink' style='display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007BFF; text-decoration: none; border-radius: 5px;'>Reset Password</a>
        <br>
            <pre>  
            
            </pre>
        <br>
        <p style='font-size: 14px; color: #777;'>If the above button doesn't work, copy and paste the following URL into your browser:</p>
        <p style='font-size: 14px; color: #777;'>$resetLink</p>
        <br><br>
        <p style='font-size: 14px; color: #333;'>Thank you,<br>Heal Team</p>
    </div>";

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
