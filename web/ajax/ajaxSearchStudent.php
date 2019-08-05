
<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 25/06/2017
 * Time: 15:17
 */
include_once "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion();

if(isset($_GET['critere'])&& isset($_GET['val'])){
    $req="select *from eleve ";
    extract($_GET);

    if(empty($_GET['val'])||($critere=='mat')){
        $req.="WHERE eleve.num_eleve LIKE '%$val%'";
    }
    if($critere=='name'){
        $req.="WHERE nom LIKE '%$val%' OR prenom LIKE '%$val%'";
    }

    if($critere=='filiere'){
        $req="select e.* from eleve e ,passe WHERE e.num_eleve=passe.num_eleve AND passe.code_filiere='$val'";
    }

    $req.=' order by num_eleve';
    try{
        $list= array();
        $q=$bdd->query($req);
        while ($eleve=$q->fetch(PDO::FETCH_ASSOC)){
            $list[]=new Eleve($eleve);
        }
        echo '<table class="table table-striped table-bordered">
                   <thead>
                   <tr>
                       <th>Matricule Apprenant</th>
                       <th>Noms et Prenoms</th>
                       <th>Sexe</th>
                       <th>Date de Naissance</th>
                       <th>lieu de naissance</th>
                       <th>CNI</th>
                       <th>Photo</th>
                       <th>Modifier</th>
                       <th>Afficher</th>
                   </tr>
                   </thead>
                   <tbody id="tranche-list">';

        if (empty( $list )) {
            echo"<script> alertMsg('warning','veuillez essayer avec des cacracteres Majuscules ');</script>";

            echo '<tr> <td><label>Aucun Apprenant trouvé</label></td></tr>';
        } else {
            foreach ($list as $item) {
                ?>
                <tr>
                    <td class="success"><label for="tranche"><?php echo $item->getNumEleve(); ?> </label></td>
                    <td><label><?php echo $item->getNom() . ' ' . $item->getPrenom(); ?> </label></td>
                    <td><label><?php echo $item->getSexe(); ?> </label></td>
                    <td><label><?php echo $item->getDob(); ?> </label></td>
                    <td><label><?php echo $item->getLieu(); ?> </label></td>
                    <td><label><?php echo $item->getCNI(); ?> </label></td>
                    <td><label><img class="profile-img-card img-responsive"
                                    src="app/controllers/photo/image.php?id=<?php if ($item->getID_IMG() != '') {
                                        echo strtok( $item->getID_IMG(), ' ' );
                                    } else {
                                        echo 0;
                                    } ?>"/> </label></td>
                    <td>
                        <a href="index.php?q=app/views/apprenant/formApprenant&alter=<?php echo $item->getNumEleve(); ?>"
                           class="btn red"><i class="glyphicon glyphicon-minus"></i></a>
                    </td>
                    <td>
                        <a class="btn yellow "><i class="glyphicon glyphicon-plus"></i></a>
                    </td>
                </tr>
                <?php
            }
            echo ' </tbody>
                   <caption class="text-center text-muted bg-primary">   <i class="glyphicon glyphicon-list"> </i>
                     Liste ses Apprenants 
                   </caption>
               </table>';

        }
    }catch (Exception $e){
        echo"<script> alertMsg('danger','veuillez entrer des informations correctes');</script>";
    }
}?>