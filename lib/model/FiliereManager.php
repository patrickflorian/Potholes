<?php

    class FiliereManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }
        public function add(FILIERE $filiere){
            $q=$this->db->prepare("INSERT INTO wigefor.public.filiere VALUES (:code_filiere,
                                                                          :libelle,
                                                                          :information,
                                                                          :date_creation,
                                                                          :duree)");
            $q->bindValue(':code_filiere',$filiere->getCodeFiliere(),PDO::PARAM_STR);
            $q->bindValue(':libelle',$filiere->getLibelle(),PDO::PARAM_STR);
            $q->bindValue(':information',$filiere->getInformation(),PDO::PARAM_STR);
            $q->bindValue(':date_creation',$filiere->getDateCreation());
            $q->bindValue(':duree',$filiere->getDuree(),PDO::PARAM_INT);
            $q->execute();
        }

        public function update(FILIERE $filiere){
            $q=$this->db->prepare("UPDATE filiere set code_filiere=:code_filiere,
                                                                    libelle=      :libelle,
                                                                     information=     :information,
                                                                     date_creation=    :date_creation)");
            $q->bindValue(':code_filiere',$filiere->getCodeFiliere());
            $q->bindValue(':libelle',$filiere->getLibelle());
            $q->bindValue(':information',$filiere->getInformation());
            $q->bindValue(':date_creation',$filiere->getDateCreation());
            $q->bindValue(':duree',$filiere->getDuree(),PDO::PARAM_INT);
            $q->execute();
        }

        public function delete($code_filiere){
            $this->db->exec("DELETE FROM filiere WHERE code_filiere = '$code_filiere'");

        }
        public function getList($type){
            $listeFiliere = array();
            $result= $this->db->query("SELECT * from filiere where type='$type' ORDER BY libelle DESC  ");
            while($filiere = $result->fetch(PDO::FETCH_ASSOC)){
                $listeFiliere[] = new FILIERE($filiere);
            }
            $result->closeCursor();
            return $listeFiliere;
        }

        public function getUnique($code){
            $filiere = null;
           $q= $this->db->query("SELECT * from filiere WHERE  code_filiere ='$code'");
           while($fil=$q->fetch(PDO::FETCH_ASSOC)){
               $filiere = new FILIERE($fil);
           }
           $q->closeCursor();
            return $filiere;

        }

        public function Count(){
            return $this->db->query('SELECT COUNT(*) FROM filiere')->fetchColumn();
        }
        public function countByType($type){
            return $this->db->query("SELECT COUNT(*) FROM filiere where type = '$type'")->fetchColumn();
        }

        public function montant($code_filiere){
            return $this->db->query("select sum(valeur)from tranche WHERE code_filiere='$code_filiere'")->fetchColumn();
        }

        public function getListEleve($code_filiere)
        {

        }
    }


?>