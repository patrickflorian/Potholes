<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 15/06/2017
 * Time: 14:52
 */
class Tranche
{
    protected $code;
    protected $code_filiere;
    protected $valeur;
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    protected function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCodeFiliere()
    {
        return $this->code_filiere;
    }

    /**
     * @param mixed $code_filiere
     */
    protected function setCode_Filiere($code_filiere)
    {
        $this->code_filiere = $code_filiere;
    }

    /**
     * @return mixed
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param mixed $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

}