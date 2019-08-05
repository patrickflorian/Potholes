<?php

/**************************************************************************
* Source File	:  discipline.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class discipline
**************************************************************************/




class discipline 			
{
	//Attributes


    protected $NUM_DISCIPLINE; // type : int
	protected $num_eleve;
    protected $TYPE; // type : string
    protected $VALEUR; // type : string
    protected $ANNEE; // type : string

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

	 public function getNumDiscipline()
	 {
		 return $this->NUM_DISCIPLINE;
	 }	
	public function getType()
	{
		return $this->TYPE;
	}
	public function getValeur()
	{
		return $this->VALEUR;
	}
	public function getAnnee()
	{
		return $this->ANNEE;
	}

    /**
     * @return mixed
     */
    public function getNum_Eleve()
    {
        return $this->num_eleve;
    }

	//setters

	public function setNum_Discipline($num)
	{
		$this->NUM_DISCIPLINE=$num;
	}
	public function setType($TYPE)
	{
		$this->TYPE=$type;
	}
	public function setAnnee($ANNEE)
	{
		$this->ANNEE=$ANNEE;
	}public function setValeur($VALEUR)
	{
		$this->VALEUR=$VALEUR;
	}

    /**
     * @param mixed $num_eleve
     */
    public function setNum_Eleve($num_eleve)
    {
        $this->num_eleve = $num_eleve;
    }


} // End Class discipline


?>

