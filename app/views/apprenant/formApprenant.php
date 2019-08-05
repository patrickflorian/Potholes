<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 08/06/2017
 * Time: 00:44
 */

include_once "app/controllers/apprenant/C_formApprenant.php";
?>
        <script> window.document.title = "Wigefor --new Students"</script>
    <div class="col-md-12 col-md-offset-2" onshow="getListFormation();">
        <h1 class="text-center"> Students Register Form</h1>
        <div>
            <div class="col-md-12 col-md-offset-0">
                <ul class="nav nav-tabs  nav-justified" style="">
                    <li class="active nav-tabs-justified" id="tab-eleve"><a href="#tab-1" id="a-tab-eleve" data-toggle="tab">Apprenants
                            <div id="e-tab"
                                 style="width : 10px;height : 10px; background-color : red; display :inline-block;"></div>
                        </a></li>
                    <li id="tab-parent"><a href="#tab-2" id="a-tab-parent" data-toggle="tab">Tuteurs/ Parents
                            <div id="p-tab"
                                 style="width : 10px;height : 10px; background-color : red; display :inline-block;"></div>
                        </a></li>
                    <li id="tab-form">
                        <a href="#tab-3" data-toggle="tab">Formation/Paiements
                            <div id="f-tab" style="width : 10px;height : 10px; background-color : red; display :inline-block;"></div>
                        </a>
                    </li>
                </ul>
                <form class="form-horizontal custom-form col-md-12 col-md-push-1" enctype="multipart/form-data" action="#" method="post" name="studentform" id="studentform" style="margin-top: 60px;">
                    <input type="hidden" name="q" value="app/views/apprenant/formApprenant"/>
                    <div class="tab-content col-md-10">

                        <div class="tab-pane active" id="tab-1" >

                            <?php
                            if (isset($_GET['alter'])&& !empty($_GET['alter'])){
                                $num =strtok($_GET['alter'],' ') ;
                                echo /** @lang HTML */
                                    '<input type="hidden" name="num_eleve" value="'.$num.'" placeholder="choisir une photo 4x4"/>';
                                try{
                                    $el = $eleveManager->getUnique($num);
                                    $ad = $adresseManager->getUnique($el->getCODE_ADRESSE());
                                    $pa = $parentManager->getUnique($el->getNumEleve());
                                    $id_img = $el->getID_IMG();
                                }catch (Exception $e){
                                    echo /** @lang HTML */"<script >alertMsg('danger','apprenant introuvable');</script>";
                                }


                                ?>
                                <script> window.document.title = "Wigefor --Modify Students"</script>
                                <?php
                            }
                            ?>
                            <div class="form-group col-md-12" id="photo">
                                <div class="col-md-4 label-column">
                                    <img id="profil" src="<?php
                                    if (isset($_GET['alter'])&& !empty($_GET['alter'])&& !empty($id_img)) {
                                        echo "app/controllers/photo/image.php?id=".$id_img;
                                    }
                                    else {
                                        echo "app/controllers/photo/image.php?id=0";
                                    }
                                    ?>" alt="photo 4X4" width="192" class="img-thumbnail show" height="192"/>
                                    <p class="help-block">photo 4x4</p>
                                </div>
                                <div class="col-md-6 input-column">
                                    <input type="file" id="photo" accept="image/*"  name="photo" size="50" class="form-control"aria-valuemax="1000"/>
                                 <p class="help-block " style="color : grey;">taille maximum : 25 ko</p>

                                </div>
                                <i class=" form-control-feedback glyphicon "></i>
                            </div>
                            <fieldset class="col-md-6 col-sm-6"  >
                                  <legend class="small">information personnelle</legend>
                                <div class="form-group">
                                <div class="col-md-4 label-column">
                                    <label for="nom-eleve"   class="control-label">Nom <span style="color : red;">*</span></label>
                                    <p class="help-block">First Name</p>
                                </div>
                                <div class="col-md-8 input-column ">

                                        <input type="text"  required  id="nom-eleve" name="nom"  class="form-control has-feedback" value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $el->getNom();
                                        }
                                        ?>" onchange="formatName(this);" placeholder="en Majuscules "/>    <p class="help-block " style="color : grey;">en Majuscules </p>
                                        <i class=" form-control-feedback glyphicon "></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="prenom-eleve" class="control-label">Prenom <span
                                                    style="color : red;">*</span></label>
                                        <p class="help-block">Last Name</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <input type="text"  required  id="prenom-eleve" name="prenom" class="form-control has-feedback " value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $el->getPrenom();
                                        }
                                        ?>" onchange="formatName(this);"/><p class="help-block " style="color : grey;">en Majuscules </p><i class=" form-control-feedback glyphicon "></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="sexe-eleve" class="control-label">Sexe <span
                                                    style="color : red;">*</span></label>
                                        <p class="help-block">Sex</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <select  onselect="verifIntput(this.value)" class="form-control has-feedback"  required  id="sexe-eleve" name="sexe">
                                            <optgroup label="Choose Student Sexe">
                                                <option value=""></option>
                                                <option value="H" <?php
                                                if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                                    if( strtok($el->getSexe(),' ') == 'H'){
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>>Homme</option>
                                                <option value="F" <?php
                                                if (isset($_GET['alter'])) {
                                                    if( strtok($el->getSexe(),' ') == 'F'){
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>>Femme</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="dob-eleve" class="control-label">naissance <span
                                                    style="color : red;">*</span></label>
                                        <p class="help-block">Day of birth</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <input  type="date" required  id="dob-eleve" name="dob" class="form-control datepicker has-feedback" value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $el->getDob();
                                        }
                                        ?>"/><p class="help-block " style="color : grey;">jj/mm/aa e.g :15/06/1992</p><i class=" form-control-feedback glyphicon "></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="lieu-eleve" class="control-label"> Lieu <span
                                                    style="color : red;">*</span></label>
                                        <p class="help-block">birth place</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <input  required type="text" id="lieu-eleve" name="lieu" class="form-control has-feedback" value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $el->getLieu();
                                        }
                                        ?>"/><i class=" form-control-feedback glyphicon "></i>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="col-md-6 col-sm-6">   
                                <legend class="small">Parcours scolaire</legend>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="niveau-eleve" class="control-label">Scolarité</label>
                                        <p class="help-block">school level</p>
                                    </div>
                                    <div class="col-md-8 input-column ">
                                        <input    type="text" id="niveau-eleve" name="niveau" class="form-control has-feedback" value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $el->getNiveau();
                                        }
                                        ?>"/>
                                    </div>
                                </div>
                            </fieldset>
                               <fieldset class="col-md-6 col-sm-6">
                                <legend class="small">social</legend>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="status-eleve" class="control-label">Status Matrimonial<span
                                                    style="color : red;"></span></label>
                                        <p class="help-block">status</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <select  required type="text" id="status-eleve" name="status" class="form-control has-feedback">
                                            <option value="marié">Marié</option>
                                            <option value="Célibataire">Célibataire</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="cni-eleve" class="control-label">N¤ CNI <span
                                                    style="color : red;">*</span></label>
                                        <p class="help-block">n¤ cni</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <i class=" form-control-feedback glyphicon "></i>
                                        <input  type="text" maxlength="10" minlength="10" id="cni-eleve" name="cni" class="form-control has-feedback" value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $el->getCNI();
                                        }
                                        ?>"/><p class="help-block " style="color : grey;">10 caractères e.g :1185689128 </p>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="col-md-6 col-sm-6" style="">
                                   
                                <legend class="small">adresse</legend><?php
                                if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                echo /**@lang HTML */ "<input type='hidden' name = 'code_ad' value ='".$el->getCODE_ADRESSE()."'>";
                                }
                                ?>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="tel-eleve" class="control-label">Telephone <span
                                                    style="color : red;">*</span></label>
                                        <p class="help-block">phone number</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <input  required maxlength="9"   type="tel" id="tel-eleve" name="tel" class="form-control has-feedback" value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $ad->getNumTelephone();
                                        }
                                        ?>"><i class="form-control-feedback glyphicon "></i>
                                        <p class="help-block " style="color : grey;">9caractères  e.g :670295947</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="email-eleve" class="control-label">Email</label>
                                        <p class="help-block">email</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <input  type="email" id="email-eleve" name="email" class="form-control has-feedback" value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $ad->getEmail();
                                        }
                                        ?>"/><p class="help-block " style="color : grey;">e.g : example@example.com </p><i class=" form-control-feedback glyphicon "></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 label-column">
                                        <label for="reg-eleve" class="control-label">Region</label>
                                        <p class="help-block">region</p>
                                    </div>
                                    <div class="col-md-8 input-column">
                                        <select  type="text" id="reg-eleve" name="region" class="form-control" value="<?php
                                        if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                            echo $ad->getRegion();
                                        }
                                        ?>">
                                        <option value="Ouest">Ouest</option>
                                        <option value="Littoral">Littoral</option>
                                        <option value="Centre">Centre</option>
                                        <option value="Nord-Ouest"> Nord-Ouest </option>
                                        <option value="Sud-ouest">Sud-Ouest</option>
                                        <option value="Nord">Nord</option>
                                        <option value="Extreme-Nord">Extreme-Nord</option>
                                        <option value="Sud">Sud</option>
                                        <option value="Est">Est</option>
                                        <option value="Adamaoua">Adamaoua</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <div class="form-horizontal custom-form ">
                                <fieldset class=" col-md-6 col-sm-6"><?php
                                    if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                    echo /**@lang HTML */ "<input type='hidden' name = 'num_parent' value ='".$pa->getNumParent()."'>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <div class="col-md-4 label-column">
                                            <label for="nom-parent" class="control-label">Noms du parent<span
                                                        style="color : red;">*</span></label>
                                            <p class="help-block">parent&#39;s name</p>
                                        </div>
                                        <div class="col-md-8 input-column">
                                            <input  required  type="text" id="nom-parent" name="nom_parent" class="form-control has-feedback" value="<?php
                                            if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                                echo $pa->getNom();
                                            }
                                            ?>"/> <p class="help-block " style="color : grey;">en Majuscules </p><i class=" form-control-feedback glyphicon "></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 label-column">
                                            <label for="cni-parent" class="control-label">N¤ CNI <span style="color : red;">*</span></label>
                                            <p class="help-block">n¤ cni</p>
                                        </div>
                                        <div class="col-md-8 input-column">
                                            <input  required minlength="10" maxlength="10" type="text" id="cni-parent" name="cni_parent" class="form-control has-feedback" value="<?php
                                            if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                                echo $pa->getCni();
                                            }
                                            ?>"/> <p class="help-block " style="color : grey;">10 caractères e.g : 1168954512 </p><i class=" form-control-feedback glyphicon "></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 label-column">
                                            <label for="prof-parent" class="control-label">Profession <span
                                                        style="color : red;">*</span></label>
                                            <p class="help-block">profession</p>
                                        </div>
                                        <div class="col-md-8 input-column">
                                            <input   required type="text" name="prof_parent" id="prof-parent" class="form-control  has-feedback" value="<?php
                                            if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                                echo $pa->getProfession();
                                            }
                                            ?>"/><i class=" form-control-feedback glyphicon "></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 label-column">
                                            <label for="tel-parent" class="control-label">Telephone <span
                                                        style="color : red;">*</span></label>
                                            <p class="help-block">phone number</p>
                                        </div>
                                        <div class="col-md-8 input-column">
                                            <input  required type="tel" id="tel-parent" name="tel_parent" class="form-control has-feedback" value="<?php
                                            if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                                echo $pa->getNumeroTelephone();
                                            }
                                            ?>"/><p class="help-block " style="color : grey;">e.g : 675246895 </p><i class=" form-control-feedback glyphicon "></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 label-column">
                                            <label for="email-parent" class="control-label">Email</label>
                                            <p class="help-block">email</p>
                                        </div>
                                        <div class="col-md-8 input-column">
                                            <input  type="email" name="email_parent" id="email-parent" class="form-control has-feedback" value="<?php
                                            if (isset($_GET['alter'])&& !empty($_GET['alter'])) {
                                                echo $pa->getEmail();
                                            }
                                            ?>"/><p class="help-block " style="color : grey;">e.g : example@example.com </p><i class=" form-control-feedback"></i>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="tab-pane col-md-9" id="tab-3">
                            <div class="form-group">
                                <div class="col-md-7 label-column">
                                    <label for="formation" class="control-label">Formation <span
                                                style="color : red;">*</span></label>
                                    <p class="help-block">choix de la formation</p>
                                </div>
                                <div class="col-md-5 input-column" >
                                    <select class="form-control" id="type-formation" name="type"
                                            oninput="getListFormation(this.value)">
                                        <option value=""></option>
                                        <option value="vac">Formation Vacances</option>
                                        <option value="pro">Formation Professionnelle</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-7 label-column">
                                <label for="formation" class="control-label">Filiere <span
                                            style="color : red;">*</span></label>
                                <p class="help-block">choisir une filiere</p>
                            </div>
                            <div class="col-md-5 input-column" >
                                <select class="form-control"  required id="formation" name="formation"
                                        oninput="getFormationInformation(document.getElementById('formation').value)">
                                </select>
                            </div>
                            </div>
                            <div class="jumbotron" id="infos-formation">
                            </div>

                            <?php
                            if (isset($_GET['alter'])&& !empty($_GET['alter'])){

                               echo'<input type="hidden" class="hidden" name="num_eleve" value="<?php echo $num;?>"/>';
                            }
                            ?>
                            <div class="checkbox">
                                <label>
                                    <input  required type="checkbox"/>Je souscrit entierement aux termes de ce contrat et adhere
                                    au reglement de la societe j&#39;usqu&#39;à la fin de ma formation et j&#39;autorise
                                    WINSOFT ,centre de formation professionnel à utiliser les services d&#39;un
                                    hussier en cas de non paiement de mes frais de formation</label>
                                <a href="#terme-et-reglement">Terme de contrat et Reglements</a></div>



                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2 input-column">
                            <button  type="submit" id="submit" name="submit"><span class="glyphicon glyphicon-save"></span> Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
/**
$passe = new PasseManager($bdd);

if ( isset($_POST['nom']) && isset($_POST['formation']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) && isset($_POST['niveau']) && isset($_POST['groupe']) && isset($_POST['rhesus']) && isset($_POST['status']) && isset($_POST['cni']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['ville']) && isset($_POST['region']) && isset($_POST['quartier'])
    && isset($_POST['nom_parent']) && isset($_POST['prof_parent']) && isset($_POST['tel_parent']) && isset($_POST['email_parent']))
{
    $groupe=$_POST['groupe'];
    $adress;
    $eleve;
    $parent;
    $photo=new photo(array());
    $compte = new Compte(array());
    $num_eleve = $eleveManager->newMatricule();
    extract($_POST);


    include "app/controllers/photo/addImage.php";
    /* echo ' iji l\'image la est  la';
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
             $img_nom =$_FILES['photo-eleve']['name'];
             $img_blob = file_get_contents($_FILES['photo-eleve']['tmp_name']);
             $img_type=$_FILES['photo-eleve']['type'];
             $photo = new photo(array('nom_img' => $img_nom, 'taille_img' => $img_taille, 'type_img' => $img_type , 'blob_img' => $img_blob));
             $photo = $photoManager->add($photo);
         }


    $adress = new Adresse(array('code_adresse'=>intval($adresseManager->count()+1),'ville' => $ville, 'quartier' => $quartier, 'region' => $region, 'num_tel' =>intval($tel) , 'email' => $email));
    $adresseManager->add($adress);


    $compte->setLogin($num_eleve);
    $compte->setPassword($num_eleve);
    $compte->setType("eleve");
    $comptManager= new CompteManager($bdd);


        $eleve = new Eleve(array(
            'num_eleve' => $num_eleve,
            'code_adresse' => $adress->getCodeAdresse(),
            'login' => $num_eleve,
            //'id_img' => $photo->getID_IMG(),
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

        $parent = new Parents(array(
            'num_eleve' => $num_eleve,
            'nom' => $nom_parent,
            'profession' => $prof_parent,
            'num_tel' => intval($tel_parent),
            'email' => $email_parent,
            'cni' => $cni_parent,
        ));
    $eleveManager->add($eleve);
    $comptManager->add($compte);
    $parent = $parentManager->add($parent);
    $passe->add(new Passe(['num_eleve'=>$eleve->getNumEleve(), 'code_filiere'=>$formation]));

}




if (isset($_POST['num_eleve'])&&isset($_POST['nom']) && isset($_POST['formation']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) && isset($_POST['niveau']) && isset($_POST['groupe']) && isset($_POST['rhesus']) && isset($_POST['status']) && isset($_POST['cni']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['ville']) && isset($_POST['region']) && isset($_POST['quartier'])
    && isset($_POST['nom_parent']) && isset($_POST['prof_parent']) && isset($_POST['tel_parent']) && isset($_POST['email_parent']))
{


    extract($_POST);


    include "../../controllers/photo/addImage.php";



    $ad->hydrate(array('ville' => $ville, 'quartier' => $quartier, 'region' => $region, 'num_tel' =>intval($tel) , 'email' => $email));
    $adresseManager->update($adress);

    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['dob']) && isset($_POST['lieu']) && isset($_POST['niveau']) && isset($_POST['groupe']) && isset($_POST['rhesus']) && isset($_POST['status']) && isset($_GET['cni'])) {
        $el->hydrate(array(
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
        $pa->hydrate(array(
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
        $passe->update(new Passe(['num_eleve'=>$num_eleve, 'code_filiere'=>$formation]));
    }


}?>*/
?>

<script >

    function validateText(id){
        if($("#"+id).val()==null || $("#"+id).val()=="" ){
            $("#"+id).nextAll('.form-control-feedback').addClass("glyphicon-warning-sign red");
            $("#"+id).className="form-control has-error has-feedback";
        }else{
            $("#"+id).nextAll('.form-control-feedback').addClass("glyphicon-ok-sign ");
        }
    }
    function validateCniTEl(id){
        if(!isNaN($("#"+id).val())){
            $("#"+id).nextAll('.form-control-feedback').addClass("glyphicon-warning-sign red");
            $("#"+id).class="form-control has-error has-feedback";
        }else{
            $("#"+id).nextAll('.form-control-feedback').addClass("glyphicon-ok-sign ");
        }
    }
    function validateEmail(s) {
        var res = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        ($("#"+s).val().match(res))? $("#"+s).nextAll('.form-control-feedback').addClass("glyphicon-ok-sign red") : $("#"+s).nextAll('.form-control-feedback').addClass("glyphicon-warning-sign red") ;
    }
    $(document).ready(function(){
        $("#submit").click(function(){
            validateText("nom-eleve");
            validateText("prenom-eleve");
            validateText("sexe-eleve");
            validateText("dob-eleve");
            validateText("lieu-eleve");
            validateText("niveau-eleve");


            validateEmail("email-eleve");
            validateText("status-eleve");
            validateCniTEl("cni-eleve");
            validateCniTEl("tel-eleve");
            validateCniTEl("cni-parent");
            validateCniTEl("tel-parent");
            validateText("nom-parent");
            validateText("prof-parent");
            validateEmail("email-parent");
        });
    });
</script>
<style>
    .form-control-feedback{
        left:85%;
    }
</style>
