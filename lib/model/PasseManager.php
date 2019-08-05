<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 02/06/2017
 * Time: 19:45
 */
class PasseManager
{
    protected $db;

    /**
     * PasseManager constructor.
     * @param $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    public function add(Passe $p){
        $q = $this->db->prepare("insert into passe(num_eleve, code_filiere, solde) VALUES (:num_eleve,:code_filiere,:solde)");
        $q->bindValue(':num_eleve' , $p->getNUM_ELEVE());
        $q->bindValue(':code_filiere',$p->getCODE_FILIERE());
        $q->bindValue(':solde',$p->getSolde());
        $q->execute();
    }
    public  function  update(Passe $p){
        $q = $this->db->prepare("update passe set code_filiere=:code_filiere , solde=:solde,etat=:etat where num_eleve=:num_eleve");
        $q->bindValue(':num_eleve' , $p->getNUM_ELEVE());
        $q->bindValue(':code_filiere',$p->getCODE_FILIERE());
        $q->bindValue(':solde',$p->getSolde(),PDO::PARAM_INT);
        $q->bindValue(':etat',$p->getEtat(),PDO::PARAM_BOOL);
        $q->execute();
    }
    public function delete($num_eleve){
        $this->db->exec("delete from passe where num_eleve = '$num_eleve' ");
    }
    public function getFiliereByEleve($num_eleve){
        return new FILIERE($this->db->query("select filiere.* from passe,filiere  WHERE num_eleve ='$num_eleve'")->fetch(PDO::FETCH_ASSOC));
    }

    public function GetEleveByFiliere($code_filiere){
        $list =array();
        $req = $this->db->query("select e.* from passe,eleve e  WHERE e.num_eleve = passe.num_eleve AND passe.code_filiere='$code_filiere'");
        while ($eleve= $req->fetch(PDO::FETCH_ASSOC)){
            $list[]= new Eleve($eleve);
        }
        $req->closeCursor();
        return $list;
    }


    public function getFraisByEleve($eleve,$filiere){
        $result = $this->db->query("select * from passe WHERE num_eleve='$eleve' AND code_filiere='$filiere'");
        $frais = $result->fetch(PDO::FETCH_ASSOC);
        $result->closeCursor();
        return new Passe($frais);
    }
    public function getStudentSolde($annee,$formation,$eleve){
        return $this->db->query("select solde from passe WHERE num_eleve= '$eleve' And code_filiere='$formation'")->fetchColumn();
    }
}