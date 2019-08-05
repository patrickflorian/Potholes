<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 23/06/2017
 * Time: 02:26
 */
include_once "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion();
if(!isset($_GET['view'])&&isset($_GET['examen'] )&& isset($_GET['matiere'])&& !empty($_GET['examen'])&&!empty($_GET['matiere'])&& isset($_GET['formation'])&&!empty($_GET['formation'])) {
 $noteManager =new NoteManager($bdd);
 extract($_GET);
 $annee.='/01/01';
$list = $noteManager->getStudentListWithNoNotes($examen,$matiere,$formation,$annee);
?>
    <table class="table table-striped table-bordered" xmlns="http://www.w3.org/1999/html">
                   <thead>
                   <tr>
                       <th>Matricule Apprenant</th>
                       <th>Noms et Prenoms</th>
                       <th>Note /20</th>
                       <?php
                       if(isset($_GET['view'])) echo "<th > Appreciation </th>";
                       ?>
                   </tr>
                   </thead>
                   <tbody id="note_list">
<?php
    if (empty( $list )) {

        echo '<tr> <td><label>Aucun Apprenant </label></td></tr>';
    } else {
        foreach ($list as $item) {
            ?>
            <tr id="<?php echo $item->getNumEleve();?>">
                <td class="success"><label for="tranche"><?php echo $item->getNumEleve(); ?> </label></td>
                <td><label><?php echo $item->getNom() . ' ' . $item->getPrenom(); ?> </label></td>
                <td><input type="text" name="<?php echo $item->getNumEleve(); ?>" max="20" maxlength="4" class="note"></td>

            </tr>
            <?php
        }
            echo ' 
              <tr><td colspan="3">
              <div class="form-group col-md-5 input-column">
            <button type="submit" class="btn right" style="color: yellow;background-color:purple;float: right;" onclick="addNoteTable(examen.value,matiere.value);"> 
                <i class="glyphicon glyphicon-ok"> </i>  Valider
            </button>
        </div>\'</td>
             </tr>
              </tbody>
                   <caption class="text-center text-muted bg-primary">
                         Saisie des notes de '.$matiere.'
                   </caption>
               </table>
         '      ;


    }

}
if(isset($_GET['view'])&&isset($_GET['annee'])&&isset($_GET['examen'] )&& isset($_GET['matiere'])&& !empty($_GET['examen'])&&!empty($_GET['matiere'])&& isset($_GET['formation'])&&!empty($_GET['formation'])) {
   $eleveManager = new EleveManager($bdd);
    $noteManager =new NoteManager($bdd);
    extract($_GET);

    $list = $eleveManager->getList($formation,$annee);
    ?>
    <table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Matricule Apprenant</th>
        <th>Noms et Prenoms</th>
        <th>Note /20</th>
      <th > Appreciation </th>
    </tr>
    </thead>
    <tbody id="note_list">
    <?php
    if (empty( $list )) {

        echo '<tr> <td><label>Aucun Apprenant </label></td></tr>';
    } else {
        foreach ($list as $item) {
            $note= $noteManager->getUnique($item->getNumEleve(),$matiere,$examen);
            ?>
            <tr id="<?php echo $item->getNumEleve();?>">
                <td class="success"><spanspan for="tranche"><?php echo $item->getNumEleve(); ?> </spanspan></td>
                <td><span><?php echo $item->getNom() . ' ' . $item->getPrenom(); ?> </span></td>
                <td><span> <?php echo $note->getValeur(); ?></span></td>
                <td><span><?php
                        if($note->getValeur()==null) echo'';
                        else{
                            if($note->getValeur()<8) echo'mediocre';
                            if($note->getValeur()<10&&$note->getValeur()>=8) echo'Faible';
                            if($note->getValeur()>=10&&$note->getValeur()<12) echo'Passable';
                            if($note->getValeur()>=12&&$note->getValeur()<14) echo'Assez-Bien';
                            if($note->getValeur()>=14&&$note->getValeur()<16) echo'Bien';
                            if($note->getValeur()>=16&&$note->getValeur()<18) echo'T.Bien';
                            if($note->getValeur()>=18&&$note->getValeur()<20) echo'Excellent';
        }
                        ?></span></td>
            </tr>
            <?php
        }
        echo ' 
              <tr><td colspan="3">
              <div class="form-group col-md-5 input-column hidden-print">
            <button type="submit" class="btn right" style="color: yellow;background-color:grey;float: right;" onclick="print();"> 
                <i class="glyphicon glyphicon-print"> </i>  Imprimer
            </button>
        </div>\'</td>
             </tr>
              </tbody>
                   <caption class="text-center text-muted bg-primary">
                         Fiche des notes de '.$matiere.'
                   </caption>
               </table>
         '      ;


    }

}

if(isset($_GET['examen'] )&& isset($_GET['matiere'])&& !empty($_GET['examen'])&&!empty($_GET['matiere'])&& isset($_GET['eleve'])&&!empty($_GET['eleve'])&& isset($_GET['valeur'])&&!empty($_GET['valeur'])) {
    $noteManager =new NoteManager($bdd);
    extract($_GET);
    $noteManager->add(new NOTE(['valeur'=>$valeur,'num_eval'=>$examen,'num_eleve'=>$eleve,'code_matiere'=>$matiere]));
}