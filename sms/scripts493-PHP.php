<?php
/******************************************************************************/
/*                                                                            */
/*                       __        ____                                       */
/*                 ___  / /  ___  / __/__  __ _____________ ___               */
/*                / _ \/ _ \/ _ \_\ \/ _ \/ // / __/ __/ -_|_-<               */
/*               / .__/_//_/ .__/___/\___/\_,_/_/  \__/\__/___/               */
/*              /_/       /_/                                                 */
/*                                                                            */
/*                                                                            */
/******************************************************************************/
/*                                                                            */
/* Titre          : Compte a rebour JavaScript et PHP                         */
/*                                                                            */
/* URL            : http://www.phpsources.org/scripts493-PHP.htm              */
/* Auteur         : KOogar                                                    */
/* Date �dition   : 01 F�v 2009                                               */
/* Website auteur : http://www.phpsources.org                                 */
/*                                                                            */
/******************************************************************************/

/*******************************************************************************
    * Url DEMO avec les memes parametres ci dessous
    ***************************************************************************/

/*       http://www.phpsources.org/demo/demo_compte_a_rebour.php              */

/*******************************************************************************
    * A parametrer
    ***************************************************************************/

$heures   = 0;  // les heures < 24
$minutes  = 0;   // les minutes  < 60
$secondes = 10;  // les secondes  < 60

$annee = date("Y");  // par defaut cette ann�e
$mois  = date("m");  // par defaut ce mois
$jour  = date("d");  // par defaut aujourd'hui

$redirection = 'www.wigefor.com'; // quand le compteur arrive � 0
                                            // j'ai mis une redirection

/*******************************************************************************
    * calcul des secondes
    ***************************************************************************/

$secondes = time() - mktime(date("H") + $heures,
                            date("i") + $minutes,
                            date("s") + $secondes,
                            $mois,
                            $jour,
                            $annee
                            );
//ne me demander pas pourquoi!! mais si vous enlever cette ligne ca ne marche pas!!
$secondes = str_replace("-","",$secondes);

?>

<html>
<head>
<title>Demo compte a rebour</title>
<script type="text/javascript">
var temps = <?php echo $secondes;?>;
var timer =setInterval('CompteaRebour()',1000);
function CompteaRebour(){

  temps-- ;
  j = parseInt(temps) ;
  h = parseInt(temps/3600) ;
  m = parseInt((temps%3600)/60) ;
  s = parseInt((temps%3600)%60) ;
  document.getElementById('minutes').innerHTML= (h<10 ? "0"+h : h) + '  h :  ' +
                                                (m<10 ? "0"+m : m) + ' mn : ' +
                                                (s<10 ? "0"+s : s) + ' s ';
if ((s == 0 && m ==0 && h ==0)) {
   clearInterval(timer);
   url = "<?php echo $redirection;?>";
   Redirection(url)
}
}
function Redirection(url) {
setTimeout("window.location=index.php", 500);
}
</script>
</head>

<body onload="timer">
<?php
// le nombre de seconde soit etre superieur a 24 heures pour demarrer
if ($secondes <= 3600*24) {
?>
<span style="font-size: 36px;">Il vous reste comme temps</span>
<div id="minutes" style="font-size: 36px;"></div>
<?php
 }
?>
<body>
<html>