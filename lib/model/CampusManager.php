<?php

    class CampusManager{
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
        public function setDb( $db)
        {
            $this->db = $db;
        }

        public function  add(campus $campus){
            $q = $this->db->prepare("insert into campus VALUES (:code_campus,:libelle)");
            $q->bindValue(':code_campus',$campus->getCodeCampus());
            $q->bindValue(':libelle',$campus->getLibelleCampus());
            $q->execute();
        }

        public function delete( $campus){
            $this->db->exec ("DELETE FROM campus WHERE code_campus = '$campus' ");

        }
        public function getList(){
            $list =array();
            $res = $this->db->query("select * from campus ORDER BY code_campus ASC");
            while($campus = $res->fetch(PDO::FETCH_ASSOC)){
                $list[]= new campus($campus);
            }
            $res->closeCursor();
            return $list;
        }



    }


?>