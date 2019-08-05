<?php
  // print_r($_POST);
?>
<?php
@session_start();

include('../../includes/configure.php');
include('../../' . DIR_FUNCTIONS . "functions.php");
include('../../' . DIR_FUNCTIONS . "other_functions.php");
include('../../' . DIR_MYSQL . "connect_mysql.php");
include('../../' . DIR_CLASSES."dir.class.php");

?>
<script language="javascript" src="<?php echo '../../'.DIR_CAL.'calendar_us.js' ?>"></script>
<link  href="<?php echo '../../'.DIR_CAL.'calendar.css' ?>" rel="stylesheet" />
<script language="javascript" src="<?php echo '../../'.DIR_JS.'controlegeneral.js';?>"> </script>
<link href="<?php echo '../../'.DIR_STYLE.'style1.css' ?>" rel="stylesheet" />
<?php
$idclasse=$_GET['idclasse'];
if ($idclasse != "")   
  {
      $idannee=$_POST['annee'];$idsequence=1;
     $libelleanne=getLibelle('anneescolaire','idanneescolaire','libelleannee',$idannee);
	 $libelleclasse=getLibelle('classe','idclasse','libelleclasse',$idclasse);
	 //***************Select info etab*******************************
	 
	 @$R_selectinfoetab="SELECT  `Etab`.`libelleetablng1`, `Etab`.`libelleetablng2`, `Etab`.`bp`, `Etab`.`tel`,  `Etab`.`fax`, `Etab`.`siteweb`, `Etab`.`titrechefetablng1`,  `Etab`.`titrechefetablng2`,`Etab`.`logo` FROM  `etablissement` `Etab`  LIMIT 1;";
  
     @$sqlr = mysql_query($R_selectinfoetab)or die(mysql_error());
	  
	  $etab = mysql_fetch_array($sqlr); 
	 //*******************************************Select info pays**************
	 $R_selectentetepays="SELECT  `p`.`libelledoclng1`, `p`.`libelledoclng2`, `p`.`devisepayslng2`,  `p`.`devisepayslng1`
FROM  `pays` `p` LIMIT 1;";
	  
	  //echo $R_selectentetepaysuniv;
	  
	  @$sql = mysql_query($R_selectentetepays)or die(mysql_error());
	  
	  $pays = mysql_fetch_array($sql);
 
	//****************************Recuperation Liste des elèves ********************
$R_ListeEleve="SELECT `El`.`ideleve`,`El`.`nomele`, `El`.`prenomele`,`Pa`.`nompere`, `Pa`.`nommere`, `Pa`.`telpere`,`Pa`.`telmere`,`Pa`.`nomtuteur` ,`Pa`.`teltuteur`FROM  `eleve` `El` INNER JOIN  `parents` `Pa` ON `Pa`.`idparents` = `El`.`idparents` INNER JOIN  `affecter_classe` `Af` ON `Af`.`ideleve` = `El`.`ideleve` INNER JOIN  `classe` `Cl` ON `Cl`.`idclasse` = `Af`.`idclasse` INNER JOIN  `anneescolaire` `An` ON `An`.`idanneescolaire` = `Af`.`idanneescolaire` WHERE   `Af`.`idclasse` = '$idclasse' AND  `Af`.`idanneescolaire` = '$idannee' AND  `Af`.`inscrit` = '1' ORDER BY  `El`.`nomele`, `El`.`matriculeeleve`;";
//echo "".$R_ListeEleve;
 // print_r($_POST);
  $res = mysql_query($R_ListeEleve);$taille=0;$elevesms=array();$k=0;
      while ($ligne = mysql_fetch_array($res)) {
	     $eleve="id_".$ligne['ideleve'];
		  if(isset($_POST["$eleve"]) && $_POST["$eleve"]!="")
		    {
			  
			   $elevesms[$k]['ideleve']=$ligne['ideleve'];
			   $elevesms[$k]['matriculeeleve']=$ligne['matriculeeleve'];
			   //$elevecarte[$k]['photoeleve']=$ligne['photoeleve'];
			   $elevesms[$k]['nomele']=$ligne['nomele'];
			   $elevesms[$k]['prenomele']=$ligne['prenomele'];
			   $elevesms[$k]['nompere']=$ligne['nompere']; 
			   $elevesms[$k]['telpere']=$ligne['telpere'];	
			   $elevesms[$k]['nommere']=$ligne['nommere'];
			 $elevesms[$k]['telmere']=$ligne['telmere'];
			  $elevesms[$k]['nomtuteur']=$ligne['nomtuteur'];
			 $elevesms[$k]['teltuteur']=$ligne['teltuteur'];
			    
				$k++;
			}
	  }
	//********************************************************************************* 
	 $taille=count($elevesms);//print_r($elevesms);
	  for ($i=0; $i<$taille; $i++)
		   {
			    $ideleve=$elevesms[$i]['ideleve'];
			   $moyenneeleve=round(MoyenneEleveClasse($idclasse,$idannee,$idsequence,$ideleve),2);
			   $positioneleve=positionfinaleeleve($idclasse,$idannee,$idsequence,$ideleve);
		       if(isset($elevesms[$i]['telpere']) && is_numeric($elevesms[$i]['telpere'])&&$elevesms[$i]['telpere']!="/"){
				   
				 $message ="Mr ".$elevesms[$i]['nompere'].", ". "Le ".ucfirst($etab['titrechefetablng1'])." du ".ucwords($etab['libelleetablng1']) ." vous informe que votre enfant ".fullUpper($elevesms[$i]['nomele'])." est $positioneleve de sa classe avec  une moyenne de $moyenneeleve/20 ";
				  $listeenvoi[$i]["numero"]=$elevesms[$i]['telpere'];
				  $listeenvoi[$i]["message"]=$message;
			   }
			   else  if(isset($elevesms[$i]['telmere']) && is_numeric($elevesms[$i]['telmere'])){
				   
				 $message ="Mme ".$elevesms[$i]['nommere'].", ". "Le ".ucfirst($etab['titrechefetablng1'])." du ".ucwords($etab['libelleetablng1'])." vous informe que votre enfant  ".fullUpper($elevesms[$i]['nomele'])." est $positioneleve de sa classe avec  une moyenne de $moyenneeleve/20 ";
				  $listeenvoi[$i]["numero"]=$elevesms[$i]['telmere'];
				  $listeenvoi[$i]["message"]=$message;
			   }
			  else  if(isset($elevesms[$i]['teltuteur']) && is_numeric($elevesms[$i]['teltuteur'])){
				   
				 $message ="Mr ".$elevesms[$i]['nomtuteur'].", ". "Le ".ucfirst($etab['titrechefetablng1'])." du ".ucwords($etab['libelleetablng1'])." vous informe que votre enfant  ".fullUpper($elevesms[$i]['nomele'])." est $positioneleve de sa classe avec  une moyenne de $moyenneeleve/20 ";
				  $listeenvoi[$i]["numero"]=$elevesms[$i]['teltuteur'];
				  $listeenvoi[$i]["message"]=$message;
			   }
	?>
					   
					    
  <?php	  
           
	}
	
	if(is_array($listeenvoi))
	  {
		 //print_r($listeenvoi);
	    envoiesms($listeenvoi);
	  }
  }
	 
  ?>
  