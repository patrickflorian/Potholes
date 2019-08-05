<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 01/06/2017
 * Time: 22:14
 */

class EnseigneManager
{
    protected $db;

    /**
     * EnseigneManager constructor.
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

    public  function add($num_enseignant,$code_matiere){
        $q=$this->db->prepare("INSERT INTO enseigne VALUES (:num_enseinant,:code_matiere,now())");

        $q->bindValue(':num_enseinant',$num_enseignant);
        $q->bindValue(':code_matiere',$code_matiere);
        $q->execute();
    }

    public  function update($num_enseignant,$code_matiere){
        $q=$this->db->prepare("UPDATE enseigne SET num_enseignant=:num_enseinant,code_matiere=:code_matiere");
        $q->bindValue(':num_enseinant',$num_enseignant);
        $q->bindValue(':code_matiere',$code_matiere);
        $q->execute();
    }

    public function delete($num_enseignant,$code_matiere){
        $this->db->exec("DELETE FROM enseigne WHERE num_enseignant = '$num_enseignant' and code_matiere = '$code_matiere'");

    }
    public function getMatiereByEnseignant($num_enseignant){
        $listeMatiere = array();
        $req= $this->db->query("SELECT m.* FROM  enseigne ,matiere m where enseigne.num_enseignant='$num_enseignant' and m.code_matiere=enseigne.code_matiere");
        while($matiere = $req->fetch(PDO::FETCH_ASSOC)){
            $listeMatiere[]=new matiere($matiere);
        }
        $req->closeCursor();
        return $listeMatiere;
    }
    public function getEnseignantByMatiere($code_matiere){
        $listeEns = array();
        $req= $this->db->query("SELECT m.* FROM  enseigne ,enseignant m where enseigne.code_matiere='$code_matiere' and m.num_enseignant=enseigne.num_enseignant");
        while($ens = $req->fetch(PDO::FETCH_ASSOC)){
            $listeEns[]=new enseignant($ens);
        }
        $req->closeCursor();
        return $listeEns;
    }


}