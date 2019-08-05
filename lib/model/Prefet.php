<?php

/**************************************************************************
* Source File	:  PREFET.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  24/05/2017
* Description	:  Definition of the class PREFET
**************************************************************************/




class PREFET 			
{
	//Attributes
		
	protected $login;//type : char
	protected $ID_IMG; // type :int
	protected $CODE_ADRESSE; //type :int
	protected $NUM_PREFET; // type : string
	protected $NOM; // type : string
	protected $PRENOM; // type : string
	protected $SEXE; // type : string
	protected $CNI; // type : int
	protected $DOB; // type : string

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

	 public function getNumPrefet()
	 {
		 return $this->NUM_PREFET;
	 }
	 public function getNom()
	 {
		 return $this->NOM;
	 }	
	 public function getPrenom()
	 {
		 return $this->PRENOM;
	 }
	public function getSexe()
	{
		return $this->SEXE;
	}
	public function getCNI()
	{
		return $this->CNI;
	}
	public function getDateNaissance()
	{
		return $this->DOB;
	}


	//-setters

	public function setNum_Prefet($num)
	 {
		 $this->NUM_PREFET=$num;
	 }
	 public function setNom($nom)
	 {
		$this->NOM=$nom;
	 }	
	 public function setPrenom($prenom)
	 {
		    $this->PRENOM=$prenom;
	 }
	public function setSexe($sexe)
	{
		   $this->SEXE=$sexe;
	}
	public function setCni($cni)
	{
		   $this->CNI=$cni;
	}
	public function setDob($dob)
	{
		   $this->DOB=$dob;
	}

} // End Class PREFET


?>

