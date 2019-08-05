<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:36
 */
include_once "app/controllers/examen/C_formEvaluation.php";
?>
<script> window.document.title = "Wigefor --new Evaluation"</script>
<div class="col-md-11 col-md-offset-0">
<form  method="get" action="#">
<input type="hidden" value ="app/views/examen/formEvaluation" name ="q"/>
    <div class="row register-form col-md-9 col-md-offset-2">
        <div class="form-horizontal custom-form" style="width: 300px;">
            <div class="form-group col-md-12" >
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
            <div class="form-group col-md-12">
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
            <div class="form-group col-md-12" >
                <div class="col-md-4 label-column">
                    <label for="formation" class="control-label">
                        Formation
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="formation" name="formation" oninput="getListMatiere(this.value)" >

                    </select>
                </div>
            </div>
            <div class="form-group col-md-12" >
                <div class="col-md-4 label-column">
                    <label for="type" class="control-label">
                        Type
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control" id="type" name="type" >
                        <optgroup label="type d'evaluation">
                            <option value="finale" selected> Examen de fin de formation</option>
                            <option value="controle">Controle Continu</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="col-md-8" id="matiere"></div>
        </div>

    </div>
    <div class="form-group col-md-5 input-column">
        <button type="submit" class="btn" style="color: yellow;background-color:purple;float: right;">Launch <i class="glyphicon glyphicon-bookmark"> </i></button>
    </div>
    <div class="col-md-12 col-md-offset-2" id="list">
        
    </div>
    </form>
</div>

