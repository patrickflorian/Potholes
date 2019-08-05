<?php

/**************************************************************************
* Source File	:  annee_scolaire.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class annee_scolaire
**************************************************************************/




class AnneeScolaire
{
	//Attributes
		
	 
	var $ANNEE; // type : string
	var $CLOTURE; // type : bool

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
	 
	 //getter
	 public function getAnnee()
	 {
		 return $this->ANNEE;
	 }
	 public function getCloture()
	 {
		 return $this->CLOTURE;
	 }

	 //setters

	 public function setAnnee($annee)
	 {
		 $this->ANNEE=$annee;
	 }
	 public function setCloture($bool)
	 {
		 $this->CLOTURE=$bool;
	 }

} // End Class annee_scolaire


?>

