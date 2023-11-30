<div>
  <h2>All Customers</h2>
  
  <!-- Add a search input field -->
  <label for="search">Search:</label>
  <input type="text" id="search" onkeyup="searchFunction()" placeholder="Enter search term...">

  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Username</th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>
      </tr>
    </thead>
    <?php
      include_once "../config.php";
      include '../controller/user_control.php';
      $db = config::getConnexion();
      $result = User_control::show_users($db);
      $count = 1;

      foreach ($result as $row) {
    ?>
    <tr>
      <td><?= $row["first_name"] ?> <?= $row["last_name"] ?></td>
      <td><?= $row["email"] ?></td>
      <td><?= $row["role"] ?></td>
    </tr>
    <?php
      }
    ?>
  </table>
</div>

<script>
  function searchFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows
    for (i = 0; i < tr.length; i++) {
      // Loop through all table columns
      var rowContainsSearchTerm = false;
      for (var j = 0; j < tr[i].cells.length; j++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            rowContainsSearchTerm = true;
            break; // Break the inner loop if a match is found in any column
          }
        }
      }

      // Show or hide the row based on search result
      if (rowContainsSearchTerm) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
</script>
