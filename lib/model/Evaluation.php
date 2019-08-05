<?php

/**************************************************************************
* Source File	:  EVALUATION.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class EVALUATION
**************************************************************************/




class EVALUATION 			
{
	//Attributes
		
	 
	var $num_eval; // type : int
	var $type; // type : string
	var $date; // type : string
	var $pourcentage; // type : int

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
	 public function getNumEval()
	 {
		 return $this->num_eval;
	 }	
	 public function getType()
	 {
		 return $this->type;
	 }
	 public function getdate()
	 {
		 return $this->date;
	 }
	 public function getPourcentage()
	 {
		 return $this->pourcentage;
	 }

	 //Setters

	 public function setNum_Eval($num)
	 {
		 $this->num_eval=$num;
	 }
	 public function setType($type)
	 {
		 $this->type=$type;
	 }
	 public function setDate($date)
	 {
		 $this->date=$date;
	 }
	 public function setPourcentage($pourcentage)
	 {
		 $this->pourcentage=$pourcentage;
	 }
	 
	

} // End Class EVALUATION


?>

