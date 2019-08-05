<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:31
 */

if(!isset($_GET['update'])&&isset($_GET['code_matiere']) && isset($_GET['coef']) &&  isset($_GET['libelle']) && isset($_GET['formation'])){
    extract($_GET);

    $matiere = new matiere(['code_matiere'=>$code_matiere,'libelle'=>$libelle,'coef'=>intval($coef)]);
    $matiereManager = new MatiereManager($bdd);
    $dispenseManager  = new DispenseManager($bdd);
   try{

       $matiereManager->add($matiere);
       $dispenseManager->add($_GET['formation'],$code_matiere);
       echo"<script> alertMsg('success','Matiere : ". $code_matiere.' // '.$libelle." successfully added to matters' );</script>";
   }catch (Exception $e){
       echo"<script> alertMsg('danger','Matiere : ". $code_matiere.' // '.$libelle." already exists or can not be added to matters ');</script>";
   }
}


if(isset($_GET['update'])&&isset($_GET['code_matiere'])&&isset($_GET['libelle'])&&isset($_GET['coef'])){
    extract($_GET);

    $matiere = new matiere(['code_matiere'=>$_GET['code_matiere'],'libelle'=>$libelle,'coef'=>intval($coef)]);
    $matiereManager = new MatiereManager($bdd);
    try{
        $matiereManager->update($matiere);
        echo"<script> alertMsg('success','Matiere : ". $code_matiere.' // '.$libelle." successfully modified' );</script>";
    }catch (Exception $e){
        echo $e;
        echo"<script> alertMsg('danger','Matiere : ". $code_matiere.' // '.$libelle." this matter can not be modified ');</script>";
    }
}