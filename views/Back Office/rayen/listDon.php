<?php
include '../../../controller/rayen/donC.php';


$d = new donC();
$tab = $d->listdons();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./styletab.css">
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">

</head>
<body>
  <div class="background"></div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
      <a href="../../Front Office/index.php">home</a>
        <div class="seperator"></div>
        <div class="list">
          <a href="listDon.php" class="item selected">DONS</a>
          <div class="seperator"></div>
          <a href="addDon.php" class="item">ADD DONS</a>
          <div class="seperator"></div>
          <a href="listDest.php" class="item">Destination</a>
          <div class="seperator"></div>
          <a href="addDest.php" class="item">ADD DES</a>
          <div class="seperator"></div>
          <a href="statDon.php" class="item">STAT</a>
          <div class="seperator"></div>
          <a href="exportDonations.php" class="button">Download CSV</a>
          <div class="seperator"></div>
        </div>
        <a href="../../Front Office/user_management/logout.php">logout</a>
      </div>
      <div class="view">
        <div class="sub-title">RAYEN'S PANEL</div>
        <div class="main-title">les DONS</div>
        <div class="seperator"></div>

        <style>
          .scrollable-table {
            max-height: 400px;
            overflow-y: auto;
          }
        </style>

        <div class="scrollable-table">    
          <table class="rwd-table" border="1" align="center" width="70%">
            <tr>
              <th>Id don</th>
              <th>Montant</th>
              <th>Destination</th>
              <th>Description</th>
            </tr>
            <?php
            foreach ($tab as $dons) {
              ?>
              <tr>
                <td data-th="Movie Title"><?= $dons['ID_don']; ?></td>
                <td data-th="Genre"><?= $dons['Montant']; ?></td>
                <td data-th="Year"><?= $dons['destination']; ?></td>
                <td data-th="Gross"><?= $dons['description']; ?></td>
                <td>              
                  <button><a href="deleteDon.php?ID_don=<?php echo $dons['ID_don']; ?>" class="item">Delete </a></button>
                </td>
              </tr>
              <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- partial -->
<script src="./script.js"></script>
</body>
</html>
