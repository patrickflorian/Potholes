<?php

    class AnneeScolaireManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }

        /**
         * @return PDO
         */
        public function getDb()
        {
            return $this->db;
        }

        /**
         * @param PDO $db
         */
        public function setDb(PDO $db)
        {
            $this->db = $db;
        }


        public function add(AnneeScolaire $a){
            $q=$this->db->prepare("INSERT INTO annee_scolaire 
                                            VALUES (:annee,0 )");
            $q->bindValue(':annee',$a->getAnnee());
            $q->execute();
        }

        public function update(AnneeScolaire $a){
            $q=$this->db->prepare("UPDATE annee_scolaire set cloture = :cloture WHERE annee=:annee");
            $q->bindValue(':annee',$a->getAnnee());
            $q->bindValue(':cloture',$a->getCloture(),PDO::PARAM_IN);
            $q->execute() ;
        }

        public function getList(){
            $listAnnee =[];
            $q=$this->db->query('select * from wigefor.public.annee_scolaire ORDER BY annee DESC');
            while ($annee = $q->fetch(PDO::FETCH_ASSOC)){
                $listAnnee[]=new AnneeScolaire($annee);
            }
            return $listAnnee;
        }
        public function getUnique($annee){
            $q = $this->db->prepare("SELECT (nextval('annee_scolaire_annee_seq'),cloture) FROM annee_scolaire WHERE annee='$annee'");
            $q->execute();
            return new AnneeScolaire($q->fetch(PDO::FETCH_ASSOC));
        }
        public function getCurrentYear(){
            return $this->db->query("SELECT annee from annee_scolaire ORDER BY annee DESC")->fetchColumn(0);
        }


    }



