<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 01/06/2017
 * Time: 08:24
 */
class FraisManager
{
    protected $db;
    public function __construct(PDO $db)
    {
        $this->db=$db;
    }

    /**
     * @param Frais $frais
     * @return null
     */
    public function add(Frais $frais){
        $q = $this->db->prepare("insert into frais VALUES (:code_frais,
                                                                        :valeur,
                                                                        :etat,
                                                                        :num_eleve,
                                                                        :code_filiere,
                                                                        :tranche
                                                                        )");
        $q->bindValue(':tranche',$frais->getTranche());
        $q->bindValue(':code_frais',$frais->getCODE_FRAIS());
        $q->bindValue(':tranche',$frais->getTranche());
        $q->bindValue(':valeur',$frais->getVALEUR(),PDO::PARAM_INT);
        $q->bindValue(':etat',$frais->getETAT());
        $q->bindValue(':num_eleve',$frais->getNUM_ELEVE());
        $q->bindValue(':code_filiere',$frais->getCODE_FILIERE());
        $q->execute();
    }
    public function update(Frais $frais){
        $q = $this->db->prepare("update frais set code_frais  =:code_frais,
                                                                      valeur = :valeur,
                                                                       etat =:etat,
                                                                        num_eleve=:num_eleve,
                                                                        code_filiere=:code_filiere,
                                                                       tranche= :tranche
                                                                        ");
        $q->bindValue(':tranche',$frais->getTranche());
        $q->bindValue(':code_frais',$frais->getCODE_FRAIS());
        $q->bindValue(':tranche',$frais->getTranche());
        $q->bindValue(':valeur',$frais->getVALEUR(),PDO::PARAM_INT);
        $q->bindValue(':etat',$frais->getETAT());
        $q->bindValue(':num_eleve',$frais->getNUM_ELEVE());
        $q->bindValue(':code_filiere',$frais->getCODE_FILIERE());
        $q->execute();
    }
    public function delete($code_frais){
        $this->db->exec("delete from frais WHERE code_frais = '$code_frais'");
    }

    public function getListEleveByTranche($tranche,$code_filiere){
        $list = array();
        $result = $this->db->query("select e.* from frais,eleve e WHERE e.num_eleve=frais.num_eleve AND tranche ='$tranche' AND code_filiere='$code_filiere'");
        while($eleve = $result->fetch(PDO::FETCH_ASSOC)){
            $list[] = new Eleve($eleve);
        }
        $result->closeCursor();
        return $list;
    }


    public function getListFraisByEleve($eleve,$filiere){
        $list = array();
        $result = $this->db->query("select * from frais  WHERE num_eleve='$eleve' AND code_filiere='$filiere'");
        while($frais = $result->fetch(PDO::FETCH_ASSOC)){
            $list[] = new Frais($frais);
        }
        $result->closeCursor();
        return $list;
    }

}