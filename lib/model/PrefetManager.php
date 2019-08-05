<?php

    class PrefetManager{
        protected $db;
        public function __construct( PDO $db)
        {
            $this->db=$db;
        }

        public function add(PREFET $prefet){
            $q=$this->db->prepare("INSERT INTO prefet VALUES (:num_prefet,
                                                                          :login,
                                                                          :id_img,
                                                                          :code_adresse,
                                                                          :nom,
                                                                          :prenom,
                                                                          :sexe,
                                                                          :cni,
                                                                          :dob
                                                                         )");
            $q->bindValue(':num_prefet',$prefet->getNumPrefet());
            $q->bindValue(':code_adresse',$prefet->getCODE_ADRESSE(),PDO::PARAM_INT);
            $q->bindValue(':id_img',$prefet->getID_IMG(),PDO::PARAM_INT);
            $q->bindValue(':login',$prefet->getLOGIN());
            $q->bindValue(':nom',$prefet->getNom());
            $q->bindValue(':prenom',$prefet->getPrenom());
            $q->bindValue(':sexe',$prefet->getSexe());
            $q->bindValue(':dob',$prefet->getDob());
            $q->bindValue(':cni',$prefet->getCNI(),PDO::PARAM_INT);
            $q->execute();
        }

        public  function update(PREFET $prefet){
            $q=$this->db->prepare("UPDATE prefet set           
                                                                          login= :login,
                                                                          id_img=:id_img,
                                                                          code_adresse=:code_adresse,
                                                                          nom=:nom,
                                                                          prenom=:prenom,
                                                                          sexe=:sexe,
                                                                          cni=:cni,
                                                                          dob=:dob 
                                                                          WHERE num_prefet =:num_prefet
                                                                         ");
            $q->bindValue(':num_prefet',$prefet->getNumPrefet());
            $q->bindValue(':code_adresse',$prefet->getCODE_ADRESSE(),PDO::PARAM_INT);
            $q->bindValue(':id_img',$prefet->getID_IMG(),PDO::PARAM_INT);
            $q->bindValue(':login',$prefet->getLOGIN());
            $q->bindValue(':nom',$prefet->getNom());
            $q->bindValue(':prenom',$prefet->getPrenom());
            $q->bindValue(':sexe',$prefet->getSexe());
            $q->bindValue(':dob',$prefet->getDob());
            $q->bindValue(':cni',$prefet->getCNI(),PDO::PARAM_INT);
            $q->execute();
        }

        public function delete($num_prefet){
            $this->db->exec("DELETe FROM prefetrefet WHERE num_prefet = '$num_prefet'");

        }
        public function getLoginByPrefet($num_prefet){
            return $this->db->exec("SELECT compte.* from compte,prefet where prefet.login=compte.login AND prefet.num_prefet='$num_prefet'");
        }
        public function getAdresseByprefet($num_prefet){
            return $this->db->exec("SELECT a.* from prefet,adresse a WHERE prefet.num_prefet='$num_prefet' AND prefet.code_adresse=a.code_adresse");
        }
        public function getImgByprefet($num_prefet){
            return $this->db->exec("SELECT i.* from prefet,photo i WHERE prefet.num_prefet='$num_prefet'AND photo.id_img=prefet.id_img");
        }
        public function getUnique($num_prefet){
            $q= $this->db->prepare("SELECT * from prefet WHERE  prefet.num_prefet ='$num_prefet'");
            $q->execute();
            return new PREFET($q->fetch(PDO::FETCH_ASSOC));
        }
        public function getList(){
            $list = array();
            $req = $this->db->query("select * from prefet ORDER BY nom DESC");
            while($prefet  = $req ->fetch(PDO::FETCH_ASSOC)){
                $list[]= new  PREFET($prefet);
            }
            $req->closeCursor();
            return $list;
        }
    }


?>