<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 28/06/2017
 * Time: 13:34
 */
$compteManager = new CompteManager($bdd);
if(isset($_GET['login'])&&isset($_GET['pwd'])&&isset($_GET['type'])){
    extract($_GET);
    try{
        $compteManager->add(new Compte(['login'=>$login,'password'=>$pwd,'type'=>$type]));
        echo "<script>alertMsg('success','Compte d\'utilisateur bien enregistré');</script>";
    }catch (Exception $e){
        echo "<script>alertMsg('danger','Echec d\'enregistrement du compte utilisateur');</script>";
    }

}