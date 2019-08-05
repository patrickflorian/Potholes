<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:36
 */

if (isset($_GET['type'])&& isset($_GET['formation'])&& isset($_GET['annee'])){
    extract($_GET);
    $pct=0;
    $evaluation = new EvaluationManager($bdd);
    $matiereManager = new DispenseManager($bdd);
    $emploiManager = new EmploiDuTempsManager($bdd);
    $formationMan= new FiliereManager($bdd);
    if(!empty($type)&&!empty($formation) ){
        if ($type=='final'){ $pct = 100; }

    $eval = new EVALUATION(['type'=>$type,'pourcentage'=>$pct,'date'=>$annee.'/01/01','pourcentage'=>$pct]);
$exit = FALSE;
$list = $evaluation->getEvalByYear($annee.'/01/01');

        try{
        $evaluation->add($eval);
            echo/**@lang HTML */ "<script> alertMsg('success','evaluation lancée avec success');</script>";
        }catch(Exception $e){
            echo/**@lang HTML */ "<script> alertMsg('danger','echec d\'enregistrement de l\'evaluation');</script>";
        }

        $listMatiere = $matiereManager->getMatiereByFiliere($formation);
        foreach ($listMatiere as $item){
            $code =strtok($item->getCodeMatiere(),' ');
            echo $code;
                    if(isset($_GET[$code])){
                    $emploiManager->add(new emploi_du_temps(array('num_eval'=>$eval->getNumEval(),'code_matiere'=>$item->getCodeMatiere())));
                    echo /** @lang HTML */ "<script >alert('matiere');</script>";
            }
        }
        echo  '<script>alert("success");</script>';

    }

}

?>