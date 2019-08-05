<?php

/**************************************************************************
* Source File	:  FRAIS.php
* Author                   :  Patrick  Noumbissi
* Project name         :  Non enregistr�* Created                 :  31/05/2017
* Modified   	:  31/05/2017
* Description	:  Definition of the class FRAIS
**************************************************************************/




class Frais
{
	//Attributes
	protected $tranche;
    protected $NUM_ELEVE;
    protected $CODE_FILIERE;
	protected $CODE_FRAIS; // type : string
	protected $VALEUR; // type : int
	protected $ETAT;

    /**
     * FRAIS constructor.
     */
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
    public function getCODE_FRAIS()
    {
        return $this->NUM_FRAIS;
    }

    /**
     * @param mixed $NUM_FRAIS
     */
    public function setCODE_FRAIS($NUM_FRAIS)
    {
        $this->NUM_FRAIS = $NUM_FRAIS;
    }

    /**
     * @return mixed
     */
    public function getVALEUR()
    {
        return $this->VALEUR;
    }

    /**
     * @param mixed $VALEUR
     */
    public function setVALEUR($VALEUR)
    {
        $this->VALEUR = $VALEUR;
    }

    /**
     * @return mixed
     */
    public function getETAT()
    {
        return $this->ETAT;
    }

    /**
     * @param mixed $ETAT
     */
    public function setETAT($ETAT)
    {
        $this->ETAT = $ETAT;
    }

    /**
     * @return mixed
     */
    public function getNUM_ELEVE()
    {
        return $this->NUM_ELEVE;
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
    public function getCODE_FILIERE()
    {
        return $this->CODE_FILIERE;
    }

    /**
     * @param mixed $CODE_FILIERE
     */
    public function setCODE_FILIERE($CODE_FILIERE)
    {
        $this->CODE_FILIERE = $CODE_FILIERE;
    }

    /**
     * @return mixed
     */
    public function getTranche()
    {
        return $this->tranche;
    }

    /**
     * @param mixed $tranche
     */
    public function setTranche($tranche)
    {
        $this->tranche = $tranche;
    } // type : bool

	//Operations
	 	
	 
	

} // End Class FRAIS


?>

