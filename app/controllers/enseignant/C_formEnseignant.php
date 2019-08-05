<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:32
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 08/06/2017
 * Time: 00:44
 */
//include "/lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion();
$ensManager = new EnseignantManager($bdd);
$adresseManager = new AdresseManager($bdd);

include "app/controllers/photo/addImage.php";
$adress;
$ens;
$id_img ;
$compte = new Compte(array());
if (isset($_POST['nom-ens']) && isset($_POST['prenom-ens']) && isset($_POST['sexe-ens']) && isset($_POST['dob-ens'])&& isset($_POST['cni-ens'])
    && isset($_POST['tel-ens']) && isset($_POST['email-ens']) && isset($_POST['ville-ens']) && isset($_POST['region-ens']) && isset($_POST['quartier-ens'])
    && isset($_POST['qualite']))
{

    $num_ens = $ensManager->newMatricule();
    $nom_ens = $_POST['nom-ens'];
    $prenom_ens = $_POST['prenom-ens'];
    $sexe_ens = $_POST['sexe-ens'];
    $dob_ens = $_POST['dob-ens'];
    $cni_ens =$_POST['cni-ens'];
    $tel_ens = $_POST['tel-ens'];
    $email_ens = $_POST['email-ens'];
    $ville_ens =$_POST['ville-ens'];
    $region_ens = $_POST['region-ens'];
    $quartier_ens = $_POST['quartier-ens'];
    $qualite = $_POST['qualite'];

    $adress = new Adresse(array('code_adresse'=>intval($adresseManager->count()+1),'id_img'=>$id_img,'ville' => $ville_ens, 'quartier' => $quartier_ens, 'region' => $region_ens, 'num_tel' =>intval($tel_ens) , 'email' => $email_ens));
    $adresseManager->add($adress);


    $compte->setLogin($num_ens);
    $compte->setPassword($num_ens);
    $compte->setType("enseignant");
    $comptManager= new CompteManager($bdd);
    $comptManager->add($compte);

    if (isset($_POST['nom-ens']) && isset($_POST['prenom-ens']) && isset($_POST['sexe-ens']) && isset($_POST['dob-ens']) && isset($_POST['qualite']) && isset($_POST['cni-ens'])) {
        $ens = new enseignant([
            'num_enseignant' => $num_ens,
            'login' => $num_ens,
            'code_adresse' => $adress->getCodeAdresse(),
            'id_img' => $id_img,
            'nom' => $nom_ens,
            'prenom' => $prenom_ens,
            'cni' => $cni_ens,
            'sexe' => $sexe_ens,
            'dob' => $dob_ens,
            'qualite' => $qualite
        ]);
        $ensManager->add($ens);
    }

}
if (isset($_POST['num_ens'])&&isset($_POST['nom-ens']) && isset($_POST['prenom-ens']) && isset($_POST['sexe-ens']) && isset($_POST['dob-ens'])&& isset($_POST['cni-ens'])
    && isset($_POST['tel-ens']) && isset($_POST['email-ens']) && isset($_POST['ville-ens']) && isset($_POST['region-ens']) && isset($_POST['quartier-ens'])
    && isset($_POST['qualite']))
{

    $num_ens = $_POST['num-ens'];
    $nom_ens = $_POST['nom-ens'];
    $prenom_ens = $_POST['prenom-ens'];
    $sexe_ens = $_POST['sexe-ens'];
    $dob_ens = $_POST['dob-ens'];
    $cni_ens =$_POST['cni-ens'];
    $tel_ens = $_POST['tel-ens'];
    $email_ens = $_POST['email-ens'];
    $ville_ens =$_POST['ville-ens'];
    $region_ens = $_POST['region-ens'];
    $quartier_ens = $_POST['quartier-ens'];
    $qualite = $_POST['qualite'];

    $ens = $ensManager->getUnique($num_ens);

    $ens->hydrate(array(
        'id_img' => $id_img,
        'nom' => $nom_ens,
        'prenom' => $prenom_ens,
        'cni' => $cni_ens,
        'sexe' => $sexe_ens,
        'dob' => $dob_ens,
        'qualite' => $qualite
    ));


    $adress = new Adresse(array('code_adresse'=>$ens->getCODE_ADRESSE(),'ville' => $ville_ens, 'quartier' => $quartier_ens, 'region' => $region_ens, 'num_tel' =>intval($tel_ens) , 'email' => $email_ens));
    $adresseManager->update($adress);

    if (isset($_POST['nom-ens']) && isset($_POST['prenom-ens']) && isset($_POST['sexe-ens']) && isset($_POST['dob-ens']) && isset($_POST['qualite']) && isset($_POST['cni-ens'])) {
        $ensManager->update($ens);
    }

}