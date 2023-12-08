

<pre>   
    
    



    
</pre>
<div class="contactform">
   <div id="edited"></div>
   <h3>check your email:</h3>

      <div class="inputboite">
         <input type="text" id="codeEntered" placeholder="verification code" >
      </div>
      
      <div class="inputboite">
         <button class="btn-reserve" onclick="verifCode()" >confirm</button>
      </div> 
      <div id="incorrect"></div>
 
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
    if($t['user_id']==$_POST['id_user']){
        $email=$t["email"];
        $id=$t["user_id"];
        $found=1;
        break;
    }
}
$code= rand(100000, 999999);
?>
<input type="text" id="code" value="<?php echo$code?>" hidden>
<?php
try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bechir.mejri@esprit.tn';
    $mail->Password = 'orbxqsznmflqcegg'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587;

    $mail->setFrom('bechir.mejri@esprit.tn');

    
   $mail->addAddress($email);
   $mail->isHTML(true);
   $mail->Subject = "HealArt: Verification code";
   $mail->Body = "verification code: ".$code;
   $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>


<script>
   function verifCode(){
      var code = document.getElementById('code').value;
      var codeEntered = document.getElementById('codeEntered').value;
      var incorrectMessage = document.getElementById('incorrect');

      if (code !== codeEntered) {
         incorrectMessage.innerHTML = '<p style="color:red" >Code incorrect</p>';
      } else {
         $(document).ready(function(){
        var id=<?php echo $id?>;
        $("#container").load("update_token.php",{
            id_user: id
        });
    });
      }
   }
   
</script>
