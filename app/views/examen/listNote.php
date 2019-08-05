<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:36
 */?>

<script> window.document.title = "Wigefor --Notes"</script>

<div class="col-md-10 col-md-offset-1">
    <input type="hidden" value ="app/views/examen/formEvaluation" name ="q"/>
    <div class="row register-form col-md-5 col-md-offset-2 hidden-print">
        <div class="form-horizontal custom-form" style="width: 300px;">
            <div class="form-group col-md-12" >
                <div class="col-md-4 label-column">
                    <label for="annee" class="control-label">
                        Annee Scolaire
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control " id="annee" name="annee" oninput="">
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-md-4 label-column">
                    <label for="formation" class="control-label">Formation </label>
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

            <div class="form-group col-md-12" >
                <div class="col-md-4 label-column">
                    <label for="formation" class="control-label" >
                        Filiere
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="formation" name="formation"oninput="getOptionListMatiere(this.value);getListEvaluation(annee.value);" >

                    </select>
                </div>
            </div>
            <div class="form-group col-md-12" >
                <div class="col-md-4 label-column">
                    <label for="exam" class="control-label">
                        Examen
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="examen" name="examen" onclick="" >

                    </select>
                </div>
            </div>

            <div class="form-group col-md-12" >
                <div class="col-md-4 label-column">
                    <label for="matiere" class="control-label">
                        Matiere
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="matiere" name="matiere" oninput="getListNotes(annee.value,examen.value,formation.value,matiere.value);" >

                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2" id="list">

    </div>



</div>


