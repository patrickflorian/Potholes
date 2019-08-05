<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 07/06/2017
 * Time: 22:18
 */
include "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion() ;

    $formation = new FiliereManager($bdd);


    ///get optionlist of formations
if(isset($_GET['optionlist'])&&isset($_GET['type']) ) {
    $list = [];
    $list = $formation->getList($_GET['type']);
    echo '
        <optgroup label="choose a formation please">
            <option value selected></option>
        
    ';
    foreach ($list as $item) {
        $codefiliere = $item->CODE_FILIERE;
        $libelle = $item->libelle;
        $information =htmlentities($item->information);
        echo '
            <option value="'.strtok($codefiliere,' ').'" title="'.$information.'">'.$libelle.'</option>
        ';
    }
    echo '</optgroup>';

}
if (isset($_GET['id'])){
    $item = $formation->getUnique($_GET['id']);
    if (!empty($item)) {
        echo '  <h2>' . $item->libelle . '</h2>
             <p >' . htmlentities($item->information) . '</p>
             <p><a class="btn btn-default" href="#">Learn more</a></p>';
    }
    $trancheManager = new TrancheManager($bdd);
    $list;
    $i=1;
    try{
        $list= $trancheManager->getList($_GET['id']);


            echo '<table class="table table-striped table-bordered">
                       <thead>
                       <tr>
                           <th>TRANCHE</th>
                           <th>valeur</th>
                       </tr>
                       </thead>
                       <tbody id="tranche-list">';
            if (empty($list)) {

                echo '<tr> <td><label>no more information on paiements</label></td></tr>';
            } else {
                foreach ($list as $item) {
                    ?>
                    <tr>
                        <td class="success"><label for="tranche"><?php echo 'Tranche ' . $i;
                                $i++; ?> </label></td>
                        <td><label><?php echo $item->getValeur(); ?> </label></td>
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

}
