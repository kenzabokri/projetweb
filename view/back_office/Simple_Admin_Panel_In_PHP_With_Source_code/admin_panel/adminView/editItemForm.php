
<div class="container p-5">

<h4>Edit User Detail</h4>
<?php
    include_once "../config.php";
	$ID=$_POST['record'];
  $db=config::getConnexion();
  $query=$db->prepare("SELECT * FROM users WHERE user_id='$ID'");
	$query->execute(); 
  $results = $query->fetchAll($db::FETCH_ASSOC);
	foreach($results as $row1){
?>
<form id="update-Items" action="./adminView/editUser.php" method="post" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="product_id" value="<?=$row1['user_id']?>" hidden name="id">
    </div>
    <div class="form-group">
      <label for="name">firstName:</label>
      <input type="text" class="form-control" id="p_name" value="<?=$row1['first_name']?>" name="first_name" >
    </div>
    <div class="form-group">
      <label for="desc">lastName:</label>
      <input type="text" class="form-control" id="p_desc" value="<?=$row1['last_name']?>" name="last_name" >
    </div>
    <div class="form-group">
      <label for="price">email:</label>
      <input type="text" class="form-control" id="p_price" value="<?=$row1['email']?>" name="email">
    </div>

    <div class="form-group">
      <select name="role" id="">
        <option value="">Role</option>
        <option value="PATIENT">PATIENT</option>
        <option value="ART THERAPIST">ART THERAPIST</option>
      </select>
    </div>

    <div class="form-group">
      <label for="price">password:</label>
      <input type="text" class="form-control" id="p_price" value="<?=$row1['password']?>" name="password">
    </div>
    
  
      
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update User</button>
    </div>
    <?php
    		}
    	
    ?>
  </form>

    </div>