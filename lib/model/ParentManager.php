<?php

    class ParentManager{
        protected $db;
        public function __construct( PDO $db)
        {
            $this->db=$db;
        }


    public function add(Parents $parents){
            $q= $this->db->prepare("insert into parents(num_eleve, nom, profession, num_tel, email, cni) VALUES ( 
                                                        :num_eleve,
                                                        :nom,
                                                        :prof,
                                                        :num_tel,
                                                        :email,
                                                        :cni)");
            $q->bindValue(':num_eleve',$parents->getNUM_ELEVE());
            $q->bindValue(':nom', $parents->getNom());
            $q->bindValue(':prof',$parents->getProfession());
            $q->bindValue(':num_tel', $parents->getNumeroTelephone(),PDO::PARAM_INT);
            $q->bindValue(':email',$parents->getEmail());
            $q->bindValue(':cni',$parents->getCni());
            $q->execute();
            $parents->hydrate(array('num_parent'=>$this->db->lastInsertId()));
            return $parents;
    }

    public function  update(Parents $parents){
        $q= $this->db->prepare("update parents SET 
                                                        nom=:nom,
                                                        profession=:prof,
                                                        num_tel=:num_tel,
                                                        email=:email ,
                                                        cni = :cni
                                                        WHERE  num_parent=:num_parent");
        $q->bindValue(':num_parent',$parents->getNumParent(),PDO::PARAM_INT);
        $q->bindValue(':nom', $parents->getNom());
        $q->bindValue(':prof',$parents->getProfession());
        $q->bindValue(':num_tel', $parents->getNumeroTelephone(),PDO::PARAM_INT);
        $q->bindValue(':email',$parents->getEmail());
        $q->bindValue(':cni',$parents->getCni());
        $q->execute();
    }

    public function delete($parents){
        $this->db->exec("delete from parents WHERE num_parent = $parents");
    }

    public function getList($num_eleve){
        $req = $this->db->query("select * from parents WHERE num_eleve = '$num_eleve'");
       $parent = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return new Parents($parent);
    }
        public function getUnique($num_eleve){
            $req = $this->db->query("select * from parents WHERE num_eleve = '$num_eleve'");
            return  new Parents($req->fetch(PDO::FETCH_ASSOC));
        }
}


?>