
<?php
    session_start();
    require('../../../config.php');
    include('../../../controller/user_management/user_control.php');

    $id=$_GET['id'];
    $role=$_GET['role'];
    $url="../../Front Office/index.php?id=$id&role=$role";

    $db = config::getConnexion();
    $res = $db->query("SELECT * FROM users");
    $res1 = $db->query("SELECT * FROM images");
    foreach($res1 as $t){
      $image=$t['image_data'];
    }
    $ArtTherapists=0;
    $Patients=0;
    $Admins=0;
    foreach($res as $t){
        $role=$t['role'];
        if($role=="PATIENT"){
            $ArtTherapists++;
        }
        elseif($role=="ART THERAPIST"){
            $Patients++;
        }
        else{
            $Admins++;
        }
    }
    $ArtTherapistsPercentage=($ArtTherapists*100)/($ArtTherapists+$Patients+$Admins);
    $PatientsPercentage=($Patients*100)/($ArtTherapists+$Patients+$Admins);
    $AdminsPercentage=($Admins*100)/($ArtTherapists+$Patients+$Admins);
    $reclamations = $db->query("SELECT count(id_reclamation) as count FROM reclamation");
    $countResult = $reclamations->fetch(PDO::FETCH_ASSOC);

    $count = $countResult['count'];
    
if($_SESSION['loggedIn']==1){
?>


<html>
  <head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="../../assets/admin.css">
    <!--<link rel="stylesheet" href="../assets/edit_user.css">-->
    <style>
    .centered-list {
        list-style-type: none;
        padding-top: 30px;
        text-align: center; /* Center-align the contents */
    }

    .centered-list li {
        display: inline-block; /* Display list items horizontally */
        margin: 0 10px; /* Add some margin between list items for spacing */
        color:black  ;
        font-size: 20px;

    }
</style>

  </head>
  <body>
    <div class="background"></div>
    <div class="body-wrapper">
      <div class="panel">
        <div class="aside">
          <div class="avatar"><a href="#" onclick="avatar()"><img src="https://66.media.tumblr.com/avatar_faa95867d2b3_128.png"/></a></div>
          <div class="seperator"></div>
          <div class="list">
            <div class="item selected" id="general" ><a href="#" onclick="statistic()" >GENERAL</a></div>
            <div class="item" ><a href="<?php echo $url?>">Home</a></div>
            <div class="item" id="show" ><a href="#" onclick="show_users()" >show users</a></div>
            <div class="item" id="user"><a href="#" onclick="manipulate_user()" >edit users</a></div>
            <div class="item" id="rec"><a href="#" onclick="manipulate_rec()" >reclamations</a></div>
            <div class="item" id="comment"><a href="#" onclick="comments()" >comments</a></div>
          </div>
          <div class="log-out" ><a href="../../Front Office/user_management/logout.php">LOG OUT</a></div>
        </div>
        <div class="view">
          <div class="sub-title">ADMIN PANEL</div>
          <div class="main-title">GENERAL</div>
          <div class="seperator"></div>

            <div id="container" class="inf">
            <?php
                echo"
                    <ul class='centered-list'>
                        <li><h3><p>ADMINISTRATORS:</p> ".$Admins."<p>".floor($AdminsPercentage)."% of all users</p></h3></li>
                        <li><h3><p>PATIENTS:</p> ".$Patients."<p>".floor($PatientsPercentage)."% of all users</h3></li>
                        <li><h3><p>ART THERAPISTS:</p> ".$ArtTherapists."<p>".floor($ArtTherapistsPercentage)."% of all users</h5></li>
                        <li><h3><p>RECLAMATIONS: </p>".$count."</h5></li>
                    </ul>
                ";
            ?>
        
                
            </div>
          
          
        </div>
        
      </div>
    </div>
  </body>

  <script>
    function show_users(){
            $(document).ready(function(){
                $("#container").load("show_users.php", function(){

                    $(".item.selected").removeClass("item selected").addClass("item");
                    $(".item.selected").removeClass("item selected").addClass("item");

                    $("#show").removeClass("item").addClass("item selected");
                    });
                });
    }
        
        

    function manipulate_user(){
        $(document).ready(function(){
            $("#container").load("manipulate_users.php",function(){
                $(".item.selected").removeClass("item selected").addClass("item");
                $("#user").removeClass("item").addClass("item selected");
            });

        });
    }
    function avatar(){
        $(document).ready(function(){
            $("#container").load("avatar.php",function(){
            });

        });
    }

    function comments(){
        $(document).ready(function(){
            $("#container").load("comment.php",function(){
              $(".item.selected").removeClass("item selected").addClass("item");
              $("#comment").removeClass("item").addClass("item selected");
            });

        });
    }
    
    function manipulate_rec(){
      $(document).ready(function(){
          $("#container").load("reponse.php",function(){
            $(".item.selected").removeClass("item selected").addClass("item");
            $("#rec").removeClass("item").addClass("item selected");
          });
      });
    }

    function statistic(){
      $(document).ready(function(){
          $("#container").load("statistic.php",function(){
            $(".item.selected").removeClass("item selected").addClass("item");
            $("#general").removeClass("item").addClass("item selected");
          });
      });
    }
</script>
</html>
<?php
}else{
    
   header("location: ../Front Office/logout.php");
}
?>