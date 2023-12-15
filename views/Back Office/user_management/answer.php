<?php
   require ('../../../config.php');
   include ('../../../controller/user_management/user_control.php');
   $db=config::getConnexion();
   $res = $db->query("SELECT * FROM reclamation");
   $id=$_POST['id_rec'];
   foreach($res as $t){
       if($t['id_reclamation']==$id){
           $first_name=$t['first_name'];
           $email=$t['email'];
           $message=$t['message'];
           break;
       }
   }
?>
<pre>       
</pre>
<div class="contactform" id='content'>
  
   <h3 id="first_name" >Reply To: <?php echo$first_name?></h3>
   <h3 id="email">Email: <?php echo$email?></h3>
   <h3 id="message">Reclamation: <?php echo$message?></h3>
      <div class="inputboite">
      <textarea placeholder="Reply" id="answer"></textarea>
      </div>
      <div class="inputboite">
         <button class="btn-reserve" onclick="answer1()" >confirm</button>
      </div> 
      <div id="erreur" style="color: red;"></div>
      
   
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function answer1() {
        if(document.getElementById('answer').value==""){
            document.getElementById('erreur').innerHTML="Please fill in the reply field";
            return false;
        }
        var id_rec = <?php echo $id; ?>;
        var first_name = '<?php echo $first_name; ?>';
        var email = '<?php echo $email; ?>';
        var message = '<?php echo $message; ?>';
        var answer = document.getElementById('answer').value;
        document.getElementById('content').innerHTML="sending reply...";
        $.post("answer1.php", {
            id_rec: id_rec,
            first_name: first_name,
            email: email,
            message: message,
            answer: answer
        })
        .done(function(data) {
            // Replace the form with the "Reply sent" message
            $("#container").html("<div>" + data + "</div>");
        })
        
    }
</script>

 

 
