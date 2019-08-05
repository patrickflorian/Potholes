<?php
$num=$_GET['num'];
$msg=$_GET['mesg'];

if (isset($num) && isset($msg) ){
// On Charge la classe port série 
require ( "php_serial.class.php");
// Let's start the class
$serial = new phpSerial();
// First we must specify the device. This works on both linux and windows (if
// your linux serial device is /dev/ttyS0 for COM1, etc)
$serial->deviceSet("COM4");
$serial->confBaudRate(460800); //Baud rate: 9600
$serial->confParity("none");  //Parity (this is the "N" in "8-N-1")
$serial->confCharacterLength(8); //Character length (this is the "8" in "8-N-1")
$serial->confStopBits(1);  //Stop bits (this is the "1" in "8-N-1")
$serial->deviceOpen(); // Ouverture du port
// To write into
$serial->sendMessage("\rATZ\r");  // Initialisation de l'adaptateur
sleep(1);
$serial->sendMessage("AT+CMGF=1\r"); // Pour le format texte 
sleep(1);
$serial->sendMessage("AT+CMGS=\"{$num}\"\r");// Pour choisir le numéro du destinataire
sleep(1);
$serial->sendMessage("{$msg}\x1A\r"); //  Ensuite écrivez votre message suivi d’un Ctrl+Z 
$serial->deviceClose(); // Fermeture du port
$succes="Traitement en cours...<img src='Index1_files/hacker.gif' width=150 height=150>";
	//code pour modifier l'etat du modem
	// include("config.inc.php");
	// $req1=mysql_query("select * from modem where numSerie='$id'");
	// $ligne1=mysql_fetch_array($req1);
	// if($ligne1['etat']=="active"){
	// $req=mysql_query("update modem set etat='inactive' where numSerie='$id'");
	// }
	// elseif($ligne1['etat']=="inactive"){
	// $req=mysql_query("update modem set etat='active' where numSerie='$id'");
	echo "succès";
	}
	else
	{
	  echo "echec";
}
?>