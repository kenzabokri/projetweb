<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include '../../../controller/user_management/user_control.php';
require '../../../config.php';

$db = config::getConnexion();

$id = $_POST['id_rec'];
$first_name = $_POST['first_name'];
$email = $_POST['email'];
$message = $_POST['message'];
$answer = $_POST['answer'];

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
    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = "Heal Art";
    $mail->Body = "Hi $first_name,<br><br>
    <div style='font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px;'>
        <p style='font-size: 18px; color: #333;'>Replying To:</p>
        <p style='font-size: 16px; color: #555; margin-bottom: 20px;'>$message</p>
        <p style='font-size: 18px; color: #333;'>Answer:</p>
        <p style='font-size: 16px; color: #555;'>$answer</p>
    </div>";

    $mail->send();


    echo "<ul style='
                text-align:center;
                display: flex;
                justify-content: center;
                align-items: center;
                background-size: cover;
                font-size:30px;
                color:  black;'>
             <li><h4>Reply sent</h4></li>
          </ul>"
    ;

    $db->query("delete from reclamation where id_reclamation=$id");

} catch (Exception $e) {
    // Handle specific exceptions if needed
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
