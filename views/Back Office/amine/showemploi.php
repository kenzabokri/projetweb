<?php

include '../../../controller/amine/emploic.php';

$emploic = new emploic();
$emplois = $emploic->list(); 

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../../../model/amine/style2.css">
</head>

<body>
  <div class="background"></div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
        <div class="seperator"></div>
        <div class="list">
        <a href="../../Front Office/index.php" class="item "><h1>home</h1></a>
        <a href="./listclasse.php" class="item "><h1>classe</h1></a>
        <div class="seperator"></div>
        <a href="./addclasse.php"><h2>ADD Classe</h2></a>
        <div class="seperator"></div>
          <a href="./showemploi.php" class="item "><h1>emploi</h1></a>
          <div class="seperator"></div>
          <a href="./addemploi.php"><h2>ADD emploi</h2></a>
          <div class="seperator"></div>
        </div>
        <div class="log-out"><h2><a href="../../Front Office/user_management/logout.php">LOG OUT</a></h2></div>
      </div>
      <div class="view">
        <div class="sub-title"><h1>AMINE'S PANEL</h1></div>
        <div class="main-title">Emploi</div>
        <div class="seperator"></div>
        <table border="1" align="center" width="70%">
          <tr>
            <th>id emploi</th>
            <th>date</th>
            <th>dateDebut</th>
            <th>dateFin</th>
          </tr>
          <?php
          foreach ($emplois as $emploi) {
          ?>
            <tr>
              <td><?= $emploi['idemploi']; ?></td>
              <td><?= $emploi['date']; ?></td>
              <td><?= $emploi['dateDebut']; ?></td>
              <td><?= $emploi['dateFin']; ?></td>
              <td align="center">
                <form method="POST" action="./updateemploi.php">
                  <input type="submit" name="update" value="Update">
                  <input type="hidden" value=<?PHP echo $emploi['idemploi']; ?> name="idemploi">
                </form>
              </td>
              <td>
                <a href="./deleteemploi.php?idemploi=<?php echo $emploi['idemploi']; ?>">Delete</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</body>

</html>
