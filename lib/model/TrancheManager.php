<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 15/06/2017
 * Time: 14:52
 */
class TrancheManager
{
    protected $bd;

    /**
     * TranchManager constructor.
     * @param $bd
     */
    public function __construct(PDO $bd)
    {
        $this->bd = $bd;
    }

    public function add(Tranche $t){
        $q = $this->bd->prepare("INSERT INTO tranche values(:code,:code_filiere,:valeur)");
        $q->bindValue(':code',$t->getCode());
        $q->bindValue(':code_filiere',$t->getCodeFiliere());
        $q->bindValue(':valeur',$t->getValeur(),PDO::PARAM_INT);
        $q->execute();
    }
    public function update(Tranche $t){
        $q = $this->bd->prepare("update tranche set valeur =:valeur,code_filiere=:code_filiere where code=:code");
        $q->bindValue(':code',$t->getCode());
        $q->bindValue(':code_filiere',$t->getCodeFiliere());
        $q->bindValue(':valeur',$t->getValeur(),PDO::PARAM_INT);
        $q->execute();
    }

    public function getList($code_filiere){
        $list = array();
        $req = $this->bd->query("select * from tranche where code_filiere='$code_filiere' ORDER BY code ASC ");
        while($t  = $req ->fetch(PDO::FETCH_ASSOC)){
            $list[]= new Tranche($t);
        }
        $req->closeCursor();
        return $list;
    }
    public function Count($filiere){
        return $this->bd->query("SELECT COUNT(*) FROM tranche WHERE code_filiere='$filiere'")->fetchColumn();
    }

    /**
     * @param $filiere
     * @return string
     */
    public function getSum($filiere){
        return $this->bd->query("select sum(valeur) from tranche WHERE code_filiere='$filiere'")->fetchColumn();
    }


}