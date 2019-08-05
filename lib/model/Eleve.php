<?php

/**************************************************************************
* Source File	:  eleve.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class eleve
**************************************************************************/




class Eleve
{
	//Attributes

	protected $CODE_ADRESSE; //type  : string
	protected $ID_IMG;
	protected $LOGIN;
	protected $NUM_ELEVE; // type : string
	protected $NOM; // type : string
    protected $PRENOM; // type : string
    protected $SEXE; // type : string
    protected $DOB; // type : string
    protected $LIEU; // type : string
    protected $NIVEAU; // type : string
    protected $GROUPE_SANGUIN; // type : string
    protected $RHESUS; // type : string
    protected $DATE_INSCRIPTION; // type : string
    protected $STATUS; // type : string
	protected $CNI;

    /**
     * @return mixed
     */
    public function getCNI()
    {
        return $this->CNI;
    }

    /**
     * @param mixed $CNI
     */
    public function setCNI($CNI)
    {
        $this->CNI = $CNI;
    }

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

	 public function getNumEleve()
	 {
		 return $this->NUM_ELEVE;
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
	 public function getDob()
	 {
		 return $this->DOB;
	 }
	 public function getLieu()
	 {
		 return $this->LIEU;
	 }
	 public function getNiveau()
	 {
		 return $this->NIVEAU;
	 }
	 public function getGroupeSanguin()
	 {
		 return $this->GROUPE_SANGUIN;
	 }
	 public function getRhesus()
	 {
		 return $this->RHESUS;
	 }
	 public function getDateInscription()
	 {
		 return $this->DATE_INSCRIPTION;
	 }
	 public function getStatus()
	 {
		 return $this->STATUS;
	 }

    /**
     * @return mixed
     */
    public function getCODE_ADRESSE()
    {
        return $this->CODE_ADRESSE;
    }

    /**
     * @return mixed
     */
    public function getID_IMG()
    {
        return $this->ID_IMG;
    }

    /**
     * @return mixed
     */
    public function getLOGIN()
    {
        return $this->LOGIN;
    }



	 //setters
	 public function setNum_Eleve($num)
	 {
		 $this->NUM_ELEVE=$num;
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
	 public function setDob($dob)
	 {
		 $this->DOB=$dob;
	 }
	 public function setLieu($lieu)
	 {
		 $this->LIEU=$lieu;
	 }
	 public function setNiveau($niveau)
	 {
		 $this->NIVEAU=$niveau;
	 }
	 public function setGroupe_Sanguin($groupe)
	 {
		 $this->GROUPE_SANGUIN=$groupe;
	 }
	 public function setRhesus($rhesus)
	 {
		 $this->RHESUS=$rhesus;
	 }
	 public function setDate_Inscription($date)
	 {
		 $this->DATE_INSCRIPTION=$date;
	 }
	 public function setStatus($status)
	 {
		 $this->STATUS=$status;
	 }

    /**
     * @param mixed $CODE_ADRESSE
     */
    public function setCODE_ADRESSE($CODE_ADRESSE)
    {
        $this->CODE_ADRESSE = $CODE_ADRESSE;
    }

    /**
     * @param mixed $ID_IMG
     */
    public function setID_IMG($ID_IMG)
    {
        $this->ID_IMG = $ID_IMG;
    }

    /**
     * @param mixed $LOGIN
     */
    public function setLOGIN($LOGIN)
    {
        $this->LOGIN = $LOGIN;
    }


} // End Class eleve


?>

