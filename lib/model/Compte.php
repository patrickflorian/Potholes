<?php

/**************************************************************************
* Source File	:  COMPTE.php
* Author                   :  CECIMA
* Project name         :  projet* Created                 :  24/04/2002
* Modified   	:  24/05/2017
* Description	:  Definition of the class COMPTE
**************************************************************************/




class Compte
{
	//Attributes
		
	 
	var $LOGIN; // type : string
	var $PASSWORD; // type : string
	var $TYPE; // type : string

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
	 public function getLogin()
	 {
		 return $this->LOGIN;
	 }
	 public function getPassword()
	 {
		 return $this->PASSWORD;
	 }
	 public function getType()
	 {
		 return $this->TYPE;
	 }

	 //setters
	 public function setLogin($login)
	 {
		  $this->LOGIN=$login;
	 }
	 public function setPassword($pwd)
	 {
		  $this->PASSWORD=$pwd;
	 }
	 public function setType($type)
	 {
		  $this->TYPE=$type;
	 }


} // End Class COMPTE


?>

