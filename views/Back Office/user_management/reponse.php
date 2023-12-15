<?php
require('../../../config.php');
include('../../../controller/user_management/user_control.php');
session_start();
$db = config::getConnexion();
$res = $db->query("SELECT * FROM reclamation");
if($_SESSION['loggedIn']==1){
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
        <th>
            <label for="search">Search:</label>
            <input type="text" id="search" onkeyup="searchFunction()" placeholder="Enter search term...">
        </th>
            <tr>
                <td>first_name</td>
                <td>email</td>
                <td>reclamation</td>
            </tr>

            <?php
                foreach ($res as $t) {
                    echo "
                    <tr>
                        
                        <td>" . $t['first_name'] . "</td>
                        <td>" . $t['email'] . "</td>
                        <td>" . $t['message'] . "</td>
                        <td><button onclick=\"answer(" . $t['id_reclamation'] . ")\">Answer</button></td>
                        <td><button onclick=\"deleteRec(" . $t['id_reclamation'] . ")\">Delete</button></td>
                    </tr>";
                }
            ?>

        </table>
    </div>
    </div>
    
</body>
<script>
    function answer(id){
        $(document).ready(function(){


            $("#container").load("answer.php",{
                id_rec: id
            });
        });
    }
    

    function deleteRec(id){
        $(document).ready(function(){
            var confirmed = confirm('Are you sure you want to delete this RECLAMATION ?');
            if (confirmed) {
                $("#container").load("deleteRec.php",{
                    id_rec: id
                });
            }
            else{
                alert('Deletion canceled');
            }
            
        });
    }
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