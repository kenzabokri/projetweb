<?php


include '../../controller/classec.php';
include '../../model/classe.php';




$c = new Classec();
$tab = $c->list();

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ADMIN PANEL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="../../model/style2.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div class="background"></div>
  <div class="body-wrapper">
    <div class="panel">
      <div class="aside"> 
        <div class="seperator"></div>
        <div class="list">
        <a href="./listclasse.php" class="item ">classes</a>
        <div class="seperator"></div>
        <a href="./addclasse.php" class="item">ADD Classe</a>
        <div class="seperator"></div>
        <!--<a href="./.php" class="item  selected">emploi</a>-->
        <div class="seperator"></div>
        <!--<a href="./add_categories.php" class="item ">ADD emploi</a>-->
        </div>
        <div class="log-out">LOG OUT</div>
      </div>
      <div class="view">
        <div class="sub-title">AMINE'S PANEL</div>
        <div class="main-title">classe</div>
        <div class="seperator"></div>
        <table border="1" align="center" width="70%">
    <tr>
        <th>id classe</th>
        <th>Nom Classe</th>
        <th>nombre de patient</th>
    </tr>
    <?php
    foreach ($tab as $classe) {
    ?>
        <tr>
            <td><?= $classe['idclasse']; ?></td>
            <td><?= $classe['nomclasse']; ?></td>
            <td><?= $classe['nbpatient']; ?></td>
            <td align="center">
                <form method="POST" action="./updateclasse.php">
                    <input type="submit" name="update" value="Update classe">
                    <input type="hidden" value=<?PHP echo $classe['idclasse']; ?> name="idclasse">
                </form>
            </td>
            <td>
                <a href="./deleteclasse.php?php echo $classe['idclasse']; ?>">Delete Classe</a>
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
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
