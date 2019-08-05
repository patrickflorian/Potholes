<?php

/**************************************************************************
* Source File	:  FRAIS.php
* Author                   :  Patrick  Noumbissi
* Project name         :  Non enregistr�* Created                 :  31/05/2017
* Modified   	:  31/05/2017
* Description	:  Definition of the class FRAIS
**************************************************************************/




class Passe
{
	//Attributes
	protected $etat; //type : bool
    protected $NUM_ELEVE;
    protected $CODE_FILIERE;
	protected $solde; // type : int

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
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
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
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * @param mixed $solde
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }





} // End Class Passe


?>

