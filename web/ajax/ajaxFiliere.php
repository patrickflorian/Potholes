<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 08/06/2017
 * Time: 00:44
 */

if (isset($_GET['tranche'])&& intval($_GET['tranche'])<=6){
 echo "
<tr id='tranche".$_GET['tranche']."'>
<td class='success'><label for='tranche' > Tranche ".$_GET['tranche']."</label> </td>
        <td><input type='number' max=\"300000\" min=\"20000\" value='50000' name='tranche".$_GET['tranche']."' class='tranche'>
        <a class=\"btn text-danger \" onclick=\"document.getElementById('tranche-list').removeChild(document.getElementById('tranche".$_GET['tranche']."')); numCount--;num--;\"><span class=\"glyphicon glyphicon-minus-sign\" > </span> </a>

        </td>
        </tr>
        ";
}

if(isset($_GET['e'])&&isset($_GET['type'])){
        $list = [];
    $list = $formation->getList($_GET['type']);
    echo '<select class="form-control" > 
        <optgroup label="choisir la nouvelle formation">
            <option value selected></option>
        
    ';
    foreach ($list as $item) {
        $codefiliere = $item->CODE_FILIERE;
        $libelle = $item->libelle;
        $information =htmlentities($item->information);
        ?>
            <option value="<?php echo strtok($codefiliere,' ');?>" title="<?php echo $information?>">'.$libelle.'</option>
       
   <?php }
    echo '</optgroup>
    </select>
    <button ><i class="glyphicon glyphicon-edit"></button>
    ';

}