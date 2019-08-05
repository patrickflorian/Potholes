
<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 21/06/2017
 * Time: 12:31
 */
include_once "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion() ;$eleveManager = new EleveManager($bdd);
$evaluation = new  EvaluationManager($bdd);


if(isset($_GET['formation'])){
    if(isset($_GET['formation'])&& !empty($_GET['formation']) && isset($_GET['annee'])&&!empty($_GET['annee'])) {
        $formation = $eleveManager->getList( strtok( $_GET['formation'], ' ' ), $_GET['annee'] );


        echo '<table class="table table-striped table-bordered">
                   <thead>
                   <tr>
                       <th>Matricule Apprenant</th>
                       <th>Noms et Prenoms</th>
                       <th>Sexe</th>
                       <th>Date de Naissance</th>
                       <th>lieu de naissance</th>
                       <th>CNI</th>
                       <th>Photo</th>
                       <th>Modifier</th>
                       <th>plus d\'infos</th>
                   </tr>
                   </thead>
                   <tbody id="student-list">';

        if (empty( $formation )) {

            echo '<tr> <td><label>Aucun Apprenant enrollé cette année pour cette formationation</label></td></tr>';
        } else {
            foreach ($formation as $item) {
                ?>
                <tr>
                    <td class=""><input type="checkbox" value="<?php echo $item->getNumEleve(); ?>" class="checkbox-matiere"> </input></td>
                    <td class="success"><label for="tranche"><?php echo $item->getNumEleve(); ?> </label></td>
                    <td><label><?php echo $item->getNom() . ' ' . $item->getPrenom(); ?> </label></td>
                    <td><label><?php echo $item->getSexe(); ?> </label></td>
                    <td><label><?php echo $item->getDob(); ?> </label></td>
                    <td><label><?php echo $item->getLieu(); ?> </label></td>
                    <td><label><?php echo $item->getCNI(); ?> </label></td>
                    <td><label><img src="app/controllers/photo/image.php?id=><?php if ($item->getID_IMG() != '') {
                                echo strtok( $item->getID_IMG(), ' ' );
                            } else {
                                echo 0;
                            } ?>"/>
                        </label></td>
                    <td>
                        <a href="index.php?q=app/views/apprenant/formApprenant&alter=<?php echo $item->getNumEleve(); ?>" class="btn red"><i class="glyphicon glyphicon-minus"></i></a>
                    </td>
                    <td>
                        <a class="btn yellow "><i class="glyphicon glyphicon-plus"></i></a>
                    </td>
                </tr>
                <?php

                echo ' </tbody>
                   <caption class="text-center text-muted">
                   Selectionner les apprenants 
                   </caption>
               </table>';
            }

        }
    }


    if (isset($_GET['check'])&& isset($_GET['annee'])&&isset($_GET['evaluation'])){
        $note = new NoteManager($bdd);
        $note->add(new NOTE(['num_eval'=>$num_eval,'num_eleve'=>$_GET['check']]));
    }

}
if (isset($_GET['annee'])&& !empty($_GET['annee']))
{
    $year = $_GET['annee'].'/01/01';
   $list = $evaluation->getEvalByYear($year);
   echo '<optgroup label="evaluations">
        <option value=""></option>
        ';
    foreach ($list as $item) {
        echo ' <option value="'.$item->getNumEval().'">'.$item->getType().'</option>';
    }
    echo '</optgroup>';
}

if(isset($_GET['num_eval'])&& isset($_GET['code_filiere'])){
    extract($_GET);
    $list = array();
    $annee = $evaluation->getUnique($num_eval)->getdate();
    $notemanager = new NoteManager($bdd);
    $eleveManager = new eleveManager($bdd);
    $matiereList = $evaluation->getListmatiere($num_eval,$code_filiere);
    $listEleve = $eleveManager->getList($code_filiere,date_format(date_create($annee),'Y'));
    ?>
    <table class="table table-striped table-bordered table-responsive">
        <thead>
        <th> Matricule </th>
        <th> noms et prenoms </th>
        <?php
        foreach ($matiereList as $value){
            ?>
            <th><?php
                    echo $value->getCodeMatiere().'('.$value->getCoefficient().')';
                ?></th>
            <?php
            $listcoef[]= $value->getCoefficient();
        }
        ?>
        <th>
            Moyenne
        </th>
        <th>
            Mention
        </th>
        <th>Etat</th>
        </thead>
        <tbody>

    <?php

    foreach ($listEleve as $item) {
        $listnote =array();
        $listcoef =[];?>
        <tr>
        <td><?php
                echo $item->getNumEleve();
            ?></td>
        <td><?php
            echo $item->getNom().' '.$item->getPrenom();
            ?></td>
        <?php
        foreach ($matiereList as $value){
            $n = $notemanager->getUnique($item->getNumEleve(),$value->getCodeMatiere(),$num_eval)->getValeur();

            $listnote[]=$n;
            ?>
            <td><?php
                echo $n;
                ?></td>
            <?php
            $listcoef[]= $value->getCoefficient();
        }
        $note = $notemanager->calculNote($listnote,$listcoef);
        $ap ='';
        if($note==null) {echo'';}
        else{
            if($note>=18&&$note<20) $ap='Excellent';
           if($note>=16&&$note<18) $ap='T.Bien';
             if($note>=14&&$note<16) $ap='Bien';
            if($note>=12&&$note<14) $ap='Assez-Bien';
           if($note>=10&&$note<12) $ap='Passable';
            if($note<=10&&$note>8) $ap='Faible';
            if($note<8) $ap ='mediocre';
        }?>
            <td><?php

                echo round($note,2,PHP_ROUND_HALF_UP);

                ?></td>
            <td><?php
                echo $ap;
                ?></td>
            <td><?php
                if($note<10) echo "Echoué";
                else echo 'Admis'
                ?></td>
        </tr>
        <?php
        $list[]=array($item->getNumEleve(),$note,$ap);
    }?></tbody>
        <caption class="text-center"> Tableau recaputilatif des examens
        <button class="btn btn-warning right hidden-print " onclick="print();"><i class="glyphicon glyphicon-print"></i></button>
        </caption>
    </table>
<?php
    return $list;
}



