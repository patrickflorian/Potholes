<?php

    class DisciplineManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
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
        public function add(discipline  $discipline){
            $q= $this->db->prepare("insert into discipline VALUES (:num_disc,:num_eleve,:type,:valeur,YEAR(NOW()))");
            $q->bindValue(':num_disc',$discipline->getNumDiscipline(),PDO::PARAM_INT);
            $q->bindValue(':nul_eleve',$discipline->getNum_Eleve());
            $q->bindValue(':type',$discipline->getType());
            $q->bindValue(':valeur',$discipline->getValeur());
            $q->execute();
        }

        public function update(discipline $discipline){
            $q= $this->db->prepare("update discipline set type=:type,valeur=:valeur WHERE num_eleve=:num_eleve AND num_discipline=:num_disc");
            $q->bindValue(':num_disc',$discipline->getNumDiscipline(),PDO::PARAM_INT);
            $q->bindValue(':nul_eleve',$discipline->getNum_Eleve());
            $q->bindValue(':type',$discipline->getType());
            $q->bindValue(':valeur',$discipline->getValeur());
            $q->execute();
        }

        public function delete($num_disc){
            $this->db->exec("DELETE FROM discipline WHERE num_discipline=$num_disc");
        }

        public function getList($debut = -1, $limite = -1){
            $listeDisc= array();
            $sql= "select * from discipline ORDER BY type ASC ";
            if ($debut != -1 || $limite != -1) {
                $sql .= ' LIMIT ' . (int)$limite . ' OFFSET ' . (int)
                    $debut;
            }
            $requete = $this->db->query($sql);
            while($disc=$requete->fetch(PDO::FETCH_ASSOC)){
                $listeDisc []= new discipline($disc);
            };
            $requete->closeCursor();
            return $listeDisc;
        }
        public function getListByEleve($eleve){
            $listDisc = array();
            $req = $this->db->query("SELECT * FROM discipline WHERE num_eleve = '$eleve'");
            while($disc = $req->fetch(PDO::FETCH_ASSOC)){
                $listDisc[]= new discipline($disc);
            };
            $req->closeCursor();
            return $listDisc;
        }

        public function getUnique($disc){
            $q= $this->db->prepare("SELECT *FROM discipline WHERE  num_discipline = $disc");
            return new discipline($q->fetch(PDO::FETCH_ASSOC));
        }

    }


?>