<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 17/06/2017
 * Time: 00:20
 */

include_once "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion() ;

$manager = new AnneeScolaireManager($bdd);

    $listAnnee = $manager->getList();
    ?><optgroup label="annee scolaire">
    <option value selected></option>
    <?php
    foreach ($listAnnee AS $item ){
        ?>
        <option value="<?php echo $item->getAnnee();?>" <?php if($item->getAnnee()==date('Y')){ echo 'selected';}?>  ><?php echo $item->getAnnee(); ?></option>

        <?php
    }
?>





