<script src="../assets/js/edit.js" ></script>
<div >
  
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">first_name</th>
        <th class="text-center">last_name</th>
        <th class="text-center">email</th>
        <th class="text-center">role</th>
        <th class="text-center" colspan="2">action</th>
      </tr>
    </thead>
    <?php
      include_once "../config.php";
      include '../controller/user_control.php';
      $db=config::getConnexion();
      $result=User_control::show_users($db);
      $count=1;
      foreach ($result as $row) {
        $editLink = "../../../edit.php?id=". $row['user_id'];
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["first_name"]?></td>
      <td><?=$row["last_name"]?></td>      
      <td><?=$row["email"]?></td> 
      <td><?=$row["role"]?></td> 
      <td><button class="btn btn-primary" style="height:40px" ><a href="<?php echo$editLink?>"><span style="color: white;" >edit</span></a></button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="deleteUser('<?=$row['user_id']?>')">Delete</button></td>
    </tr>
      <?php
            $count=$count+1;
          }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add User
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New user</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./register.php" method="POST">
            
            <div class="form-group">
              <label for="qty">firstname:</label>
              <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
              <label for="qty">lastname:</label>
              <input type="text" class="form-control" id="last_name" name="last_name" required >
            </div>
            <div class="form-group">
              <label for="qty">email:</label>
              <input type="text" class="form-control" id="email" name="email" required >
            </div>
            <div class="form-group">
              <label>Role:</label>
              <select id="role" name="role" required>
                <option value="">Role</option>
                <option value="PATIENT">PATIENT</option>
                <option value="ART THERAPIST">ART THERAPIST</option>
              </select>
            </div>
            <div class="form-group">
              <label for="qty">password:</label>
              <input type="text" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="form-group">
              <button onclick="return verif()" type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add user</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  

  
</div>
<script>
  function deleteUser(userId) {
    if (confirm("Are you sure you want to delete this user?")) {
      window.location.href = './adminView/delete_user.php?id=' + encodeURIComponent(userId);
    }
  }

  /*function EditUser(userId) {
    if (confirm("Are you sure you want to edit this user?")) {
      window.location.href = './adminView/editUser.php?id=' + encodeURIComponent(userId);
    }
  }*/
  function EditUser(userId) {
    $.ajax({
        url:"../../adminView/editUser.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
  }
</script>
