<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:35
 */
include_once "app/controllers/administrateur/C_formSalles.php";
?>


<body onload="getListCampus();">
<script> window.document.title = "Wigefor --new ClassRoom"</script>
<form method="post" action="#" class="col-md-12 col-md-offset-2">

    <h1><span style="text-decoration: underline;">Enregistrer une nouvelle Salle</span></h1>

    <div class="col-md-6 ">
        <div class="col-xs-offset-0">
            <label>Numero Salle</label>
            <input class="form-control" name="num_salle" type="text" required title="numero de salle" oninput="verifIntput(this.value);">
        </div>
        <label>effectif </label>
        <input class="form-control" name="effectif" type="number" required title="effectif de la salle">

        <div></div>
        <label>choose campus location</label>
        <select class="form-control" id="campus" name="campus" required title="choisir le campus ou se trouve la salle">
            <optgroup label="Campus list">

            </optgroup>
        </select>
        <label>Situation</label>
        <input class="form-control" name="situation" type="text" title="donner la position de la salle">

    </div>
    <div class="col-md-12">
        <button class="btn btn-success btn-lg" type="submit">add </button>
        <button class="btn btn-danger btn-lg" type="reset">Cancel </button>
    </div>

</form>


</body>
