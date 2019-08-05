<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:33
 */

if (isset($_POST['code-campus'])&& isset($_POST['libelle-campus'])&& $_SESSION['type']=='administrateur'){
    $code = $_POST['code-campus'];
    $libelle =$_POST['libelle-campus'];

    $campus = new campus(array('code_campus'=>strtoupper($code),'libelle_campus'=>$libelle));
    $campusManager = new CampusManager($bdd);
    try {
        $campusManager->add($campus);
        echo "<script> alertMsg('success','Campus successfully added');</script>";
    }catch (Exception $e){

        echo "<script> alertMsg('danger','A Campus with this code already exist or You have entrered wrong informations');</script>";
    }
}
?>
