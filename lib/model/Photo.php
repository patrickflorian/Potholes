<?php

/**************************************************************************
* Source File	:  photo.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class photo
**************************************************************************/




class Photo
{
	//Attributes
		
	 
	protected $ID_IMG; // type : int
	protected $NOM_IMG; // type : string
	protected $TAILLE_IMG; // type : float
	protected $TYPE_IMG; // type : string
	protected $DESC_IMG; // type : string
	protected $BLOB_IMG; // type : Null

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
	 public function getID_IMG(){
		 return $this->ID_IMG;
	 }  
	 public function getNOM_IMG(){
		 return $this->NOM_IMG;
	 } 	
	 public function getTAILLE_IMG(){
		 return $this->TAILLE_IMG;
	 } 
	 public function getTYPE_IMG(){
		 return $this->TYPE_IMG;
	 } 
	 public function getDESC_IMG(){
		 return $this->DESC_IMG;
	 } 
	 public function getBLOB_IMG(){
		 return $this->BLOB_IMG;
	 } 

	////setters 

	public function setID_IMG($id){
		   $this->ID_IMG=$id;
	 }  
	 public function setNOM_IMG($nom){
		   $this->NOM_IMG=$nom;
	 } 	
	 public function setTAILLE_IMG($taille){
		   $this->TAILLE_IMG=$taille;
	 } 
	 public function setTYPE_IMG($type){
		   $this->TYPE_IMG=$type;
	 } 
	 public function setDESC_IMG($desc){
		   $this->DESC_IMG=$desc;
	 } 
	 public function setBLOB_IMG($blob){
		   $this->BLOB_IMG=$blob;
	 } 

} // End Class photo


?>

