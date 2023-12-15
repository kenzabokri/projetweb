<?php
    $id=$_GET['id'];
    $role=$_GET['role'];
    $url="../Front Office/index.php?id=$id&role=$role";
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 


    <meta charset="utf-8">
    <!-- <title>Responsive Sidebar Menu</title> -->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="../assets/edit_user.css">
    
</script>
  </head>
  <body style="background-image: url(../images/admin_back.png);" >
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>My Menu</header>
      <a href="#" class="active1" onclick="statistic()"> 
       <span>Dashboard</span>
      </a>
      <a href="<?php echo $url?>">
       <span>Home</span>
      </a>
      
      <a href="#" onclick="show_users()">
        <span>show users</span>
      </a>
      <a href="#" onclick="manipulate_user()">
        <span>manipulate users</span>
      </a>

      <a href="#" onclick="manipulate_rec()">
        <span> reclamation</span>
      </a>
      
      
      <a href="../Front Office/logout.php">
        <span>log out</span>
      </a>
    </div>
    
    <div id="container">
      
<style>
    .centered-list {
        list-style-type: none;
        padding-top: 300px;
        text-align: center; /* Center-align the contents */
    }

    .centered-list li {
        display: inline-block; /* Display list items horizontally */
        margin: 0 10px; /* Add some margin between list items for spacing */
        color:brown  ;
        font-size: 30px;
        background-color: aliceblue;
    }
</style>


<?php
    require('../../config.php');
    include('../../controller/user_control.php');

    $db = config::getConnexion();
    $res = $db->query("SELECT * FROM users");
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
    $reclamations = $db->query("SELECT count(id_reclamation) as count FROM reclamation");
    $countResult = $reclamations->fetch(PDO::FETCH_ASSOC);

    $count = $countResult['count'];



    echo "
    <ul class='centered-list'>
        <li><h3><p>ADMINISTRATORS:</p> ".$Admins."</h3></li>
        <li><h3><p>PATIENTS:</p> ".$Patients."</h3></li>
        <li><h3><p>ART THERAPISTS:</p> ".$ArtTherapists."</h5></li>
        <li><h3><p>RECLAMATIONS: </p>".$count."</h5></li>
    </ul>";
?>
    </div>
</body>
<script>
    function show_users(){
        $(document).ready(function(){
            $("#container").load("show_users.php", function(response, status, xhr){
                if (status == "success") {
                    console.log("Content loaded successfully");
                } else {
                    console.error("Failed to load content");
                }
            });
        });
    }

    function manipulate_user(){
        $(document).ready(function(){
            $("#container").load("manipulate_users.php");
        });
    }
    
    function manipulate_rec(){
      $(document).ready(function(){
          $("#container").load("reponse.php");
      });
    }

    function statistic(){
      $(document).ready(function(){
          $("#container").load("statistic.php");
      });
    }
</script>
</html>