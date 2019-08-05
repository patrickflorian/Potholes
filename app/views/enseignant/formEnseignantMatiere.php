<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 28/06/2017
 * Time: 11:34
 */
?>
<script> window.document.title = "Wigefor --List Enseignant"</script>

<div class="col-md-11 col-md-offset-0">
    <div class="row register-form col-md-9 col-md-offset-2">
        <div class="form-horizontal custom-form" >
            <input type="hidden" name="q" value="web/ajax/ajaxAddStudentInfos">
            <div class="form-group col-md-4" >
                <div class="col-md-5 label-column">
                    <label for="annee" class="control-label">
                        Annee Scolaire
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control " id="annee" name="annee">
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="col-md-5 label-column">
                    <label for="formation" class="control-label">Formation <span
                                style="color : red;">*</span></label>
                    <p class="help-block">choix de la formation</p>
                </div>
                <div class="col-md-7 input-column" >
                    <select class="form-control" id="type-formation" name="type"
                            oninput="getListFormation(this.value)">
                        <option value=""></option>
                        <option value="vac">Formation Vacances</option>
                        <option value="pro">Formation Professionnelle</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4" >
                <div class="col-md-5 label-column">
                    <label for="formation" class="control-label">
                        Filiere
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="formation" name="formation"  oninput="getOptionListMatiere(this.value);" >

                    </select>
                </div>
            </div>
            <div class="form-group col-md-6" >
                <div class="col-md-4 label-column">
                    <label for="matiere" class="control-label">
                        Matiere
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="matiere" name="matiere" >

                    </select>
                </div>
            </div>
            <div class="form-group col-md-6" >
                <div class="col-md-4 label-column">
                    <label for="enseignant" class="control-label">
                        Enseignant<span style="color: red;">*</span>
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="enseignant" name="enseignant" onmouseenter="getOptionListEnseignant();">

                    </select>
                </div>
            </div>
            <div class="form-group col-md-5 input-column  ">
                <button onclick="affecter(enseignant.value,matiere.value);" type="submit" class="btn right" style="color: yellow;background-color:purple;float: right;" >Affecter <i class="glyphicon glyphicon-list"> </i></button>
            </div>

        </div>

    </div>
    <div class="col-md-12 col-md-offset-2" id="list">

    </div>
</div>
