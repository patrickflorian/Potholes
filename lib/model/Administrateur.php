<?php

/**************************************************************************
* Source File	:  administrateur.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  24/05/2017
* Description	:  Definition of the class administrateur
**************************************************************************/




class Administrateur 			
{
	//Attributes
		
	 
	private  $CODE_ADMIN; // type : string
	private $login;
	private $id_img;
	private $code_adresse;
	private $NOM; // type : string
	private $PRENOM; // type : string
	private $SEXE; // type : string
	private $CNI; // type : int
	private $DOB; // type : string

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
	 public function getCodeAdmin()
	 {
		 return $this->CODE_ADMIN;
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
	public function getCni()
	{
		return $this->CNI;
	}
	public function getDob()
	{
		return $this->DOB;
	}

    /**
     * @return mixed
     */
    public function getCode_Adresse()
    {
        return $this->code_adresse;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getId_Img()
    {
        return $this->id_img;
    }

//setters
	 public function setCode_Admin($code)
	 {
		  $this->CODE_ADMIN=$code;
	 }
	 public function setNom($nom)
	 {
		  $this->NOM=$nom;
	 }

	public function setPrenom( $prenom)
	{
		 $this->PRENOM=$prenom;
	}
	public function setSexe( $sexe)
	{
		 $this->SEXE;
	}
	public function setCni($cni)
	{
		 $this->CNI=$cni;
	}
	public function setDob($dob)
	{
		$this->DOB=$dob;
	}
	public function setId_img($img)
    {
		 $this->id_img=$img;
    }



} // End Class administrateur
