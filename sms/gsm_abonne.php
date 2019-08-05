<?php
$num=$_POST['num'];
$msg=$_POST['mesg'];

if (isset($num) && isset($msg) ){
// On Charge la classe port série 
require ("php_serial.class.php");
               // Let's start the class
              $serial = new phpSerial();
              // First we must specify the device. This works on both linux and windows (if
              // your linux serial device is /dev/ttyS0 for COM1, etc)
          
             $serial->deviceSet("COM10");
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
		   
          $serial->deviceClose(); 
  
	}
	else
	echo('veillez verifuer si vous avez saisie le mseg ou le num du contact');

/*function envoiesms($tabinfo)
{
	if(is_array($tabinfo))
	{  //print_r($tabinfo);
	    $i=0;
		for($i=0;$i<count($tabinfo);$i++)
		{
			
			$numero=$tabinfo[$i]["numero"];
			$message=$tabinfo[$i]["message"];
			//print($numero);
			 $serial = new phpSerial();
			$serial->deviceSet("COM3");
			$serial->confBaudRate(9600); //Baud rate: 9600
			$serial->confParity("none");  //Parity (this is the "N" in "8-N-1")
			$serial->confCharacterLength(8); //Character length (this is the "8" in "8-N-1")
			$serial->confStopBits(1);  //Stop bits (this is the "1" in "8-N-1")
			$serial->deviceOpen(); // Ouverture du port
				// To write into
			$serial->sendMessage("\rATZ\r");  // Initialisation de l'adaptateur
			sleep(1);
			$serial->sendMessage("AT+CMGF=1\r"); // Pour le format texte 
			sleep(1);
			$serial->sendMessage("AT+CMGS=\"{$numero}\"\r");// Pour choisir le numéro du destinataire
			sleep(1);
			$serial->sendMessage("{$message}\x1A\r"); //  Ensuite écrivez votre message suivi d'un Ctrl+Z 
				$serial->deviceClose(); // Fermeture du port

		}
		//echo"".$numero;
	     echo"<script type='text/javascript'> alert('Vos sms on été envoyés');</script>";
		
	}
	else{   echo"<script type='text/javascript'> alert('Vérifiez les paramètres d'envoie des sms');</script>";	}
}

*/

?>