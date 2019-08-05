<?php

    class EleveManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }
        public function Count(){
            return $this->db->query('SELECT COUNT(*) FROM eleve')->fetchColumn();
        }
        public function CountByYear($year){
            $year.='/01/01';
            return $this->db->query("SELECT COUNT(*) FROM eleve WHERE date_trunc('year',date_inscription)=TIMESTAMP '$year'")->fetchColumn();
        }
        public function add(Eleve $eleve){
            $q=$this->db->prepare("INSERT INTO eleve(num_eleve, code_adresse, id_img, login, nom, prenom, sexe, dob, lieu, niveau, date_inscription, status, cni)
                                                        VALUES (:num_eleve,
                                                                          :code_adresse,
                                                                          :id_img,
                                                                          :login,
                                                                          :nom,
                                                                          :prenom,
                                                                          :sexe,
                                                                          :dob,
                                                                          :lieu,
                                                                          :niveau,
                                                                          :date_ins,
                                                                          :state,:cni)");
            $q->bindValue(':num_eleve',$eleve->getNumEleve());
            $q->bindValue(':code_adresse',$eleve->getCODE_ADRESSE(),PDO::PARAM_INT);
            $q->bindValue(':id_img',$eleve->getID_IMG(),PDO::PARAM_INT);
            $q->bindValue(':login',$eleve->getLOGIN());
            $q->bindValue(':nom',$eleve->getNom());
            $q->bindValue(':prenom',$eleve->getPrenom());
            $q->bindValue(':sexe',$eleve->getSexe());
            $q->bindValue(':dob',$eleve->getDob());
            $q->bindValue(':lieu',$eleve->getLieu());
            $q->bindValue(':niveau',$eleve->getNiveau());
            $q->bindValue(':state',$eleve->getStatus());
            $q->bindValue(':cni',$eleve->getCNI());
            $q->bindValue(':date_ins',$eleve->getDateInscription());
            $q->execute();
        }

        public  function update(Eleve $eleve){
            $q=$this->db->prepare("UPDATE eleve SET
                                                              code_adresse=:code_adresse,
                                                              id_img=:id_img,
                                                              login=:login,
                                                              nom=:nom,
                                                              prenom=:prenom,
                                                              sexe=:sexe,
                                                              dob=:dob,
                                                              lieu=:lieu,
                                                              niveau=:niveau,
                                                              status=:state,
                                                              cni = :cni WHERE num_eleve = :num_eleve");
            $q->bindValue(':num_eleve',$eleve->getNumEleve());
            $q->bindValue(':code_adresse',$eleve->getCODE_ADRESSE());
            $q->bindValue(':id_img',$eleve->getID_IMG());
            $q->bindValue(':login',$eleve->getLOGIN());
            $q->bindValue(':nom',$eleve->getNom());
            $q->bindValue(':prenom',$eleve->getPrenom());
            $q->bindValue(':sexe',$eleve->getSexe());
            $q->bindValue(':dob',$eleve->getDob());
            $q->bindValue(':lieu',$eleve->getLieu());
            $q->bindValue(':niveau',$eleve->getNiveau());
            $q->bindValue(':state',$eleve->getStatus());
            $q->bindValue(':cni',$eleve->getCNI());

            $q->execute();
        }

        public function delete($num_eleve){
            $this->db->exec("DELETe FROM eleve WHERE num_eleve = '$num_eleve'");

        }
        public function getLoginByEleve($num_eleve){
            return $this->db->exec("SELECT compte.* from compte,eleve where eleve.login=compte.login AND eleve.num_eleve='$num_eleve'");
        }
        public function getAdresseByEleve($num_eleve){
            return $this->db->exec("SELECT a.* from eleve,adresse a WHERE eleve.num_eleve='$num_eleve' AND eleve.code_adresse=a.code_adresse");
        }
        public function getImgByEleve($num_eleve){
            return $this->db->exec("SELECT i.* from eleve,photo i WHERE eleve.num_eleve='$num_eleve'AND photo.id_img=eleve.id_img");
        }
        public function getUnique($num_eleve){

            $q= $this->db->prepare("SELECT * from eleve WHERE  eleve.num_eleve ='$num_eleve'");
            $q->execute();
            return  new Eleve($q->fetch(PDO::FETCH_ASSOC));
        }
        public function getList($filiere,$annee){
            $annee .= '/01/01';
            $list = array();
            $req = $this->db->query( "select e.* from eleve e,passe where e.num_eleve = passe.num_eleve AND passe.code_filiere = '$filiere' AND date_trunc('year',e.date_inscription) = TIMESTAMP'$annee' ORDER BY nom ASC " );
            while($eleve  = $req ->fetch(PDO::FETCH_ASSOC)){
                $list[]= new  Eleve($eleve);
            }
            $req->closeCursor();
            return $list;
        }
        public function newMatricule(){
            $num = date('y') ;
            $num .="WSF".($this->Count()+1);
            return $num;
        }

        public function countPerYear(){
            $list = array();
            $req = $this->db->query( "select count(e.num_eleve) as nombre,date_trunc('year',e.date_inscription) as  annee from eleve e GROUP BY annee" );
            while($item  = $req ->fetch(PDO::FETCH_ASSOC)){
                $list[]= $item;
            }
            $req->closeCursor();
            return $list;
        }

    }


?>