<?php
include "../../controller/typet.php";

$t = new typet();
$tab = $t->listtype();

?>

<center>
    <h1>List of types</h1>
    <h2>
        <a href="./addtype.php">Add type</a>
    </h2>
</center>
<style>
body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh;
            margin: 200;
            background-color: #fff; 
            background-image: url('ba.png'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id type</th>
        <th>nomtype</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $type) {
    ?>




        <tr>
            <td><?= $type['idtype']; ?></td>
            <td><?= $type['nomtype']; ?></td>
            <td align="center">
                <form method="POST" action="./updatetype.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $type['idtype']; ?> name="idtype">
                </form>
            </td>
            <td>
                <a href="./deletetype.php?idtype=<?php echo $type['idtype']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>