<?php

    class SalleManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }

        public function add(salles $salles){
            $q= $this->db->prepare("insert into salles VALUES (
                                                                            :num_salle,
                                                                            :code_campus,
                                                                            :situation,
                                                                            :effectif
                                                                              )");
            $q->bindValue(':num_salle', $salles->getNumSalle());
            $q->bindValue(':effectif',$salles->getEffectif());
            $q->bindValue(':situation' , $salles->getSITUATION());
            $q->bindValue(':code_campus', $salles->getCodeCampus());
            $q->execute();
        }
        public function update(salles $salles){
            $q= $this->db->prepare("update salles set
                                                                code_campus=:code_campus,
                                                                situation=:situation,
                                                                effectif=:effectif
                                                                WHERE num_salle=:num_salle
                                                                  ");
            $q->bindValue(':num_salle', $salles->getNumSalle());
            $q->bindValue(':effectif',$salles->getEffectif());
            $q->bindValue(':situation' , $salles->getSITUATION());
            $q->bindValue(':code_campus', $salles->getCodeCampus());
            $q->execute();
        }
        public function delete($num_salle){
            $this->db->exec("delete from salles WHERE  num_salle = '$num_salle'");
        }
        public function GetList($campus){
            $list = array();
            $req = $this->db->query("select * from salles WHERE code_campus='$campus' ORDER BY num_salle DESC");
            while($salle  = $req ->fetch(PDO::FETCH_ASSOC)){
                $list[]= new  salles($salle);
            }
            $req->closeCursor();
            return $list;
        }
    }


?>