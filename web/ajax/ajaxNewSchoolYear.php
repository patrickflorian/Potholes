<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 28/06/2017
 * Time: 09:29
 */

include_once "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion();
$anneeManager = new AnneeScolaireManager($bdd);

if(isset($_GET['year'])&&$_GET['year']=='new'){
    $annee = intval($anneeManager->getCurrentYear());
    try{
        $anneeManager->add(new AnneeScolaire(['annee'=>($annee+1),'cloture'=>'FALSE']));
        echo "<script> alertMsg('success','successfully switch to new  School Year');</script>";

    }catch (Exception $e){
        echo $e->getMessage();
        echo "<script> alertMsg('danger','failed switch to new School Year');</script>";
    }
}
if(isset($_GET['year'])&&$_GET['year']=='cloture'){
    $annee = intval($anneeManager->getCurrentYear());
    try{
        $anneeManager->update(new AnneeScolaire(['annee'=>$annee,'cloture'=>TRUE]));
        echo "<script> alertMsg('success','successfully cloture this  School Year');</script>";
    }catch (Exception $e){
        echo $e->getMessage();
        echo "<script> alertMsg('danger','failed cloture this School Year');</script>";
    }
}