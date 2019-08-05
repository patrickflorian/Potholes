<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:32
 */
$ens = new enseignant(['num_enseignant'=>'','login'=>'','code_adresse'=>'','id_img'=>'','nom'=>'','prenom'=>'','cni'=>'','sexe'=>'','dob'=>'','qualite'=>'','date_inscription'=>'']);
$adress=new Adresse(['code_adresse'=>'','ville'=>'','quartier'=>'','region'=>'','num_tel'=>'','email'=>'']);
include_once "app/controllers/enseignant/C_formEnseignant.php";
?>


    <div class="row register-form col-md-offset-1">
        <div class="col-md-11">
            <h1 class="text-center"> Teachers Register Form</h1>
            <div>
                <form class="form-horizontal custom-form"  enctype="multipart/form-data" method="post" action="#">
                    <?php
                        if (isset($_GET['alter'])&&!empty($_GET['alter'])){
                            $ens =$ensManager->getUnique($_GET['alter']);
                            $adress = $adresseManager->getUnique($ens->getCODE_ADRESSE());
                            $id_img = $ens->getID_IMG();
                            ?>
                            <input type="hidden" name="num_ens" value="<?php echo $ens->getNumEnseignant();?>">
                            <?php

                        }
                    ?>
                    <div class="form-group" id = "photo">
                        <div class="col-sm-4 label-column">
                            <img src="<?php
                            if (isset($_GET['alter'])&& !empty($_GET['alter'])&& !empty($id_img)) {

                                echo "app/controllers/photo/image.php?id=".$id_img;
                            }
                            else {
                                echo "app/controllers/photo/image.php?id=0";
                            }
                            ?>" id="preview" alt="photo 4X4" width="150" class="img-thumbnail show"/>
                            <p class="help-block">photo 4x4</p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="file" accept="image/*" id="photo" name="photo" class="form-control has-feedback" />
                        </div>
                    </div>
                    <fieldset class="col-md-7 " style="display: block; margin-left: -60px;">
                                                        <legend class="small">information personnelle</legend>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="name-input-field" class="control-label">Nom </label>
                                <p class="help-block">First Name </p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" id="nom-ens" name="nom-ens" class="form-control has-feedback" value="<?php echo $ens->getNom();?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="name-input-field" class="control-label">Prenom </label>
                                <p class="help-block">Last Name </p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" name="prenom-ens" id="prenom-ens" class="form-control has-feedback" value="<?php echo $ens->getPrenom();?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="email-input-field" class="control-label">Sexe </label>
                                <p class="help-block">Sex </p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <select class="form-control has-feedback" name="sexe-ens">
                                    <optgroup label="Choose Student Sexe">
                                        <option value="" selected>------------</option>
                                        <option value="H" <?php  if ($ens->getSexe()=='H') echo 'selected';?> >Homme</option>
                                        <option value="F"<?php  if ($ens->getSexe()=='H') echo 'selected';?> >Femme</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="pawssword-input-field" class="control-label">Date de naissance</label>
                                <p class="help-block">Day of birth</p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="date" name="dob-ens" id="dob-ens" class="form-control has-feedback" value="<?php echo $ens->getDOB();?>"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                                                        <legend class="small">social</legend>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="name-input-field" class="control-label">N¤ CNI </label>
                                <p class="help-block">n¤ cni </p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" name="cni-ens" id="cni-ens" class="form-control has-feedback" value="<?php echo $ens->getCni();?>"/>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                                                        <legend class="small">adresse</legend>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="repeat-pawssword-input-field" class="control-label" >Telephone</label>
                                <p class="help-block">phone number</p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="tel" name="tel-ens" class="form-control has-feedback" value="<?php echo $adress->getNumTelephone();?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="repeat-pawssword-input-field" class="control-label">Email</label>
                                <p class="help-block">email</p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="email" name="email-ens" class="form-control has-feedback" value="<?php echo $adress->getEmail();?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="repeat-pawssword-input-field" class="control-label"  >Ville de Residence</label>
                                <p class="help-block">town</p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" name="ville-ens" class="form-control has-feedback" value="<?php echo $adress->getVille();?>"/>
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-sm-4 label-column">
                                    <label for="qualite" class="control-label">Qualité</label>
                                    <p class="help-block">quality</p>
                                </div>
                                <div class="col-sm-6 input-column">
                                    <select type="text" name="qualite" id="qualite" class="form-control has-feedback" >
                                        <option value="permanent">permanent</option>
                                        <option value="vacataire">vacataire</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="float : right;">
                                <input type="reset" class="btn btn-danger" name ="reinitialiser"/>
                                <input type="submit" class="btn btn-success" value="submit" name="enregistrer" class="form-control has-feedback"/>
                            </div>
                        </form>
            </div>
        </div>
    </div>
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
        if(isNaN($("#"+id).val())){
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
            validateText("nom-ens");
            validateText("prenom-ens");
            validateText("sexe-ens");
            validateText("dob-ens");


            validateCniTEl("cni-ens");
            validateCniTEl("tel-ens");
            validateCniTEl("email-ens");
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