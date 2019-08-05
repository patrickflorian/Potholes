<?php
$eleveManager = new EleveManager($bdd);
$adresseManager = new AdresseManager($bdd);
$parentManager = new ParentManager($bdd);
$passeManager = new PasseManager($bdd);
$id_img=0;
$eleve = new Eleve([]);
$parent = new Parents([]);
$compte = new Compte(array());
$adress = new Adresse(array());
$comptManager= new CompteManager($bdd);
$passe = new Passe(array());
if (!isset($_POST['num_eleve'])&& isset($_POST['nom']) && isset($_POST['formation']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) && isset($_POST['tel'])
    && isset($_POST['nom_parent']) && isset($_POST['prof_parent']) && isset($_POST['cni_parent'])&& isset($_POST['tel_parent']))
{

    $num_eleve = $eleveManager->newMatricule();
    extract($_POST);

    include "app/controllers/photo/addImage.php";
    $adress->setNum_Tel($tel);
    if(!empty($_POST['region'])) $adress->setRegion($region);
    if(!empty($_POST['email'])) $adress->setEmail($email);
    try{
       $adress= $adresseManager->add($adress);
        echo "<script>alert('adresse'); </script>";}
        catch (Exception $e ){
        echo $e->getMessage();
        }

    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) ) {
        $eleve->setNum_Eleve($num_eleve);
        $eleve->setCODE_ADRESSE($adress->getCodeAdresse());
        $eleve->setID_IMG($id_img);
        $eleve->setNom($nom);
        $eleve->setPrenom($prenom);
        $eleve->setSexe($sexe);
        $eleve->setDob($dob);
        $eleve->setLieu($lieu);
        $eleve->setDate_Inscription(date('Y').'/01/01');
        if(!empty($_POST['cni']))        $eleve->setCNI($cni);
        if(!empty($_POST['niveau'])) $eleve->setNiveau($niveau);
        if(!empty($_POST['status'])) $eleve->setStatus($status);



        //student account
        $compte->setLogin($num_eleve);
        $compte->setPassword($num_eleve);
        $compte->setType("eleve");

    }
    if (isset($_POST['nom_parent']) && isset($_POST['prof_parent']) && isset($_POST['tel_parent']) && isset($_POST['cni_parent'])) {
        $parent->setNUM_ELEVE($num_eleve);
        $parent->setNom($nom_parent);
        $parent->setProfession($prof_parent);
        $parent->setCni($cni_parent);
        if(!empty($_POST['email_parent'])) $parent->setEmail($email_parent);
        if(!empty($_POST['tel_parent'])) $parent->setNum_Tel($tel_parent);

     }
    if (isset($_POST['formation'])) {
        $passe->setNUM_ELEVE($num_eleve);
        $passe->setCODE_FILIERE($formation);
    }
    try{
        $adresseManager->add($adress);
        echo "<script>alert('adresse'); </script>";
        $eleveManager->add($eleve);
        echo "<script>alert('eleve'); </script>";
        $parent = $parentManager->add($parent);
        $passeManager->add($passe);

        $comptManager->add($compte);

        echo /**@lang HTML*/ " <script> alertMsg('success','Nouvel Apprenant Enregistré avec succès <span  style=\'color :pink;\'> <a href=\'?q=app/views/apprenant/index&e=".$num_eleve."\'>Visualiser</a> </span>');</script>";
    }catch (Exception $e){
        echo  $e->getMessage();
         echo /**@lang HTML*/" <script> alertMsg('danger','Echec d enregistrement du nouvel apprenant ');</script>";
    }

}


if (isset($_POST['num_eleve'])&& isset($_POST['nom']) && isset($_POST['formation']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) && isset($_POST['tel'])
    && isset($_POST['nom_parent']) && isset($_POST['num_parent']) && isset($_POST['prof_parent']) && isset($_POST['cni_parent'])&& isset($_POST['tel_parent']))
{

    echo /**  @lang HTML */"<script >alert('debut');</script>";
    $num_eleve = $eleveManager->newMatricule();
    extract($_POST);

    include "app/controllers/photo/addImage.php";
    $adress->setCode_Adresse(intval($code_ad));
    $adress->setNum_Tel($tel);
    if(!empty($_POST['region'])) $adress->setRegion($region);
    if(!empty($_POST['email'])) $adress->setEmail($email);


    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) ) {
        $eleve->setNum_Eleve($num_eleve);
        $eleve->setCODE_ADRESSE($adress->getCodeAdresse());
        $eleve->setID_IMG($id_img);
        $eleve->setNom($nom);
        $eleve->setPrenom($prenom);
        $eleve->setSexe($sexe);
        $eleve->setDob($dob);
        $eleve->setLieu($lieu);
        $eleve->setDate_Inscription(date('Y').'/01/01');
        if(!empty($_POST['cni']))        $eleve->setCNI($cni);
        if(!empty($_POST['niveau'])) $eleve->setNiveau($niveau);
        if(!empty($_POST['status'])) $eleve->setStatus($status);



        //student account
        $compte->setLogin($num_eleve);
        $compte->setPassword($num_eleve);
        $compte->setType("eleve");

    }
    if (isset($_POST['nom_parent']) && isset($_POST['prof_parent']) && isset($_POST['tel_parent']) && isset($_POST['cni_parent'])) {
        $parent->setNum_Parent($num_parent);
        $parent->setNUM_ELEVE($num_eleve);
        $parent->setNom($nom_parent);
        $parent->setProfession($prof_parent);
        $parent->setCni($cni_parent);
        if(!empty($_POST['email_parent'])) $parent->setEmail($email_parent);
        if(!empty($_POST['tel_parent'])) $parent->setNum_Tel($tel_parent);
    }
    if (isset($_POST['formation'])) {
        $passe->setNUM_ELEVE($num_eleve);
        $passe->setCODE_FILIERE($formation);
    }
    try{
        $adresseManager->update($adress);

        $eleveManager->update($eleve);

        $parent = $parentManager->update($parent);

        $passeManager->update($passe);

        $comptManager->update($compte);

        echo /**@lang HTML*/" <script> alertMsg('success','Apprennant modifié avec succès');</script>";
    }catch (Exception $e){
        echo /**@lang HTML*/" <script> alertMsg('danger','echec de modification');</script>";

    }

}
/*
if (!empty($_POST['num_eleve'])&&isset($_POST['nom']) && isset($_POST['formation']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) && isset($_POST['niveau']) && isset($_POST['groupe']) && isset($_POST['rhesus']) && isset($_POST['status']) && isset($_POST['cni']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['ville']) && isset($_POST['region']) && isset($_POST['quartier'])
    && isset($_POST['nom_parent']) && isset($_POST['prof_parent']) && isset($_POST['tel_parent']) && isset($_POST['email_parent']))
{


    extract($_POST);


    include "../../controllers/photo/addImage.php";



    $adress->hydrate(array('ville' => $ville, 'quartier' => $quartier, 'region' => $region, 'num_tel' =>intval($tel) , 'email' => $email));
    $adresseManager->update($adress);

    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) && isset($_POST['niveau']) && isset($_POST['groupe']) && isset($_POST['rhesus']) && isset($_POST['status']) && isset($_GET['cni'])) {
        $eleve->hydrate(array(
            'code_adresse' => $adress->getCodeAdresse(),
            'login' => $num_eleve,
            'id_img' => $id_img,
            'nom' => $nom,
            'prenom' => $prenom,
            'sexe' => $sexe,
            'dob' => $dob,
            'lieu' => $lieu,
            'niveau' => $niveau,
            'groupe' => $groupe,
            'rhesus' => $rhesus,
            'status' => $status,
            'cni' => $cni
        ));
        $eleveManager->update($eleve);
    }
    if (isset($_POST['nom_parent']) && isset($_POST['prof_parent']) && isset($_POST['tel_parent']) && isset($_POST['email_parent']) && isset($_POST['cni_parent'])) {
        $parent->hydrate(array(
            'nom' => $nom_parent,
            'profession' => $prof_parent,
            'num_tel' => intval($tel_parent),
            'email' => $email_parent,
            'cni' => $cni_parent,
        ));
        $parent = $parentManager->update($parent);
    }
    if (isset($_POST['formation'])) {
        $passe = new PasseManager($bdd);
        $passe->update(new Passe(['num_eleve'=>$eleve->getNumEleve(), 'code_filiere'=>$formation]));
    }


}
?>
*/