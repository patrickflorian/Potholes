<?php

    class MatiereManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }
        public function add(matiere $matiere){
            $q=$this->db->prepare("insert into matiere VALUES (:codematiere,:libelle,:coef)");
            $q->bindValue(':codematiere',$matiere->getCodeMatiere());
            $q->bindValue(':libelle',$matiere->getLibelle());
            $q->bindValue(':coef',$matiere->getCoefficient(),PDO::PARAM_INT);
            $q->execute();
        }
        public function update(matiere $matiere){
            $q=$this->db->prepare("update matiere set libelle=:libelle,coef=:coef WHERE code_matiere =:codematiere");
            $q->bindValue(':codematiere',$matiere->getCodeMatiere());
            $q->bindValue(':libelle',$matiere->getLibelle());
            $q->bindValue(':coef',$matiere->getCoefficient(),PDO::PARAM_INT);
            $q->execute();
        }

        public  function delete($code_matiere){
            $this->db->exec("delete from matiere where code_matiere='$code_matiere'");
        }

        public function getList($filiere){
            $list=array();
            $result =$this->db->query("select * from matiere ,dispense WHERE matiere.code_matiere = dispense.code_matiere and dispense.code_filiere='$filiere' ORDER BY libelle DESC ");
            while($matiere = $result->fetch(PDO::FETCH_ASSOC)){
                $list[] = new matiere($matiere);
            }
            $result->closeCursor();
            return $list;
        }
        public function getUnique($code_matiere){

               $q= $this->db->prepare("select * from matiere where code_matiere ='$code_matiere'");
            $q->execute();
               return new matiere($q->fetch(PDO::FETCH_ASSOC));
        }
        public function getEnseignant($code_matiere){
            $q= $this->db->prepare("select enseignant.* from enseignant,enseigne where enseigne.code_matiere ='$code_matiere'");
            $q->execute();
            return new enseignant($q->fetch(PDO::FETCH_ASSOC));
        }
        public function Count(){
            return $this->db->query("SELECT COUNT(*) FROM matiere ")->fetchColumn();
        }
    }


