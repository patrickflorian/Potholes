<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 20/06/2017
 * Time: 14:03
 */
include_once "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion() ;
$dispense = new DispenseManager($bdd);
$matiereManager = new MatiereManager($bdd);

if (isset($_GET['formation'])&isset($_GET['optionlist'])&!isset($_GET['evaluation'])) {

    $listmatiere = $dispense->getMatiereByFiliere( $_GET['formation'] );

    echo '<optgroup label="matiere"><option value="" selected></option>';

    foreach ($listmatiere AS $item) {
        ?>
        <option value="<?php echo $item->getCodeMatiere(); ?>"><?php echo $item->getLibelle(); ?></option>

        <?php
    }
    echo '</optgroup>';
}

if (isset($_GET['formation'])&isset($_GET['evaluation'])) {

    $evaluation = new EvaluationManager($bdd);
    $listmatiere = $evaluation->getListmatiere($_GET['evaluation'],$_GET['formation']);

    echo '<optgroup label="matiere exam"><option value="" selected></option>';

    foreach ($listmatiere AS $item) {
        ?>
        <option value="<?php echo $item->getCodeMatiere(); ?>"><?php echo $item->getLibelle(); ?></option>

        <?php
    }
    echo '</optgroup>';
}


if (isset($_GET['formation'])&&isset($_GET['table'])) {

$listmatiere = $dispense->getMatiereByFiliere( $_GET['formation'] );

    echo '<table class="table table-striped table-bordered">
                   <thead>
                   <tr>
                       <th><a href="#"  onclick="checkall();"> chek all</a>   </th>
                       <th>Code Matiere</th>
                       <th>Libelle</th>
                       <th>Coef</th>
                       <th>plus d infos</th>
                       <th>Modifier</th>
                       <th>Saisir/Modif notes</th>
                   </tr>
                   </thead>
                   <tbody id="matiere-list">';
    if (empty( $listmatiere )) {

        echo '<tr> <td><label>Aucune Matiere pour cette filiere</label></td></tr>';
    }
    foreach ($listmatiere AS $item) {
        ?>
        <tr>
            <td><input type="checkbox" name="<?php echo strtok($item->getCodeMatiere(),' ');?>" checked class="checkbox-matiere"></td>
            <td><label><?php echo $item->getCodeMatiere(); ?></label></td>
            <td><label><?php echo $item->getLibelle(); ?></label></td>
            <td><label><?php echo $item->getCoefficient(); ?></label></td>
            <td><a href="#"> <i class="glyphicon glyphicon-plus"></i></a></td>
            <td>
                <a href="index.php?q=app/views/administrateur/formMatiere&alter=<?php echo $item->getCodeMatiere(); ?>"
                   class="btn red"><i class="glyphicon glyphicon-minus"></i></a>
            </td>
            <td>
                <a class="btn yellow "><i class="material-icons">assignment</i></a>
            </td>
        </tr>
        <?php



}
}?>

