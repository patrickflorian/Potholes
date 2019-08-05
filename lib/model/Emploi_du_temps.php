<?php

/**************************************************************************
* Source File	:  emploi_du_temps.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class emploi_du_temps
**************************************************************************/




class emploi_du_temps 			
{
	//Attributes
		
	protected $NUM_EVAL;
	protected $CODE_MATIERE;
	protected $ID_EMPLOI; // type : int
	protected $DATE_DEBUT; // type : string
	protected $DUREE; // type : string
	protected $DATE_FIN; // type : string
	protected $TYPE; // type : string
	protected $EVENEMENT; // type : string

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

	 public function getIdEmploi()
	 {
		  return $this->ID_EMPLOI;
	 }
	 public function getDateDebut()
	 {
		 return $this->DATE_DEBUT;
	 }
	 public function getDuree()
	 {
		 return $this->DUREE;
	 }
	 public function getDateFin()
	 {
		 return $this->DATE_FIN;	
	 }
	 public function getType()
	 {
		 return $this->TYPE;
	 }
	 public function getEvenement()
	 {
		 return $this->EVENEMENT;
	 }

    /**
     * @return mixed
     */
    public function getNUM_EVAL()
    {
        return $this->NUM_EVAL;
    }

    /**
     * @return mixed
     */
    public function getCODE_MATIERE()
    {
        return $this->CODE_MATIERE;
    }


	 //setters

	 public function setId_Emploi($id)
	 {
		 $this->ID_EMPLOI=$id;
	 }
	 public function setDate_Debut($date)
	 {
		 $this->DATE_DEBUT=$date;
	 }
	 public function setDuree($duree)
	 {
		 $this->DUREE=$duree;
	 }
	 public function setDate_Fin($date)
	 {
		 $this->DATE_FIN=$date;
	 }
	 public function setType($type)
	 {
		 $this->TYPE=$type;
	 }
	 public function setEvenement($evt)
	 {
		 $this->EVENEMENT=$evt;
	 }

    /**
     * @param mixed $NUM_EVAL
     */
    public function setNUM_EVAL($NUM_EVAL)
    {
        $this->NUM_EVAL = $NUM_EVAL;
    }

    /**
     * @param mixed $CODE_MATIERE
     */
    public function setCODE_MATIERE($CODE_MATIERE)
    {
        $this->CODE_MATIERE = $CODE_MATIERE;
    }




} // End Class emploi_du_temps


?>

