<?php
session_start();
require('../../../config.php');
include('../../../controller/user_management/user_control.php');

$db = config::getConnexion();
$res = $db->query("SELECT * FROM users");
if($_SESSION['loggedIn']==1){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/user.js" ></script>
    <link rel="stylesheet" href="../assets/edit_user.css">
    <title>Users Table</title>
    <style>
        
        table {
            border: 2px;
            width: 100%;
            margin: 0 auto; /* Center the table */
            background-color: #fff; /* Set the background color to white */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
        .scrollable-table {
          max-height: 400px; /* ajustez la hauteur maximale selon vos besoins */
          overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="scrollable-table">
    <div  class='show' id='container'>
        <table>
        <th><label for="search">Search:</label>
        <input type="text" id="search" onkeyup="searchFunction()" placeholder="Enter search term..."></th>
            <tr>
                <td>first_name</td>
                <td>last_name</td>
                <td>role</td>
                <td>email</td>
                <td>email verification</td>
            </tr>

            <?php
            foreach ($res as $t) {
                echo"<input type='text' id='".$t['user_id']."' value='".$t['user_id']."' hidden>";
                echo "
                
                <tr>
                    <td>" . $t['first_name'] . "</td>
                    <td>" . $t['last_name'] . "</td>
                    <td>" . $t['role'] . "</td>
                    <td>" . $t['email'] . "</td>
                    <td>" . ($t['token'] == 1 ? 'verified' : 'not verified') . "</td>
                    <td><button onclick=\"updatePinfo(" . $t['user_id'] . ")\">edit</button></td>
                    <td><button onclick=\"deleteUser(" . $t['user_id'] . ")\">Delete</button></td>
                </tr>";
            }
            ?>
        </table>
    </div>
    </div>
    <div><button onclick="adduser()">add user</button></div>

</body>
<script>
  function searchFunction() {

    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
   
    table = document.querySelector(".show"); 
    tr = table.getElementsByTagName("tr");

    
    for (i = 2; i < tr.length; i++) {
      
      var rowContainsSearchTerm = false;
      for (var j = 0; j < tr[i].cells.length; j++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            rowContainsSearchTerm = true;
            break; 
          }
        }
      }

      if (rowContainsSearchTerm) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
</script>
<script>
    
    function adduser(){
        $(document).ready(function(){
            $("#container").load("add_user.php"); 
        });
    }

    function deleteUser(id){
        $(document).ready(function(){
            var confirmed = confirm('Are you sure you want to delete this USER?');
            if (confirmed) {
                $("#container").load("delete_user.php",{
                    user_id: id
                });
            }
            else{
                alert('Deletion canceled');
            }
        });
    }

    function updatePinfo(id){
        $(document).ready(function(){
            $("#container").load("edit_user.php",{
                id_user: id
            });
        });
    }
</script>
</html>
<?php
}else{
?>
<script>
  window.location.reload(true);
</script>
<?php
}
?>