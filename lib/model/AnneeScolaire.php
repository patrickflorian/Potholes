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
		
	 
	var $annee; // type : string
	var $cloture; // type : bool

	//Operations
    public function __construct($data){

        $this->annee = $data['annee'];
        $this->cloture = $data['cloture'];
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
		 return $this->annee ;
	 }
	 public function getCloture()
	 {
		 return $this->cloture;
	 }

	 //setters
	 public function setAnnee($annee)
	 {
		 $this->annee=$annee;
	 }
	 public function setCloture($bool)
	 {
		 $this->cloture=$bool;
	 }

} // End Class annee_scolaire

?>
