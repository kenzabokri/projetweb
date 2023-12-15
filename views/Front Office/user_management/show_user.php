<script src="../../assets/js/UserCRUD.js" ></script>
<?php 
    session_start();
    require ('../../../config.php');
    include ('../../../controller/user_management/user_control.php');
if($_SESSION['loggedIn']==1){
    $db=config::getConnexion();
    $res=User_control::show_users($db);
    $id=$_POST['id_user'];
    foreach($res as $t){
        if($t['user_id']==$id){
            echo "
                <ul class='info'>
                    <li><h3>first_name: </h3><h5>".$t['first_name']."</h5></li>
                    <pre>                </pre>
                    <li><h3>last_name: </h3><h5>".$t['last_name']."</h5></li>
                    <pre>                </pre>
                   <li><h3>email: </h3><h5>".$t['email']."</h5>
            ";
                if($t['token']==0){
                ?>
                <h5><a href='#' onclick='verifyMail()' class='verMail'>mail not verified click here to verify</a></h5></li>
                    <?php
                }
            echo"</ul>";
        }
    }

}else{
?>
<script>
  window.location.reload(true);
</script>
<?php
}
?>