<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 01/06/2017
 * Time: 21:51
 */
class CorrespondManager
{
    protected $db;

    /**
     * CorrespondManager constructor.
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

    /**
     * @param FILIERE $f
     * @param AnneeScolaire $a
     */
    public function add(FILIERE $f, AnneeScolaire $a){
        $q = $this->db->prepare("insert into correspond VALUES (:code_filiere,:annee)");
        $q->bindValue(':annee',$a->getAnnee());
        $q->bindValue(':code_filiere',$f->getCodeFiliere());
        $q->execute();
    }

    public  function update(FILIERE $f, AnneeScolaire $a){
        $q = $this->db->prepare("update correspond set code_filiere = :code_filiere,annee= :annee");
        $q->bindValue(':annee',$a->getAnnee());
        $q->bindValue(':code_filiere',$f->getCodeFiliere());
        $q->execute();
    }

    public function getListFiliereByYear($annee){
        $listeFiliere=array();
        $requete = $this->db->query("SELECT *FROM filiere WHERE code_filiere IN (
                                                      SELECT code_filiere from correspond WHERE annee= '$annee')");
        while ($f = $requete->fetch(PDO::FETCH_ASSOC)) {
            $listeFiliere[] = new FILIERE($f);
        }
        $requete->closeCursor();
        return $listeFiliere;
    }


}
?>