<?php

/**************************************************************************
* Source File	:  salles.php
* Author                   :  Patrick
* Project name         :  projet* Created                 :  23/05/2017
* Modified   	:  26/05/2017
* Description	:  Definition of the class salles
**************************************************************************/




class salles 			
{
	//Attributes
	protected $code_campus;
	protected  $NUM_SALLE; // type : string
	protected $SITUATION; // type : string
    protected $EFFECTIF; // type : int

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

	public function getNumSalle()
	{
		return $this->NUM_SALLE;		
	}
	public function getSITUATION()
	{
		return $this->SITUATION;
	}
	public function getEffectif()
	{
		return $this->EFFECTIF;	
	}

	//setters

	public function setNum_Salle($num)
	{
		$this->NUM_SALLE=$num;
	}

	public function setEffectif($EFFECTIF)
	{
		$this->EFFECTIF=$EFFECTIF;
	}
	public function setSITUATION($SITUATION)
	{
		$this->SITUATION=$SITUATION;
	}

    /**
     * @return mixed
     */
    public function getCodeCampus()
    {
        return $this->code_campus;
    }

    /**
     * @param mixed $code_campus
     */
    public function setCode_Campus($code_campus)
    {
        $this->code_campus = $code_campus;
    }

} // End Class salles


?>

