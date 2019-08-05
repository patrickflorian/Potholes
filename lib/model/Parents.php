<?php

/**************************************************************************
* Source File	:  PARENT.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  24/05/2017
* Description	:  Definition of the class PARENT
**************************************************************************/




class Parents 			
{
	//Attributes
		
	 protected $NUM_ELEVE;//type :char
	protected $NUM_PARENT; // type : int
	protected $NOM; // type : string
	protected $PROFESSION; // type : string
	protected $NUM_TEL; // type : int
	protected $EMAIL; // type : string
	protected $cni;

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

    /**
     * @return mixed
     */
    public function getNUM_ELEVE()
    {
        return $this->NUM_ELEVE;
    }
	 
	 
	 // getters

	 public function getNumParent()
	 {
		 return $this->NUM_PARENT;
	 }

	 public function getNom()
	 {
		 return $this->NOM;
	 }

	 public function getProfession()
	 {
		 return $this->PROFESSION;
	 }
	 public function getNumeroTelephone()
	 {
		 return $this->NUM_TEL;
	 }
	 public function getEmail()
	 {
		 return $this->EMAIL;
	 }

//setters
	 public function setNum_Parent($num)
	 {
		 $this->NUM_PARENT=$num;
	 }
	 public function setNom($nom)
	 {
		 $this->NOM= $nom;
	 }
	 public function setProfession($prof)
	 {
		 $this->PROFESSION= $prof;
	 }
	 public function setNum_Tel($num)
	 {
		 $this->NUM_TEL=$num;
	 }
	 public function setEmail($email)
	 {
		 $this->EMAIl=$email;
	 }

    /**
     * @param mixed $NUM_ELEVE
     */
    public function setNUM_ELEVE($NUM_ELEVE)
    {
        $this->NUM_ELEVE = $NUM_ELEVE;
    }

    /**
     * @return mixed
     */
    public function getCni()
    {
        return $this->cni;
    }

    /**
     * @param mixed $cni
     */
    public function setCni($cni)
    {
        $this->cni = $cni;
    }
	 
	

} // End Class PARENT

?>

