<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 08/06/2017
 * Time: 00:44
 */
include "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion() ;
$eleveManager = new EleveManager($bdd);
$adresseManager = new AdresseManager($bdd);
$parentManager  = new ParentManager($bdd);
$photoManager = new PhotoManager($bdd);



    if (isset($_FILES['photo-eleve'])) {

        $ret = false;
        $img_blob = '';
        $img_taille = 0;
        $img_type = '';
        $img_nom = '';
        $taille_max = 250000;
        $ret = is_uploaded_file($_FILES['photo-eleve']['tmp_name']);

        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['photo-eleve']['size'];

            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['photo-eleve']['type'];
            $img_nom = $_FILES['photo-eleve']['name'];
            $img_blob = file_get_contents($_FILES['photo-eleve']['tmp_name']);
            $req = "INSERT INTO photo(nom_img, taille_img, type_img, blob_img) VALUES ($img_nom,$img_taille,$img_type,"."'" . addslashes($img_blob) . "') ";
            // N'oublions pas d'échapper le contenu binaire
          $bdd->exec($req) ;
            return true;
        }
    }


if(isset($_GET['nom'])&&isset($_GET['prenom'])&&isset($_GET['sexe'])&&isset($_GET['dob'])&&isset($_GET['lieu'])&&isset($_GET['niveau'])&&isset($_GET['groupe'])&&isset($_GET['rhesus'])&&isset($_GET['status'])&&isset($_GET['cni'])&&isset($_GET['tel'])&&isset($_GET['email'])&&isset($_GET['ville'])&&isset($_GET['region'])&&isset($_GET['quartier'])
&&isset($_GET['nom_parent'])&&isset($_GET['prof_parent'])&&isset($_GET['tel_parent'])&&isset($_GET['email_parent'])&&isset($_GET['code_filiere'])){
    $adress;
    $eleve;
    $parent;
    $photo;
    $num_eleve = $eleveManager->newMatricule();
    extract($_GET);

    if(isset($_GET['tel'])&&isset($_GET['email'])&&isset($_GET['ville'])&&isset($_GET['region'])&&isset($_GET['quartier'])){
        $adress = new Adresse(array('ville'=> $ville,'quartier'=>$quartier,'region'=>$region,'num_tel'=>$tel,'email'=>$email));
        $adress= $adresseManager->add($adress);
    }


    if(isset($_GET['nom'])&&isset($_GET['prenom'])&&isset($_GET['sexe'])&&isset($_GET['dob'])&&isset($_GET['lieu'])&&isset($_GET['niveau'])&&isset($_GET['groupe'])&&isset($_GET['rhesus'])&&isset($_GET['status'])&&isset($_GET['cni'])){
        $el = new Eleve(array(
           'num_eleve'=>$num_eleve,
            'code_adresse'=>$adress->getCodeAdresse(),
            'login'=>$num_eleve,
            'id_img'=>$photo->getgetID_IMG(),
            'nom'=>$nom,
            'prenom'=>$prenom,
            'sexe'=>$sexe,
            'dob'=>$dob,
            'lieu'=>$lieu,
            'niveau'=>$niveau,
            'groupe'=>$groupe,
            'rhesus'=>$rhesus,
            'status'=>$status,
            'cni'=>$cni
        ));
        $eleveManager->add($el);
    }
    if (isset($_GET['nom_parent'])&&isset($_GET['prof_parent'])&&isset($_GET['tel_parent'])&&isset($_GET['email_parent'])&&isset($_GET['cni_parent'])){
        $parent = new Parents(array(
            'num_eleve'=>$num_eleve,
            'nom'=>$nom_parent,
            'profession'=>$prof_parent,
            'num_tel'=>$tel_parent,
            'email'=>$email_parent,
            'cni'=>$cni_parent,
            ));
        $parent = $parentManager->add($parent);
    }
}

if(isset($_GET['list'])&& !empty($_GET['list']) && isset($_GET['annee'])&&!empty($_GET['annee'])) {
    $list = $eleveManager->getList( strtok( $_GET['list'], ' ' ), $_GET['annee'] );
    ?>
    <table class="table table-striped  table-responsive  text-darken-3 table-bordered">
                   <thead>
                   <tr>
                       <th>Matricule</th>
                       <th>Noms et Prenoms</th>
                      <?php   if (!isset($_GET['paiement'])){  ?> <th>Sexe</th>
                       <th>Date de Naissance</th>
                       <th>lieu de naissance</th>
                       <th>CNI</th>
                       <th>Photo</th>
                       <th>Modifier</th>
                       <th>plus d\'infos</th>
                       <th> Paiements </th>
                       <?php }
                       else{
                             echo '<th>Paiements</th>';
                       }?>
                   </tr>
                   </thead>
                   <tbody id="tranche-list">';
<?php
    if (empty( $list )) {

        echo '<tr> <td><label>Aucun Apprenant enrollé cette année pour cette Formation</label></td></tr>';
    } else {
        foreach ($list as $item) {
            ?>
            <tr>
                <td><span for="tranche"><?php echo $item->getNumEleve(); ?> </span></td>
                <td><span><?php echo $item->getNom() . ' ' . $item->getPrenom(); ?> </span></td>
         <?php   if (!isset($_GET['paiement'])){ ?>

                <td><span><?php  echo $item->getSexe(); ?> </span></td>
                <td><span><?php echo $item->getDob(); ?> </span></td>
                <td><span><?php echo $item->getLieu(); ?> </span></td>
                <td><span><?php echo $item->getCNI(); ?> </span></td>
                <td><span><img class="profile-img-card img-responsive" src="app/controllers/photo/image.php?id=
                <?php if ($item->getID_IMG() != '') {
                            echo strtok( $item->getID_IMG(), ' ' );
                        } else {
                            echo 0;
                        } ?>"/> </span></td>
                <td>
                    <a href="index.php?q=app/views/apprenant/formApprenant&alter=<?php echo $item->getNumEleve(); ?>" class="btn red"><i class="glyphicon glyphicon-minus"></i></a>
                </td>
                <td>
                    <a class="btn btn-success " href="?q=app/views/apprenant/index&e=<?php echo $item->getNumEleve(); ?>">Fiche inscription<i class="glyphicon glyphicon-plus"></i></a>
                </td>
             <?php   echo'<td>
                    <a class="btn btn-default " href ="?q=app/views/paiement/echeancier&el='.$item->getNumEleve().'">echeancier</a>
                </td>';?>
            </tr>
            <?php }else{
                
               echo'<td>
                    <a class="btn yellow " href ="?q=app/views/paiement/formPaiement&el='.$item->getNumEleve().'"><i class="glyphicon glyphicon-transfer"></i></a>
                </td>';
           
            }
        }

            echo ' </tbody>
                   <caption class="text-center text-muted bg-primary">   <i class="glyphicon glyphicon-list"> </i>
                     Liste ses Apprenants en ' . $_GET['list'] . '
                   </caption>
               </table>';
    }
}
if(isset($_GET['changelist'])&& !empty($_GET['changelist']) && isset($_GET['annee'])&&!empty($_GET['annee'])) {
    $list = $eleveManager->getList( strtok( $_GET['changelist'], ' ' ), $_GET['annee'] );
    $passeManager = new PasseManager($bdd);
    ?>
    <table class="table table-striped  table-responsive  text-darken-3 table-bordered">
                   <thead>
                   <tr>
                       <th>Matricule</th>
                       <th>Noms et Prenoms</th>
                       <th>Photo</th>
                       <th>Filiere</th>
                       <th>modifier</th>
                   </tr>
                   </thead>
                   <tbody id="change-list">';
<?php
    if (empty( $list )) {

        echo '<tr> <td><span>Aucun Apprenant enrollé cette année pour cette Formation</span></td></tr>';
    } else {
        foreach ($list as $item) {
                $filiere = $passeManager->getFiliereByEleve($item->getNumEleve());
            ?>
            <tr>
                <td class="success"><span for="tranche"><?php echo $item->getNumEleve(); ?> </span></td>
                <td><span><?php echo $item->getNom() . ' ' . $item->getPrenom(); ?> </span></td>
                <td><span><img class="profile-img-card img-responsive" src="app/controllers/photo/image.php?id=
                <?php if ($item->getID_IMG() != '') {
                            echo strtok( $item->getID_IMG(), ' ' );
                        } else {
                            echo 0;
                        } ?>"/> </span></td>
                <td>
                    <span ><?php echo $filiere->getLibelle(); ?> </span>
                </td>
                <td id='modif'>
                    <a class="btn" href="?q=app/views/apprenant/modifier_apprenant&e=<?php echo $item->getNumEleve();?>" ><i class="glyphicon glyphicon-edit"></i></a>
                </td>
            
            <?php 
        }

            echo ' </tbody>
                   <caption class="text-center text-muted bg-primary">   <i class="glyphicon glyphicon-list"> </i>
                     Liste ses Apprenants en ' . $_GET['changelist'] . '
                   </caption>
               </table>';
    }
}

