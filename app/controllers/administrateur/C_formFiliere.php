<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:32
 */
include_once "../../../lib/autoload.php";

$bdd= PDOFactory::getPostgresConnexion();
echo mb_strcut(md5('bonjour'),0,5 ). "<br>";
echo mb_strcut( md5('bonjour'),0,5);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wigefor -- add Formation</title>
    <link rel="stylesheet" href="../../../res/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../web/css/styles.css">
    <link rel="stylesheet" href="../../../res/assets/css/untitled.css">
    <link rel="stylesheet" href="../../../res/assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href=../../../res/assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="../../../res/assets/css/Bootstrap-Payment-Form.css">
</head>

<body onload="getListCampus();">

    <?php
    if(isset($_POST['code_filiere'])&&isset($_POST['salle'])&&isset($_POST['campus'])&&isset($_POST['libelle'])&&isset($_POST['duree'])&&isset($_POST['information'])){
        extract($_POST);
        $filiere = new FILIERE(array('code_filiere'=>$code_filiere,'libelle'=>$libelle,'information'=>$information,'duree'=>$duree,'date_creation'=>date('Y-m-d')));

        $tranche=[];
        for ($i=1;$i<6;$i++){
            if(isset($_POST['tranche'.$i])){
                $val  =$_POST['tranche'.$i];
                $code = 'T'.$i;
                echo $filiere->getCodeFiliere() ;

                $tranche[] = new Tranche(array('code'=>$code,'code_filiere'=>$code_filiere,'valeur'=>intval($val)));
            }
        }

        $occupe = new OccupeManager($bdd);
        $filiereManager = new FiliereManager($bdd);
        $trancheManager = new TrancheManager($bdd);

        try{
            $filiereManager->add($filiere);
            $occupe->add($filiere->getCodeFiliere(),$salle);
            foreach ($tranche as $item) {
                $trancheManager->add($item);
            }
            echo '<p style="color: darkgreen;"> registration end successfully</p>';
        }catch (Exception $e){
            echo '<p style="color: red;"> registration end With error code <span style="color: orangered;"> '.$e->getMessage().'</span> <br>il est possible q\'une Filiere identique existe dejà! </p>';

        }
    }
    ?>
    <form method="post" action="#">

        <h1><span style="text-decoration: underline;">Enregistrer une nouvelle Formation</span></h1>
    <div class="col-md-6">
        <div class="col-xs-offset-0">
            <label>code filiere</label>
            <input class="form-control" name="code_filiere" type="text">
        </div>
        <label>libelle </label>
        <input class="form-control" name="libelle" type="text">
        <label>effectif </label>
        <input class="form-control" name="effectif" type="number">
        <label>Duree (en mois)</label>
        <input class="form-control" name="duree" type="number">

        <div></div>
        <label>more information</label>
        <textarea class="form-control" name="information"></textarea>
        <label>choose campus location</label>
        <select class="form-control" id="campus" name="campus" oninput="getOptionSalle(this.value)">
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
                </caption>
            </table>


        </div>
        <a class="btn " onclick="addTranche();"><span class="glyphicon glyphicon-plus" > </span>ajouter </a>

    </div>
    <div class="col-md-12">
        <input class="btn btn-success btn-lg" type="submit">add </input>
        <button class="btn btn-danger btn-lg" type="reset">Cancel </button>
    </div>

</form>

<script src="../../../res/assets/js/jquery.min.js"></script>
<script src="../../../res/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../web/js/script.js"></script>
<script src="../../../web/js/wigeforAjax.js"></script>
</body>
</html>
