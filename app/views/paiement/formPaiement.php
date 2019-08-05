<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:36
 */


if (isset($_GET['el'])){
    echo '<input type="hidden" name="eleve" id="eleve" value="'. $_GET['el'].'">';
}

    ?>
<script> window.document.title = "Wigefor --Paiements"</script>
<div class="col-md-11 col-md-offset-0">
    <div class="row register-form col-md-9 col-md-offset-2">
        <div class="form-horizontal custom-form" >
            <input type="hidden" name="q" value="web/ajax/ajaxAddStudentInfos">
            <div class="form-group col-md-6" >
                <div class="col-md-4 label-column">
                    <label for="annee" class="control-label">
                        Annee Scolaire
                    </label>
                </div>
                <div class="col-md-7 input-column ">
                    <select class="form-control " id="annee" name="annee">
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
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
            <div class="form-group col-md-6" >
                <div class="col-md-4 label-column">
                    <label for="formation" class="control-label">
                        Filiere
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="formation" name="formation" oninput="getListApprenantForPaiement();">

                    </select>
                </div>
            </div>


        </div>

    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2" id="list">
        <?php
            include("app/controllers/paiement/C_formPaiement.php");
        ?>
    </div>
</div>