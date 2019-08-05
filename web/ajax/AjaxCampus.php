<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 15/06/2017
 * Time: 15:11
 */
include "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion() ;
$campusManager = new CampusManager($bdd);
$salleMAnager = new SalleManager($bdd);

if (isset($_GET['list'])){
    $list = [];
    $list = $campusManager->getList();
    echo '
        <optgroup label="choose a formation please">
            <option value selected></option>
        
    ';
    foreach ($list as $item) {
        $codecampus =strtok($item->CODE_CAMPUS,' ') ;
        $libelle = $item->LIBELLE_CAMPUS;
        echo '
            <option value="'.$codecampus.'">'.$libelle.'</option>
        ';
    }
    echo '</optgroup>';
}
if(isset($_GET['salle'])){
    $list=[];
    $list = $salleMAnager->GetList($_GET['salle']);
    echo '
        <optgroup label="choose a Class Please">
            <option value selected></option>
        
    ';
    foreach ($list as $item) {
        $num_salle = $item->getNumSalle();
        echo '
            <option value="'.$num_salle.'" >'.$num_salle.'</option>
        ';
    }
    echo '</optgroup>';
}

if(isset($_GET['tablesalle'])){
    $list=[];
    $list = $salleMAnager->GetList($_GET['tablesalle']);
    echo '
        <table class="table table-striped table-responsive table-bordered">
        <thead>
        <tr>
            <th>Numero Salle</th>
            <th>Effectif </th>
            <th>Situation</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
        </thead>
        <tbody id="salle-list">
  
    ';
    foreach ($list as $item) {
        $num_salle = $item->getNumSalle();
        $situation = $item->getSituation();
        $effectif = $item->getEffectif();
        echo '<tr>
            <td><label>'.$num_salle.'</label></td>
            <td><label>'.$effectif.'</label></td>
            <td><label>'.$situation.'</label></td>
            <td><a href="#"><i class="glyphicon glyphicon-edit"></i></a></td>
            <td><a onclick="deleteSalle(\''.$num_salle.'\');getListSalle(campus.value)"><i class="glyphicon glyphicon-remove"></i></a></td>
        </tr>';
    }
    echo '</tbody>
        <caption class="text-center text-muted bg-primary">   <i class="glyphicon glyphicon-list"> </i>
            Liste des Salles         
        </caption>
    </table>';
}