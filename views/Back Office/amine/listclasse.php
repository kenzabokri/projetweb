<?php


include '../../../controller/amine/classec.php';



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
<link rel="stylesheet" href="../../../model/amine/style2.css">
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
        <a href="../../Front Office/index.php" class="item "><h1>home</h1></a>
        <a href="./listclasse.php" class="item "><h1>classe</h1></a>
        <div class="seperator"></div>
        <a href="./addclasse.php"><h2>ADD Classe</h2></a>
        <div class="seperator"></div>
        <a href="./showemploi.php" class="item "><h1>emploi</h1></a>
          <div class="seperator"></div>
          <a href="./addemploi.php"><h2>ADD emploi</h2></a>
        </div>
        <div class="log-out"><h2><a href="../../Front Office/user_management/logout.php">LOG OUT</a></h2></div>
      </div>
      <div class="view">
        <div class="sub-title"><h1>AMINE'S PANEL</h1></div>
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
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $classe['idclasse']; ?> name="idclasse">
                </form>
            </td>
            <td>
            <a href="./deleteclasse.php?idclasse=<?php echo $classe['idclasse']; ?>">Delete</a>
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
