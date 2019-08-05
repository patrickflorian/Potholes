<?php
function read()
	{
		exec('mode COM4: baud=19200 data=8 stop=1 parity=n xon=on');
		if ($ser=fopen("COM4:","r+")) 
		{
		 $ret="";

		 fputs( $ser, "AT+CMGF=1" . "\r");     
		 usleep(500000);
		 fputs( $ser, "AT+CNMI" . "\r"); //tranfert sms de sim->modem directement     
		 usleep(500000);
		 fputs( $ser, 'AT+CPMS= "ME", "SM", "ME"' . "\r");     //parametrage , stockage et nombre max, on stocke ds le telephone
		 usleep(500000);
		 for($i=0;$i<5;$i++) 
		  $ret .= fgets( $ser);  //lire le sms
		  echo $ret = fgets( $ser);
		  list( $nbr_sms) = explode(",", $ret);
		  list( $rien ,$nbr_sms) = explode(":", $nbr_sms);
		  if( $nbr_sms <= 0 )
		  goto no_sms;
		  
		  $ret = "";
		 fputs( $ser, 'AT+CMGL="ALL"' . "\r"); //lire tous les sms, commande entreee 
		 usleep(500000);
			 /*for($i=0;$i<2;$i++) 
				{        
					*/ $ret .= fgets( $ser);
					 $ret = "";
					 //if( $i == 2)  //lecture du premier sms, si +sieurs
						//{	
							$ret .= fgets( $ser); // lecture du sms a utilise
							$ret .= fgets( $ser);
					//	}

				//}   
				//echo $ret;	 	 
		  list($delete_1) = explode(",", $ret); //recuperation de l'index' a supprimer
		 if(! list( $del, $delete ) = explode(":", $delete_1))
			return 0;
		 fputs($ser, "AT+CMGD=$delete\r"); 
		 usleep(500000);
		fclose($ser); 
		return $ret;
		}
	else
no_sms:	   fclose($ser);
			return 0;

	}
	
function send( $tel, $sms )
	{
		exec('mode COM9: baud=19200 data=8 stop=1 parity=n xon=on');
		//r+ : Ouvre en lecture et écriture, et place le pointeur au début 
		if ($fh=fopen("mode.txt","r+")) 
		 { 
			fputs($fh,"AT\n\r");
			sleep(1);
			fputs($fh,"AT+CMGF=1\r");
			sleep(1);
			fputs($fh,"AT+CMGS=\"$tel\"\r");
			sleep(1);
			fputs($fh,"$sms\032");
			sleep(1);
			fclose($fh);
			echo "ok";
				return true; 
		 } 
		  echo 'no';
			return false;
	}
	
$tel=691359390; $msg="severin te dit bonjour";	
	
//$rep=send($tel, $msg);
	
?>