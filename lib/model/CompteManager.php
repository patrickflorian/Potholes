<?php

    class CompteManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }

        /**
         * @param mixed $db
         */
        public function setDb($db)
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

        public function add(Compte $compte){
            $q=$this->db->prepare("INSERT INTO compte(LOGIN,PASSWORD,TYPE)
                                   VALUES (
                                   :login,:pwd,:Type_compte 
                                   )");
            $q->bindValue(':login',$compte->getLogin());
            $q->bindValue(':pwd',$compte->getPassword());
            $q->bindValue(':Type_compte',$compte->getType());
            $q->execute();
        }

        /**
         * @param $login
         */
        public function update(Compte $compte){
            $q=$this->db->prepare("UPDATE compte SET PASSWORD=:pwd,TYPE=:type_compte WHERE LOGIN=:login ");
            $q->bindValue(':login',$compte->getLogin());
            $q->bindValue(':pwd',$compte->getPassword());
            $q->bindValue(':type_compte',$compte->getType());
            $q->execute();
        }
        public function delete($login){
            $this->db->exec("DELETE FROM compte WHERE login='$login'");
        }

        public  function  getUnique( $login , $pwd){
            $requete = $this->db->prepare("select * from compte WHERE login='$login' AND password='$pwd'");
            $requete->execute();
            return new Compte($requete->fetch(PDO::FETCH_ASSOC));
        }

    }


?>