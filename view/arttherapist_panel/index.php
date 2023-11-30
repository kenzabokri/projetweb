<!DOCTYPE html>
<html>
<head>
  <title>ART THERAPIST</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body style="background-image: url('./assets/images/signupB.png');" >

        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
            include_once "./config.php";
            include './controller/user_control.php';
            $db=config::getConnexion();
            $id=$_GET['id'];
            $query=$db->prepare("select * from users where user_id='$id'");
            $query->execute(); 
            $result = $query->fetchAll($db::FETCH_ASSOC);
            foreach ($result as $t) {
            }
            $url="../edit_pat_ther.php?id=".$t['user_id'];
        ?>

    <div id="main-content" class="container allContent-section py-4">
        
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    
                    <h4 style="color:white;">first_name</h4>
                    <h5 style="color:white;">
                    <?php
                        echo $t['first_name'];
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    
                    <h4 style="color:white;">last_name</h4>
                    <h5 style="color:white;">
                    <?php
                        echo $t['last_name'];
                    ?></h5>
                </div>
                    
            </div>
            <div class="col-sm-5">
                <div class="card">
                    
                    <h4 style="color:white;">email</h4>
                    <h5 style="color:white;">
                    <?php
                        echo $t['email'];
                    ?></h5>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="card">
                    <h5 style="color:white;">
                        <a href="<?php echo $url;?>"  ><i class="fa fa-th-list"></i>Update personnel information</a>
                    </h5>
                </div>
            </div>
            
        </div>
        
        
    </div>
       
            
        


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>