<?php

/**************************************************************************
* Source File	:  FILIERE.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class FILIERE
**************************************************************************/




class FILIERE 			
{
	//Attributes
		
	 
	var $CODE_FILIERE; // type : string
	var $libelle; // type : string
	var $information; // type : string
	var $DATE_CREATION; // type : string
	var $duree;
	var $type;

	//Operations
	public function __construct($data){
		 
		  $this->hydrate($data);
	 }

    /**
     * @param $data
     */
    public function hydrate($data){
        foreach($data AS $key=>$value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method ($value);
            }
        }
    }
	 
	 //Getters

	 public function getCodeFiliere()
	 {
		 return $this->CODE_FILIERE;
	 }
	 public function getLibelle()
	 {
		 return $this->libelle;
	 }
	 public function getInformation()
	 {
		 return $this->information;
	 }
	 public function getDateCreation()
	 {
		 return $this->DATE_CREATION;
	 }
	 
	 //setters

	 public function setCode_Filiere($code)
	 {
		 $this->CODE_FILIERE=$code;
	 }
	 public function setLibelle($libelle)
	 {
		 $this->libelle=$libelle;
	 }
	 public function setInformation($info)
	 {
		 $this->information=$info;
	 }
	 public function setDate_Creation($date)
	 {
		 $this->DATE_CREATION=$date;
	 }/**
 * @return mixed
 */
public function getDuree()
{
    return $this->duree;
}/**
 * @param mixed $duree
 */
public function setDuree($duree)
{
    $this->duree = $duree;
}
public function getType()
{
	return $this->type;
}
public function setType($type)
{
	 $this->type = $type;
}
} // End Class FILIERE


?>

