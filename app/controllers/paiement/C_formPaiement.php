<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:36
 */
$passeManager = new PasseManager($bdd);
$trancheManager = new TrancheManager($bdd);
if (isset($_GET['el'])){
    $filiere = $passeManager->getFiliereByEleve($_GET['el']);
    $passe = $passeManager->getFraisByEleve($_GET['el'],strtok($filiere->getCodeFiliere(),' '));
    $tranche= $trancheManager->getList($filiere->getCodeFiliere());
    $t=$trancheManager->Count($filiere->getCodeFiliere());
    ?>

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
            <td rowspan="'.($t+1).'" id="paiement">';
    if($passe->getEtat()==0) {
        ?>
        <button class="text-center" onclick="editPaiement();"><i class="glyphicon glyphicon-transfer"> nouveau versement</i></button>
        <br>
        <a class="btn btn-warning" href="?q=app/views/paiement/echeancier&el=<?php echo $_GET['el'];?>">echeancier</a></td>
        <?php
    }
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
        <tr>
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
                     Paiements  de <?php $e=$eleveManager->getUnique($_GET['el']);echo $e->getNom().' --- '.$e->getNumEleve();?>
                   </caption>
               </table>';
<?php
}