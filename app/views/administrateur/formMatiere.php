<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:31
 */

 
include_once "app/controllers/apprenant/C_formApprenant.php";
 $matiereManager = new MatiereManager($bdd);
 $matiere =new matiere(array());

if (!isset($_GET['list'])) {
    if (isset($_GET['alter'])) {
        $matiere = $matiereManager->getUnique($_GET['alter']);
    }
 else {
}?>
<script> window.document.title = "Wigefor --new Matter"</script>

<div class="col col-md-11 col-md-offset-2">
    <?php include_once "app/controllers/administrateur/C_formMatiere.php"?>
    <form method="get" action="#">
    <div class="row register-form col-md-9 col-md-offset-2">
            <div class="form-horizontal custom-form" >
                <input type="hidden" name="q" value="app/views/administrateur/formMatiere">
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
                <div class="form-group col-md-6 ">
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
                            Formation
                        </label>
                    </div>
                    <div class="col-md-7 input-column  ">
                        <select class="form-control" id="formation" name="formation"  >

                        </select>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>

        </div>

        <input type="hidden" name="q" value="app/views/administrateur/formMatiere">

        <?php if(isset($_GET['alter'])){

            ?>
            <header>Modifier la matiere :   <span class="label-warning"> <?php echo $_GET['alter']; ?></span>
            </header>

            <input type="hidden" name="update">
            <input type ='hidden' name='code_matiere' id="code_matiere" value ='<?php echo $matiere->getCodeMatiere(); ?>'/>
        <?php
        }else{?>
        <div class="col col-md-4 col-md-offset-2">
            <header>Enregistrer une matiere</header>

            <label>code de la matiere  : </label>
            <input class="form-control" type="text" name="code_matiere" >
        <?php } ?>
        <label>libelle de la matiere</label>
        <input class="form-control" type="text" name="libelle" value="<?php if(isset($_GET['alter'])){echo $matiere->getLibelle();} ?>">
        <label>coefiscient </label>
        <input class="form-control" type="number" min="1" name="coef" value="<?php if(isset($_GET['alter'])){echo $matiere->getCoefficient();} ?>">

        <button class="btn btn-success " style="float: right; margin:15px;" type="submit">Add  <span class="glyphicon glyphicon-plus"></span> </button>
   
        <button class="btn btn-danger" style="float: right; margin:15px;">Reset  <span class="glyphicon glyphicon-remove"></span> </button>
            </div>
    </form>
</div>
<?php
}else{
    ?>
    <script> window.document.title = "Wigefor --List Matieres"</script>

    <div class="col-md-11 col-md-offset-2">
        <div class="row register-form col-md-9 col-md-offset-2">
            <div class="form-horizontal custom-form" >
                <input type="hidden" name="q" value="app/views/administrateur/formMatiere">
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
                <div class="form-group col-md-6 ">
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
                            Formation
                        </label>
                    </div>
                    <div class="col-md-7 input-column  ">
                        <select class="form-control" id="formation" name="formation" oninput="getListMatiere(this.value);" >

                        </select>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>

        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" id="matiere">
        </div>
    </div>

    <?php
}
