<?php

/**************************************************************************
* Source File	:  adresse.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  24/05/2017
* Description	:  Definition of the class adresse
**************************************************************************/




class Adresse
{
	//Attributes
		
	 
	var $CODE_ADRESSE; // type : int
	var $VILLE; // type : string
	var $QUARTIER; // type : string
	var $REGION; // type : string
	var $NUM_TEL; // type : int
	var $EMAIL; // type : string

	//Operations
	public function __construct($data){
		 
		  $this->hydrate($data);
	 } 

	 public function hydrate($data){
		  foreach($data AS $key=>$value){
		    $method = 'set'.ucfirst($key);
		    if(method_exists($this,$method)){
			     $this->$method ($value); 
		}  
	}
	 } 
	 
	 //getters

	 public function getCodeAdresse()
	 {
		 return $this->CODE_ADRESSE;
	 }
	 public function getVille()
	 {
		 return $this->VILLE;
		
	 }
	 public function getQuartier()
	 {
		 return $this->QUARTIER;	

	 }
	 public function getRegion()
	 {
		 return $this->REGION;
	 }
	 public function getNumTelephone()
	 {
		 return $this->NUM_TEL;
	 }
	 public function getEmail()
	 {
		 return $this->EMAIL;
	 }

	 //setters

	 public function setCode_Adresse($code)
	 {
		  $this->CODE_ADRESSE=$code;
	 }
	 public function setVille($ville)
	 {
		  $this->VILLE=$ville;
		
	 }
	 public function setQuartier($quartier)
	 {
		  $this->QUARTIER=$quartier;	

	 }
	 public function setRegion($region)
	 {
		  $this->REGION=$region;
	 }
	 public function setNum_Tel($num)
	 {
		  $this->NUM_TEL=$num;
	 }
	 public function setEmail($email)
	 {
		  $this->EMAIL=$email;
	 }
	

} // End Class adresse


?>

