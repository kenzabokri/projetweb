<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>
      </tr>
    </thead>
    <?php
      include_once "../config.php";
      include '../controller/user_control.php';
      $db=config::getConnexion();
      $result=User_control::show_users($db);
      $count=1;
      foreach ($result as $row) {
           
    ?>
    <tr>
      <td><?=$row["first_name"]?> <?=$row["last_name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["role"]?></td>
    </tr>
    <?php
      }
    ?>
  </table>

  