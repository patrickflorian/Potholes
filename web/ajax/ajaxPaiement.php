<input type="hidden" name="eleve" id="eleve" value="<?php echo $_GET['e']; ?>">

<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 27/06/2017
 * Time: 13:14
 */
include_once "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion();

$passeManager = new PasseManager($bdd);
$studentManager = new EleveManager($bdd);
$filiereManager = new FiliereManager($bdd);

if(isset($_GET['e'])&&isset($_GET['m'])){
    $filiere = $passeManager->getFiliereByEleve($_GET['e']);
    $solde = intval($_GET['m']);
    $passe =$passeManager->getFraisByEleve($_GET['e'],$filiere->getCodeFiliere());
    $passe->setSolde($solde + $passe->getSolde());
    if ($passe->getSolde()>=$filiereManager->montant($filiere->getCodeFiliere())){
        $passe->setEtat(TRUE);
    }
    try{
        $passeManager->update($passe);
        echo '1';
    }catch (Exception $e){
        echo "<script>alertMsg('danger','Paiement non effectué ');</script>";
    }

}


$passeManager = new PasseManager($bdd);
$trancheManager = new TrancheManager($bdd);
if (isset($_GET['el'])){
    $filiere = $passeManager->getFiliereByEleve($_GET['el']);
    $passe = $passeManager->getFraisByEleve($_GET['el'],strtok($filiere->getCodeFiliere(),' '));
    $tranche= $trancheManager->getList($filiere->getCodeFiliere());
    $t=$trancheManager->Count($filiere->getCodeFiliere());
    ?>
    <input type="hidden" name="eleve" id="eleve" value="<?php echo $_GET['el']; ?>">
    <table class="table table-striped table-responsive table-bordered">
        <thead>
        <tr>
            <th>Tranches</th>
            <th>Montant</th>
            <th>Montant Versé</th>
            <th>Montant restant</th>
            <th>Nouveau Versement</th>
        </tr>
        </thead>
        <tbody id="tranche-list">



        <?php
        echo '
        <tr>
            <td><label></label></td>
            <td ><label></label></td>
            <td><label></label></td>
            <td><label></label></td>
            <td  id="paiement">';
        if($passe->getEtat()==0) {
            ?>
            <button class="text-center" onclick="editPaiement();"><i class="glyphicon glyphicon-transfer"> nouveau versement</i></button>
            <br>
            <a class="btn btn-warning" href="?q=app/views/paiement/echeancier&el="<?php echo $_GET['el']?>>echeancier</a>

            <?php
        }echo'</td>';
        echo'</tr>
        ';

        $solde= $passe->getSolde();
        foreach ($tranche as $item){
            $res;
            $ver;
            $m=$item->getValeur();
            $t1 = $solde-$m;
            if($t1<0){
                $ver = $solde;
                $res =$t1;
                $solde =0;
            }else{
                $solde = $t1;
                $ver = $m;
                $res =0;
            }
            ?>
            <tr class="<?php if ($res==0)echo 'success' ;?>">
                <td><label><?php echo $item->getCode();?></label></td>
                <td class="warning" ><label><?php echo $m;?></label><i class="glyphicon glyphicon-usd"></i></td>
                <td class="<?php if ($ver==$m)echo 'success' ;else{if($ver>0)echo 'warning'; else echo 'danger';} ?>"><label><?php echo $ver;?></label><i class="glyphicon glyphicon-usd"></i></td>
                <td class="<?php if ($res==0)echo 'success' ;else echo 'label-danger';?>"> <label><?php echo $res;?></label><i class="glyphicon glyphicon-usd"></i></td>
                <td></td>
            </tr>

            <?php
            $t--;
        }
        ?></tbody>
        <caption class="text-center text-muted bg-primary">   <i class="glyphicon glyphicon-list"> </i>
            Paiements  de <?php $e=$studentManager->getUnique($_GET['el']);echo $e->getNom().' ///  '.$e->getNumEleve();?>
        </caption>
    </table>
    <?php
}

if(isset($_GET['solve'])&&isset($_GET['formation'])&&isset($_GET['annee'])&&!empty($_GET['formation'])&&!empty($_GET['annee'])){
    extract($_GET);
    $wait =$trancheManager->getSum($formation);
    $listEleve =$studentManager->getList($formation,$annee);
    ?>
    <input type="hidden" name="eleve" id="eleve" value="<?php echo $_GET['el']; ?>">
    <table class="table table-striped table-responsive table-bordered">
    <thead>
    <tr>
        <th>Tranches</th>
        <th>Montant</th>
        <th>Montant Versé</th>
        <th>Montant restant</th>
        <th class="hidden-print">Etat de Versement</th>
    </tr>
    </thead>
    <tbody id="tranche-list">
    <?php
    if(!empty($listEleve)){


        foreach ($listEleve as $item){

            $have = $passeManager->getStudentSolde($annee,$formation,$item->getNumEleve());
            if($have==null) {$have=0;}
            echo "<script>alert(". $wait.") </script>";
            echo $have;
            $res = $wait-$have;
            ?>
            <tr class="<?php if ($res==0)echo 'success' ;?>">
                <td><span><?php echo $item->getNom().' '.$item->getPrenom();?></span></td>
                <td class="warning" ><span><?php echo $wait;?></span><i class="glyphicon glyphicon-usd"></i></td>
                <td class="<?php if ($have==$wait)echo 'success' ;else{if($have>0)echo 'warning'; else echo 'danger';} ?>"><span><?php echo $have;?></span><i class="glyphicon glyphicon-usd"></i></td>
                <td class="<?php if ($res==0)echo 'success' ;else echo 'label-danger';?>"> <span><?php echo $res;?></span><i class="glyphicon glyphicon-usd"></i></td>
                <td class="hidden-print"><a class="btn btn-warning btn-sm" href="?q=app/views/paiement/formPaiement&el=<?php echo $item->getNumEleve();?>">view</a></td>
                <td class="hidden-print"><a class="btn btn-default btn-sm" href="?q=app/views/paiement/echeancier&el=<?php echo $item->getNumEleve();?>">echeancier</a></td>
            </tr>


            <?php

        }
    }
   ?>
    </tbody>
        <caption class="text-center text-muted " style="">   <i class="glyphicon glyphicon-usd"> </i>
            Fiche de solvabilité <button class="btn btn-sm hidden-print" onclick="print();"><i class="glyphicon glyphicon-print right"></i></button>
        </caption>
    </table>
    <?php
}