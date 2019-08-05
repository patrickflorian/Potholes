<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 02/06/2017
 * Time: 19:39
 */
class OccupeManager
{
    protected $db;

    /**
     * OccupeManager constructor.
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

    public function add($code_filiere, $code_salle)
    {
        $q = $this->db->prepare("INSERT INTO occupe VALUES (:num_salle,:code_filiere)");
        $q->bindValue(':num_salle', $code_salle);
        $q->bindValue(':code_filiere', $code_filiere);
        $q->execute();
    }

    public function updateSalleByFiliere($code_filiere, $code_salle)
    {
        $q = $this->db->exec("UPDATE  occupe SET num_salle=:num_salle WHERE code_filiere=:code_filiere");
        $q->bindValue(':num_salle', $code_salle);
        $q->bindValue(':code_filiere', $code_filiere);
        $q->execute();
    }

    public function updateFiliereBySalle($code_salle, $code_filiere)
    {
        $q = $this->db->exec("UPDATE  occupe SET code_filiere=:code_filiere WHERE num_salle=:num_salle");
        $q->bindValue(':num_salle', $code_salle);
        $q->bindValue(':code_filiere', $code_filiere);
        $q->execute();
    }

    public function getList()
    {
        $list = array();
        $req = $this->db->query("SELECT * FROM occupe ORDER BY num_salle DESC ");
        while ($elt = $req->fetch(PDO::FETCH_ASSOC)) {
            $list[] = $elt;
        }
        $req->closeCursor();
        return $list;
    }

    public function getSalleByFiliere($code_filiere)
    {
        $list = array();
        $req = $this->db->query("select s.* from occupe o,salles s WHERE o.code_filiere ='$code_filiere'AND o.num_salle = s.num_salle ORDER BY num_salle DESC  ");
        while ($elt = $req->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new salles($elt);
        }
        $req->closeCursor();
        return $list;
    }
}