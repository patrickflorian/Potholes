<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 24/06/2017
 * Time: 20:54
 */
?>
<script> window.document.title = "Wigefor --List Enseignant"</script>

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
                <div class="col-md-7 input-column  ">
                    <select class="form-control " id="annee" name="annee">
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6" >
                <div class="col-md-4 label-column">
                    <label for="formation" class="control-label">
                        Formation
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
            <div class="form-group col-md-5 input-column  ">
                <button type="submit" class="btn right" style="color: yellow;background-color:purple;float: right;" onclick="getListEnseignant();">List <i class="glyphicon glyphicon-list"> </i></button>
            </div>

        </div>

    </div>
    <div class="col-md-12" id="list">

    </div>
</div>
