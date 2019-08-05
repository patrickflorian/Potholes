<?php
//on se connecte à la base de donnée
	   try
	   {
	  $bdd = new PDO('mysql:host=localhost;dbname=cca','root','');
	   }
	     catch(Exception $e)
		 {
			  die('Erreur :' . $e->getMessage());
			 
		 }
		  //on récupère la variable post
		   $recup = $_POST['desactif'];
		     //on effectue la mise à jour de la table
               $mise = $bdd->exec("UPDATE etat SET statut='desactiver' WHERE matricule='$recup'");			 
                     if($mise)
					 { 
					  //on recupere le numéro de télephone de la personne 
			  $selec = $bdd->query("SELECT * from personnel where matricule='$recup' LIMIT 0,60") or die(print_r($bdd->errorInfo()));
					 }
		  while($number=$selec->fetch())
		  {			  ?>
	  <?php $numb = $number['numero'];
  $message = 'Bonjour M/Mme, Le service informatique du CCA  vous informe de votre Desactivation du systeme et vous  souhaite de bonne vacance';
$port="COM5:";
exec('mode COM5: baud=19200 data=8 stop=1 parity=n xon=on');
//r+ : Ouvre en lecture et écriture, et place le pointeur au début 
if ($fh=fopen("COM5:","r+")) {
// 'mode com1: BAUD=9600 PARITY=N data=8 stop=1 xon=off'; 
fputs($fh,"AT\n\r");
sleep(1);
fputs($fh,"AT+CMGF=1\r");
sleep(1);
fputs($fh,"AT+CMGS=\"$numb\"\r");
sleep(1);
fputs($fh,"$message\032");
sleep(1);
fclose($fh);
echo '<html>
  <head>
    <link rel="stylesheet" type = "text/css" href="css/css/blueimp-gallery.min.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/boostrap.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap.min.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap-image-gallery.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap-image-gallery.min.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap-responsive.min.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap-responsive.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/docs.css">
	   <link rel="stylesheet" type = "text/css" href="css/cus-icons.css">
	   
	  
	   <script src="css/js/jquery.js"></script>
       <script src="css/js/bootstrap.min.js "></script>
       <script src="css/js/bootstrap-typeahead.js "></script>
   </head>
     <body bgcolor="silver">
	  <fieldset width="80%" style="background-color:rgb(226,226,199);border-radius:10px;border:2px solid groove;">
	   
	   <h1 align="center" style="font-family:arial;font-style:italic;opacity:0.8;color:silent;"> Action réussie et message envoyé</h1><br><br>
	   <div align="center">
	      <a href="../fonction/super.php"><h3><input type="button" value="retour" class="btn btn-danger" style="width:200px;height:80px;text-align:center"/></h3></a>
	   </div>
	   </fieldset>
	   <marquee><h3><img src="../image/IMG_50.gif" alt="colombe">Merci d\'avoir choisi le CCA </h3></marquee>
	   
	   </body>
  
  </html>';
}  else {
echo '<html>
  <head>
    <link rel="stylesheet" type = "text/css" href="css/css/blueimp-gallery.min.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/boostrap.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap.min.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap-image-gallery.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap-image-gallery.min.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap-responsive.min.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/bootstrap-responsive.css">
	   <link rel="stylesheet" type = "text/css" href="css/css/docs.css">
	   <link rel="stylesheet" type = "text/css" href="css/cus-icons.css">
	   
	  
	   <script src="css/js/jquery.js"></script>
       <script src="css/js/bootstrap.min.js "></script>
       <script src="css/js/bootstrap-typeahead.js "></script>
   </head>
     <body bgcolor="silver">
	  <fieldset width="80%" style="background-color:rgb(226,226,199);border-radius:10px;border:2px solid groove;">
	   
	   <h1 align="center" style="font-family:arial,sans-serif;font-style:italic;opacity:0.8;color:silent;"> Une erreur est survenue, veuillez réessayer</h1><br><br>
	   <div align="center">
	      <a href="../fonction/super.php"><h3> <i class="icon-white icon-pencil"></i> <input type="button" value="retour" class="btn btn-warning" style="width:200px;height:80px;text-align:center"/></h3></a>
	   </div>
	   </fieldset>
	   <marquee><h3><img src="../image/IMG_50.gif" alt="colombe">Merci d\' avoir choisi le CCA</h3></marquee>
	   
	   </body>
  
  </html>';
					   
}		   ?>
    <?php
		  } ?>	
						 
						    
						