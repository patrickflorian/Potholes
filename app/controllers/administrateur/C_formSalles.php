<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:35
 */
include_once "lib/autoload.php";

$bdd= PDOFactory::getPostgresConnexion();

if (isset($_POST['num_salle'])&&isset($_POST['campus'])&&isset($_POST['situation'])&&isset($_POST['effectif'])&& $_SESSION['type']=='administrateur'){
   extract($_POST);
    $salle = new salles(['num_salle'=>$num_salle,'code_campus'=>$campus,'situation'=>$situation,'effectif'=>intval($effectif)]);
    $salleManager = new SalleManager($bdd);
    try{
        $salleManager->add($salle);
        echo "<script> alertMsg('success','Salles Bien ajoutée ');</script>";    }
        catch (PDOException $e){
            echo "<script> alertMsg('danger','echec d\'ajout de la salle');</script>";
    }

}
?>