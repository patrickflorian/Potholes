<?php

/**************************************************************************
* Source File	:  campus.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  23/05/2017
* Description	:  Definition of the class campus
**************************************************************************/




class campus 			
{
	//Attributes
		
	 
	var $CODE_CAMPUS; // type : string
	var $LIBELLE_CAMPUS; // type : string

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

	 public function getCodeCampus()
	 {
		 return $this->CODE_CAMPUS;
	 }
	 public function getLibelleCampus()
	 {
		 return $this->LIBELLE_CAMPUS;
	 }
	
	 //setters

	 public function setCode_Campus($code)
	 {
		 $this->CODE_CAMPUS=$code;
	 }
	 public function setLibelle_Campus($libelle)
	 {
		 $this->LIBELLE_CAMPUS=$libelle;
	 }

} // End Class campus


?>

