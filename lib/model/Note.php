<?php

/**************************************************************************
* Source File	:  NOTE.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class NOTE
**************************************************************************/




class NOTE 			
{
	//Attributes
		
	protected $NUM_ELEVE;//type :char
	protected $NUM_EVAL;//type : int
	protected $id_note; // type : int
	protected $VALEUR; // type : float
	protected $code_matiere;

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

    /**
     * @return mixed
     */
    public function getNUM_EVAL()
    {
        return $this->NUM_EVAL;
    }

	 ///getters

	 public function getIdNote()
	 {
		 return $this->id_note;
	 }	
	 public function getValeur()
	 {
		return $this->VALEUR;
	 }
	 public function getCodeMatiere()
	 {
		 return $this->code_matiere;
	 }
	 

    /**
     * @param mixed $NUM_ELEVE
     */
    public function setNUM_ELEVE($NUM_ELEVE)
    {
        $this->NUM_ELEVE = $NUM_ELEVE;
    }

    /**
     * @param mixed $NUM_EVAL
     */
    public function setNUM_EVAL($NUM_EVAL)
    {
        $this->NUM_EVAL = $NUM_EVAL;
    }

	 //setters

	 public function setId_Note($id)
	 {
		 $this->id_note=$id;
	 }
	 public function setvaleur($value)
	 {
		 $this->VALEUR=$value;
	 }
	 public function setcode_matiere($code)
	 {
		 $this->code_matiere=$code;
	 }
	
	 
	

} // End Class NOTE


?>

