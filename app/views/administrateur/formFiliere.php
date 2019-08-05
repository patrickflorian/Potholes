<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:32
 */

?>
<!DOCTYPE html>
<html>



<body >
<script> window.document.title = "Wigefor --new Formation"</script>

    <div class="col col-md-8 col-md-offset-2">
        <form method="post" action="#" onshow="getListCampus();">

            <h1><span style="text-decoration: underline;">Enregistrer une nouvelle Formation</span></h1>
            <div class="col-md-6">
                <div class="col-xs-offset-0">
                    <label>code filiere<span
                                style="color : red;">*</span></label>
                    <input class="form-control" name="code_filiere" type="text">
                </div>
                <label>libelle <span
                            style="color : red;">*</span></label>
                <input class="form-control" name="libelle" type="text">
                <label for="formation" class="control-label">Type <span
                            style="color : red;">*</span>
                </label>
                <select class="form-control" id="type-formation" name="type"
                        oninput="getListFormation(this.value)">
                    <option value=""></option>
                    <option value="vac">Formation Vacances</option>
                    <option value="pro">Formation Professionnelle</option>
                </select>
                <label>effectif<span
                            style="color : red;">*</span> </label>
                <input class="form-control" name="effectif" type="number" min="0">
                <label>Duree (en mois) <span
                            style="color : red;">*</span></label>
                <input class="form-control" name="duree" type="number" min="0">

                <div></div>
                <label>more information</label>
                <textarea class="form-control" name="information"></textarea>
                <label>choose campus location</label>
                <select class="form-control" id="campus" name="campus"  oninput="getOptionSalle(this.value)">
                    <optgroup label="Campus list">

                    </optgroup>
                </select>
                <label>choose a Classroom</label>
                <select class="form-control" id="salle" name="salle">

                </select>
            </div>
            <div class="col-md-6 " style=" padding: 5px;">
                <div class="label-column" >
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>TRANCHE</th>
                            <th>valeur</th>
                        </tr>
                        </thead>
                        <tbody id="tranche-list">
                        <tr>
                            <td class="success"><label for="tranche" > Tranche 1</label></td>
                            <td> <input type="number"  name="tranche1" class="tranche"  max="300000" min="50000" value="50000"></td>
                        </tr>
                        </tbody>
                        <caption class="text-center text-muted bg-primary">Tranches de Paiement des frais de
                            formation
                            <div class="help-block" style="font-size: 10px;"><span class="text-warning">Notice:</span>la suppression des tranches doit de faire à partir de la drrniere tranche ajoutée</div>
                        </caption>
                    </table>


                </div>
                <a class="btn text-warning" onclick="addTranche();"><span class="glyphicon glyphicon-plus" > </span>ajouter </a>

            </div>
            <div class="col-md-12" style=" padding: 5px;">
                <button class="btn btn-success btn-lg" type="submit"><span class="glyphicon glyphicon-plus light-green-text" > </span>add </button>
                <button class="btn btn-danger btn-lg" type="reset"><span class="glyphicon glyphicon-remove red-text" > </span>Cancel </button>
            </div>

        </form>

    </div>

<script src="../../../res/assets/js/jquery.min.js"></script>
<script src="../../../res/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../web/js/script.js"></script>
<script src="../../../web/js/wigeforAjax.js"></script>
</body>
</html>
