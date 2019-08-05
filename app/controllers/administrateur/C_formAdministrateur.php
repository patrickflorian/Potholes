<?php


/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 08/06/2017
 * Time: 00:44
 */
include_once "lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion();
$adminManager = new AdministrateurManager($bdd);
$adresseManager = new AdresseManager($bdd);

$adress;
$admin;
$id_img ;
$compte = new Compte(array());
if (isset($_POST['nom-admin']) && isset($_POST['prenom-admin']) && isset($_POST['sexe-admin']) && isset($_POST['dob-admin'])&& isset($_POST['cni-admin'])
    && isset($_POST['tel-admin']) && isset($_POST['email-admin']) && isset($_POST['ville-admin']) && isset($_POST['region-admin']) && isset($_POST['quartier-admin'])
)
{
    include "../../controllers/photo/addImage.php";

    $code_admin = $adminManager->newMatricule();
    $nom_admin = $_POST['nom-admin'];
    $prenom_admin = $_POST['prenom-admin'];
    $sexe_admin = $_POST['sexe-admin'];
    $dob_admin = $_POST['dob-admin'];
    $cni_admin =$_POST['cni-admin'];
    $tel_admin = $_POST['tel-admin'];
    $email_admin = $_POST['email-admin'];
    $ville_admin =$_POST['ville-admin'];
    $region_admin = $_POST['region-admin'];
    $quartier_admin = $_POST['quartier-admin'];

    $adress = new Adresse(array('code_adresse'=>intval($adresseManager->count()+1),'id_img'=>$id_img,'ville' => $ville_admin, 'quartier' => $quartier_admin, 'region' => $region_admin, 'num_tel' =>intval($tel_admin) , 'email' => $email_admin));
    $adresseManager->add($adress);


    $compte->setLogin($code_admin);
    $compte->setPassword($code_admin);
    $compte->setType("administrateur");
    $comptManager= new CompteManager($bdd);
    $comptManager->add($compte);

    if (isset($_POST['nom-admin']) && isset($_POST['prenom-admin']) && isset($_POST['sexe-admin']) && isset($_POST['dob-admin']) && isset($_POST['qualite']) && isset($_POST['cni-admin'])) {
        $admin = new Administrateur([
            'code_admin' => $code_admin,
            'login' => $code_admin,
            'code_adresse' => $adress->getCodeAdresse(),
            'id_img' => $id_img,
            'nom' => $nom_admin,
            'prenom' => $prenom_admin,
            'cni' => $cni_admin,
            'sexe' => $sexe_admin,
            'dob' => $dob_admin,
            'qualite' => $qualite
        ]);
        $adminManager->add($admin);
    }

}
if (isset($_POST['num-admin'])&&isset($_POST['nom-admin']) && isset($_POST['prenom-admin']) && isset($_POST['sexe-admin']) && isset($_POST['dob-admin'])&& isset($_POST['cni-admin'])
    && isset($_POST['tel-admin']) && isset($_POST['email-admin']) && isset($_POST['ville-admin']) && isset($_POST['region-admin']) && isset($_POST['quartier-admin'])
)
{

    $code_admin = $_POST['num-admin'];
    $nom_admin = $_POST['nom-admin'];
    $prenom_admin = $_POST['prenom-admin'];
    $sexe_admin = $_POST['sexe-admin'];
    $dob_admin = $_POST['dob-admin'];
    $cni_admin =$_POST['cni-admin'];
    $tel_admin = $_POST['tel-admin'];
    $email_admin = $_POST['tel-admin'];
    $ville_admin =$_POST['ville-admin'];
    $region_admin = $_POST['region-admin'];
    $quartier_admin = $_POST['quartier-admin'];



    $admin = $adminManager->getUnique($code_admin);

    $admin->hydrate(array(
        'id_img' => $id_img,
        'nom' => $nom_admin,
        'prenom' => $prenom_admin,
        'cni' => $cni_admin,
        'sexe' => $sexe_admin,
        'dob' => $dob_admin,
    ));


    $adress = new Adresse(array('code_adresse'=>$admin->getCODE_ADRESSE(),'ville' => $ville_admin, 'quartier' => $quartier_admin, 'region' => $region_admin, 'num_tel' =>intval($tel_admin) , 'email' => $email_admin));
    $adresseManager->update($adress);


    if (isset($_POST['nom-admin']) && isset($_POST['prenom-admin']) && isset($_POST['sexe-admin']) && isset($_POST['dob-admin']) && isset($_POST['qualite']) && isset($_POST['cni-admin'])) {

        $adminManager->update($admin);
    }

}