<?php

    class EnseignantManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }
        public function Count(){
            return $this->db->query('SELECT COUNT(*) FROM wigefor.public.enseignant')->fetchColumn();
        }
        public function add(enseignant $en){
            $q=$this->db->prepare("insert into enseignant VALUES (
                                                :num_enseignant,
                                                :login,
                                                :code_adresse,
                                                :id_img,
                                                :nom,
                                                :prenom,
                                                :cni,
                                                :sexe,
                                                :dob,
                                                :qualite
                                            )");
            $q->bindValue(':num_enseignant',$en->getNumEnseignant());
            $q->bindValue(':login',$en->getLOGIN());
            $q->bindValue(':code_adresse',$en->getCODE_ADRESSE(),PDO::PARAM_INT);
            $q->bindValue(':id_img',$en->getID_IMG(),PDO::PARAM_INT);
            $q->bindValue(':nom',$en->getNom());
            $q->bindValue(':prenom',$en->getPrenom());
            $q->bindValue(':sexe',$en->getSexe());
            $q->bindValue(':cni',$en->getCni());
            $q->bindValue(':dob',$en->getDOB());
            $q->bindValue(':qualite',$en->getQualite());
            $q->execute();
        }
        public function update(enseignant $en){
            $q=$this->db->prepare("UPDATE FROM enseignant  set 
                                              num_enseignant= :num_enseignant,
                                               enseignant.login= :login_ens,
                                               code_adresse =:code_adresse,
                                               id_img= :id_img,
                                                nom= :nom,
                                               prenom= :prenom,
                                               cni= :cni,
                                               sexe= :sexe,
                                               dob= :dob,
                                               qualite= :qualite
                                            ");
            $q->bindValue(':num_enseignant',$en->getNumEnseignant());
            $q->bindValue(':login_ens',$en->getLOGIN());
            $q->bindValue(':code_adresse',$en->getCODE_ADRESSE(),PDO::PARAM_INT);
            $q->bindValue(':id_img',$en->getID_IMG(),PDO::PARAM_INT);
            $q->bindValue(':nom',$en->getNom());
            $q->bindValue(':prenom',$en->getPrenom());
            $q->bindValue(':cni',$en->getCni());
            $q->bindValue(':sexe',$en->getSexe());
            $q->bindValue(':dob',$en->getDOB());
            $q->bindValue(':qualite',$en->getQualite());
            $q->execute();
        }
        public function delete($num_enseignant){
            $this->db->exec("DELETE FROM enseignant WHERE num_enseignant = '$num_enseignant'");

        }
        public function getLoginByenseignant($num_enseignant){
            return $this->db->exec("SELECT compte.login ,compte.password ,compte.type from comtpe,enseignant where enseignant.login=compte.login AND enseignant.num_enseignant='$num_enseignant'");
        }
        public function getAdresseByenseignant($num_enseignant){
            return $this->db->exec("SELECT a.* from enseignant,adresse a WHERE enseignant.num_enseignant='$num_enseignant' AND enseignant.code_adresse=a.code_adresse");
        }
        public function getImgByenseignant($num_enseignant){
            return $this->db->exec("SELECT i.* from enseignant,photo i WHERE enseignant.num_enseignant='$num_enseignant'AND photo.id_img=enseignant.id_img");
        }
        public function getUnique($num_enseignant){
            $q= $this->db->prepare("SELECT * from enseignant WHERE  enseignant.num_enseignant ='$num_enseignant'");
            $q->execute();
            return new enseignant($q->fetch(PDO::FETCH_ASSOC));
        }
        public function CountByYear($year){
            $year.='/01/01';
            return $this->db->query("SELECT COUNT(*) FROM enseignant WHERE date_trunc('year',date_inscription)=TIMESTAMP '$year'")->fetchColumn();
        }

        public function newMatricule(){
            $num = date('y') ;
            $num .="WSFENS".($this->Count()+1);
            return $num;
        }
        public function getList($filiere,$annee,$matiere){
            $annee .= '/01/01';
            $list = array();
            $req = $this->db->query( "select en.* from enseignant en ,enseigne e where en.num_enseignant =e.num_enseignant and e.code_matiere='$matiere' AND date_trunc('year',en.date_inscription) = TIMESTAMP'$annee' ORDER BY en.num_enseignant ASC " );
            while($ens  = $req ->fetch(PDO::FETCH_ASSOC)){
                $list[]= new enseignant($ens);
            }
            $req->closeCursor();
            return $list;
        }
        function GetAll(){
            $list = array();
            $req = $this->db->query( "select * from enseignant  ORDER BY num_enseignant ASC " );
            while($ens  = $req ->fetch(PDO::FETCH_ASSOC)){
                $list[]= new enseignant($ens);
            }
            $req->closeCursor();
            return $list;
        }
    }


?>