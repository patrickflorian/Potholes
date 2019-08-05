<?php

    class AdresseManager{
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

        /**
         *
         */


        public function add(Adresse $adress){
            $q=$this->db->prepare("INSERT INTO adresse(ville, quartier, region, num_tel, email) VALUES (:ville,:quartier,:region,:tel,:email)");
            $q->bindValue(':ville',$adress->getVille());
            $q->bindValue(':quartier',$adress->getQuartier());
            $q->bindValue(':region',$adress->getRegion());
            $q->bindValue(':tel',$adress->getNumTelephone(),PDO::PARAM_INT);
            $q->bindValue(':email',$adress->getEmail());
            $q->execute();
            $req2 = "select currval('adresse_code_adresse_seq')";
            $adress->setCode_Adresse ($this->db->query("$req2")->fetchColumn());
            return $adress;
        }

        public function count()
        {
            return $this->db->query('SELECT COUNT(*) FROM public.adresse')->fetchColumn();
        }

        public function update($adress){

            $q=$this->db->prepare("UPDATE adresse SET ville=:ville,quartier=:quartier,region=:region,num_tel=:tel,email=:email WHERE code_adresse=:code_adresse");
            $q->bindValue(':code_adresse',$adress->getCodeAdresse());
            $q->bindValue(':ville',$adress->getVille());
            $q->bindValue(':quartier',$adress->getQuartier());
            $q->bindValue(':region',$adress->getRegion());
            $q->bindValue(':tel',$adress->getNumTelephone());
            $q->bindValue(':email',$adress->getEmail());
            $q->execute();
        }

        public  function delete($code){
            $this->db->exec("DELETE FROM adresse WHERE code_adresse=$code");
        }

        public function getList($debut = -1, $limite = -1){
            $listeAdress = array();
            $sql="SELECT *FROM adresse ORDER BY code_adresse DESC ";
            if ($debut != -1 || $limite != -1) {
                $sql .= ' LIMIT ' . (int)$limite . ' OFFSET ' . (int)
                    $debut;
            }
            $requete = $this->db->query($sql);
            while ($adress=$requete->fetch(PDO::FETCH_ASSOC));
            {
                $listeAdress[] = new Adresse($adress);
            }
            $requete->closeCursor();
            return $listeAdress;
        }
        public function getUnique($code){
            $q=$this->db->prepare("SELECT * FROM adresse WHERE code_adresse=:code_adresse");
            $q->bindValue(':code_adresse',$code);
            $q->execute();
            return new Adresse($q->fetch(PDO::FETCH_ASSOC));
        }

    }

?>