
<?php
    require('../../../config.php');
    $db=config::getConnexion();
    $res=$db->query("select * from events");
?>
<html lang="en">


    <div style="color: white;" >
    <h3>Participate: </h3>
    <pre>
        
    </pre>
        <form action="./kenza/saveP.php" method="post" >
            <div class="inputboite">
                <h3>firstname: </h3>
                <input type="text" name="nom" id="nom" maxlength="20" placeholder='firstname'>
            </div>
            <pre>

            </pre>
            <div class="inputboite">
                <h3>lastname: </h3>
                <input type="text" name="prenom" id="prenom" maxlength="20" placeholder='lastname'>
            </div>
            <pre>
                
            </pre>

            <pre>
                
            </pre>
            <div>
                <h3>Event_Name:</h3>
                <select name="nome" id="nome">
                    <?php 
                        foreach($res as $t){
                    ?>
                        <option value="<?php echo$t['idevent']?>"><?php echo$t['nomevent']?></option>
                    <?php
                    }?>
                </select>
            </div>
            <pre>
                
            </pre>
            <div class="inputboite">
                <h3>phone number: </h3>
                <input type="text" name="numero" id="numero" placeholder="phone number" >
            </div>
            <pre>
                
            </pre>
            <div class="inputboite">
                <button class="btn-reserve" id="submit-btn1" type="submit">save</button>
            </div>
        </form>
    </div>
        
    

</html>         
 