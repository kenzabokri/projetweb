
<style>
    .centered-list {
        list-style-type: none;
        padding-top: 30px;
        text-align: center; /* Center-align the contents */
    }

    .centered-list li {
        display: inline-block; /* Display list items horizontally */
        margin: 0 10px; /* Add some margin between list items for spacing */
        color:black  ;
        font-size: 20px;

    }
</style>

<?php
    require('../../../config.php');
    include('../../../controller/user_management/user_control.php');
    session_start();
if($_SESSION['loggedIn']==1){
    $db = config::getConnexion();
    $res = $db->query("SELECT * FROM users");
    $ArtTherapists=0;
    $Patients=0;
    $Admins=0;
    foreach($res as $t){
        $role=$t['role'];
        if($role=="PATIENT"){
            $ArtTherapists++;
        }
        elseif($role=="ART THERAPIST"){
            $Patients++;
        }
        else{
            $Admins++;
        }
    }
    $ArtTherapistsPercentage=($ArtTherapists*100)/($ArtTherapists+$Patients+$Admins);
    $PatientsPercentage=($Patients*100)/($ArtTherapists+$Patients+$Admins);
    $AdminsPercentage=($Admins*100)/($ArtTherapists+$Patients+$Admins);
    $reclamations = $db->query("SELECT count(id_reclamation) as count FROM reclamation");
    $countResult = $reclamations->fetch(PDO::FETCH_ASSOC);

    $count = $countResult['count'];



    echo "
    <ul class='centered-list'>
        <li><h3><p>ADMINISTRATORS:</p> ".$Admins."<p>".floor($AdminsPercentage)."% of all users</p></h3></li>
        <li><h3><p>PATIENTS:</p> ".$Patients."<p>".floor($PatientsPercentage)."% of all users</h3></li>
        <li><h3><p>ART THERAPISTS:</p> ".$ArtTherapists."<p>".floor($ArtTherapistsPercentage)."% of all users</h5></li>
        <li><h3><p>RECLAMATIONS: </p>".$count."</h5></li>
    </ul>";

}else{
?>
<script>
  window.location.reload(true);
</script>
<?php
}
?>