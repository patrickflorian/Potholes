<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 20/06/2017
 * Time: 13:59
 */
try{
    include_once "../../lib/autoload.php";
    $bdd = PDOFactory::getPostgresConnexion() ;
    $ensManager = new EnseignantManager($bdd);
    $adresseManager = new AdresseManager($bdd);
    $photoManager = new PhotoManager($bdd);

}catch (Exception $e){

}
if(isset($_GET['optionlist'])) {
    $list = $ensManager->getAll();
    echo'<optgroup label="choisir enseignant">';

    if (empty( $list )) {

        echo/**@lang  HTML*/ '<option value=""></option> ';
    } else {
        foreach ($list as $item) {
            ?>
            <option value="<?php echo $item->getNumEnseignant(); ?> "><?php echo $item->getNom() . ' ' . $item->getPrenom(); ?> </option>
            <?php
        }
        echo '</optgroup>';

    }
}
if(isset($_GET['list'])&& !empty($_GET['list']) && isset($_GET['annee'])&&!empty($_GET['annee']) && isset($_GET['matiere'])&&!empty($_GET['matiere'])) {
    $list = $ensManager->getList( strtok( $_GET['list'], ' ' ), $_GET['annee'] ,$_GET['matiere']);


    echo '                   <i class="glyphicon glyphicon-refresh" onclick="getListEnseignant();"></i>
<table class="table table-striped table-bordered">
                   <thead>
                   <tr>
                       <th>Matricule Apprenant</th>
                       <th>Noms et Prenoms</th>
                       <th>Sexe</th>
                       <th>Date de Naissance</th>
                       <th>CNI</th>
                       <th>QUALITE</th>
                       <th>Photo</th>
                       <th>Modifier</th>
                       <th>plus d\'infos</th>
                   </tr>
                   </thead>
                   <tbody id="tranche-list">';

    if (empty( $list )) {

        echo '<tr> <td><label>Aucun Apprenant enrollé cette année pour cette Formation</label></td></tr>';
    } else {
        foreach ($list as $item) {
            ?>
            <tr>
                <td><label for="tranche"><?php echo $item->getNumEnseignant(); ?> </label></td>
                <td><label><?php echo $item->getNom() . ' ' . $item->getPrenom(); ?> </label></td>
                <td><label><?php echo $item->getSexe(); ?> </label></td>
                <td><label><?php echo $item->getDob(); ?> </label></td>
                <td><label><?php echo $item->getCNI(); ?> </label>
                <td><label><?php echo $item->getQualite(); ?> </label></td>
                <td><label><img class="profile-img-card img-responsive" src="app/controllers/photo/image.php?id=<?php if ($item->getID_IMG() != '') {
                            echo strtok( $item->getID_IMG(), ' ' );
                        } else {
                            echo 0;
                        } ?>"/> </label></td>
                <td>
                    <a href="index.php?q=app/views/enseignant/formEnseignant&alter=<?php echo $item->getNumEnseignant(); ?>" class="btn red"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td>
                    <a class="btn yellow "><i class="glyphicon glyphicon-plus"></i></a>
                </td>
            </tr>
            <?php
        }
        echo ' </tbody>
 
                   <caption class="text-center text-muted bg-primary"> <i class="glyphicon glyphicon-list">  </i>  
                   Liste ses Enseignant en ' . $_GET['list'] . '
                   </caption>
                   
               </table>';


    }
}


if (isset($_GET['ens'])&&!empty($_GET['ens'])) {
   $enseigne = new EnseigneManager($bdd);
    $listmatiere = $enseigne->getMatiereByEnseignant($_GET['ens']);
$matiereManager = new MatiereManager($bdd);
    echo '<table class="table table-striped table-bordered">
                   <thead>
                   <tr>
                       <th></th>
                       <th>Code Matiere</th>
                       <th>Libelle</th>
                       <th>Coef</th>
                       <th>Modifier</th>
                       <th>plus d\'infos</th>
                   </tr>
                   </thead>
                   <tbody id="matiere-list">';
    if (empty( $listmatiere )) {

        echo '<tr> <td><label>Aucune Matiere pour cette filiere</label></td></tr>';
    }
    foreach ($listmatiere AS $item) {
        try{ $ens = $matiereManager->getEnseignant( $item->getCodeMatiere() );
            ?>
            <tr>
                <td><input type="checkbox" name="<?php echo $item->getCodeMatiere();?>" checked class="checkbox-matiere"></td>
                <td><label><?php echo $item->getCodeMatiere(); ?></label></td>
                <td><label><?php echo $item->getLibelle(); ?></label></td>
                <td><label><?php echo $item->getCoefficient(); ?></label></td>
                <td>
                    <a href="index.php?q=app/views/administrateur/formMatiere&alter=<?php echo $item->getCodeMatiere(); ?>"
                       class="btn red"><i class="glyphicon glyphicon-refresh"></i></a>
                </td>
                <td>
                    <a class="btn yellow "><i class="glyphicon glyphicon-folder-open"></i></a>
                </td>
            </tr>
            <?php
        }catch (Exception $e){
            echo '<div class="text-danger" > RAS</div>';
        }


    }
}


if(isset($_GET['ens'])&&isset($_GET['mat'])){
    $enseigne = new EnseigneManager($bdd);
    try{
        $enseigne->add($_GET['ens'],$_GET['mat']);
        echo /** @lang HTML */"<script>alertMsg('success','enseignant affecter a cette matiere')</script>";

    }catch(Exception $e){
        echo /** @lang HTML */"<script>alertMsg('danger','impossible d affecter cet enseignant a cette matiere')</script>";
    }
}

?>
