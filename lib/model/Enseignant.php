<?php

/**************************************************************************
* Source File	:  enseignant.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  24/05/2017
* Description	:  Definition of the class enseignant
**************************************************************************/




class enseignant 			
{
	//Attributes
		
	protected $LOGIN;
	protected $CODE_ADRESSE;
	protected $ID_IMG;
	protected $NUM_ENSEIGNANT; // type : string
	protected $NOM; // type : string
	protected $PRENOM; // type : string
	protected $CNI; // type : int
	protected $SEXE; // type : string
	protected $DOB; // type : string
	protected $QUALITE; // type : string

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

	 public function getNumEnseignant()
	 {
		 return $this->NUM_ENSEIGNANT;
	 }
	 public function getNom()
	 {
		 return $this->NOM;
	 }
	 public function getPrenom()
	 {
		 return $this->PRENOM;
	 }
	 public function getCni()
	 {
		 return $this->CNI;	
	 }
	 public function getSexe()
	 {
		 return $this->SEXE;
	 }

    /**
     * @return mixed
     */
    public function getDOB()
    {
        return $this->DOB;
    }

	 public function getQualite()
	 {
		 return $this->QUALITE;
	 }

    /**
     * @return mixed
     */
    public function getLOGIN()
    {
        return $this->LOGIN;
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


	 //setters

	 public function setNum_Enseignant($num)
	 {
		 $this->NUM_ENSEIGNANT=$num;
	 }
	 public function setNom($nom)
	 {
		 $this->NOM=$nom;
	 }
	 public function setPrenom($prenom)
	 {
		 $this->PRENOM=$prenom;
	 }
	 public function setCni($cni)
	 {
		 $this->CNI=$cni;
	 }
	 public function setSexe($sexe)
	 {
		 $this->SEXE=$sexe;
	 }
	 public function setDob($dob)
	 {
		 $this->DOB=$dob;
	 }
	 public function setQualite($qualite)
	 {
		 $this->QUALITE=$qualite;
	 }

    /**
     * @param mixed $LOGIN
     */
    public function setLOGIN($LOGIN)
    {
        $this->LOGIN = $LOGIN;
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
	

} // End Class enseignant


?>

