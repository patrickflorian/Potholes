<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 16/06/2017
 * Time: 10:33
 */

include "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion() ;

if(isset($_GET['code_filiere'])){
    $trancheManager = new TrancheManager($bdd);
    $list;
    $i=1;
    try{
       $list= $trancheManager->getList($_GET['code_filiere']);

        echo'<table class="table table-striped table-bordered">
                   <thead>
                   <tr>
                       <th>TRANCHE</th>
                       <th>valeur</th>
                   </tr>
                   </thead>
                   <tbody id="tranche-list">';
        if(empty($list)){

            echo '<tr> <td><label>no more information on paiements</label></td></tr>';
        }
        else{
        foreach ($list as $item) {
               ?>
                   <tr>
                       <td class="success"><label for="tranche" ><?php echo  'Tranche '.$i; $i++; ?> </label></td>
                       <td> <label><?php echo  $item->getValeur(); ?> </label></td>
                   </tr>

               <?php
        }
               echo ' </tbody>
                   <caption class="text-center text-muted bg-primary">Tranches de Paiement des frais de
                       formation
                   </caption>
               </table>';
           }

           }catch(Exception $e) {
        echo "tres grosse erreus" . $e->getMessage();
    }


}?>