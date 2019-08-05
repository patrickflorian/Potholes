<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 01/06/2017
 * Time: 21:55
 */
class DispenseManager
{
    protected $db;

    /**
     * DispenseManager constructor.
     * @param $db
     */
    public function __construct( PDO $db)
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

    public function add($code_filiere,$code_matiere){
        $q=$this->db->prepare("insert into dispense VALUES ('$code_filiere','$code_matiere')");
        $q->execute();
    }
    public function delete($code_filiere,$code_matiere){
        $this->db->exec("DELETE FROM dispense WHERE code_filiere ='$code_filiere' AND code_matiere = '$code_matiere'");
    }

    public function getMatiereByFiliere( $code_filiere){
        $listMatiere = array();
        $requete= $this->db->query("SELECT matiere.* from matiere,dispense WHERE matiere.code_matiere=dispense.code_matiere AND dispense.code_filiere='$code_filiere'");
        while($matiere = $requete->fetch(PDO::FETCH_ASSOC)){
            $listMatiere[] = new matiere($matiere);
        }
        $requete->closeCursor();
        return $listMatiere;
    }
}