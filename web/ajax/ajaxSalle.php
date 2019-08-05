<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 28/06/2017
 * Time: 13:11
 */
include_once "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion();
if(isset($_GET['delete'])&&!empty($_GET['delete'])){
    $salle = new SalleManager($bdd);
    try{
        $salle->delete($_GET['delete']);
        echo "<script>alertMsg('danger','Suppression de la salle ". $_GET['delete']."  avec success');</script>";
    }catch (Exception $e){
        echo "<script>alertMsg('danger','Echec de suppression de la salle ". $_GET['delete']." ');</script>";
    }
}