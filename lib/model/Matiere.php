<?php

/**************************************************************************
* Source File	:  matiere.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class matiere
**************************************************************************/




class matiere 			
{
	//Attributes
		
	protected $NUM_ELEVE;
	protected $NUM_EVAL;
	protected $CODE_MATIERE; // type : string
	protected $LIBELLE; // type : string
	protected $COEF; // type : int

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

	 public function getCodeMatiere()
	 {
		 return $this->CODE_MATIERE;
	 }
	 public function getLibelle()
	 {
		 return $this->LIBELLE;
	 }
	 public function getCoefficient()
	 {
		 return $this->COEF;
	 }

	 //setters

	 public function setCode_Matiere($code)
	 {
		 $this->CODE_MATIERE=$code;
	 }
	 public function setLibelle($libelle)
	 {
		 $this->LIBELLE=$libelle;
	 }
	 public function setCoef($coef)
	 {
		 $this->COEF=$coef;
	 }
	

} // End Class matiere




