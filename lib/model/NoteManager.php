<?php

    class NoteManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }

        public function add(Note $note){
            $q=$this->db->prepare("insert into note(num_eleve, num_eval, valeur,code_matiere) VALUES (
                                                                        :num_eleve,
                                                                        :num_eval,
                                                                        :valeur,
                                                                        :code_matiere)");
            $q->bindValue(':num_eleve',$note->getNUM_ELEVE());
            $q->bindValue(':num_eval',$note->getNUM_EVAL(),PDO::PARAM_INT);
            $q->bindValue(':valeur',$note->getValeur());
            $q->bindValue(':code_matiere',$note->getCodeMatiere());
            $q->execute();
        }

        public function update(Note $note){
            $q=$this->db->prepare("update note set 
                                                    valeur   =:valeur
                                                  where id_note = :id_note AND code_matiere = :code_matiere AND  num_eleve=:num_eleve AND num_eval=:num_eval");
            $q->bindValue(':num_eleve',$note->getNUM_ELEVE());
            $q->bindValue(':num_eval',$note->getNUM_EVAL(),PDO::PARAM_INT);
            $q->bindValue(':id_note',$note->getIdNote(),PDO::PARAM_INT);
            $q->bindValue(':valeur',$note->getValeur());
            $q->bindValue(':code_matiere',$note->getCodeMatiere());
            $q->execute();
        }

        public function delete($id_note){
            $this->db->exec("delete from note WHERE id_note = $id_note");
        }

        public function getIdNote($num_eleve,$num_eval){
            return $this->db->exec("select id_note from note WHERE num_eleve='$num_eleve'AND num_eval=$num_eval");
        }
        public function getListByEleve($num_eleve,$eval){
            $list= array();
            $req= $this->db->query("select * from note WHERE num_eleve = '$num_eleve' AND num_eval=$eval");
            while ($note = $req->fetch(PDO::FETCH_ASSOC)){
                $list[]=new  NOTE($note);
            }
            $req->closeCursor();
            return $list;
        }

        public function getListByMatiere($code_matiere){
            $list= array();
            $req= $this->db->query("select n.* from note n , emploi_du_temps e WHERE e.code_matiere = '$code_matiere' AND  e.num_eval = n.num_eval");
            while ($note = $req->fetch(PDO::FETCH_ASSOC)){
                $list[]=new  NOTE($note);
            }
            $req->closeCursor();
            return $list;
        }

        /**
         * @param $num_eleve
         * @param $code_matiere
         * @param $evaluation
         * @return NOTE
         */
        public function getUnique($num_eleve, $code_matiere, $evaluation){
            $req= $this->db->query("select n.* from note n  
                                                        WHERE 
                                                            n.code_matiere = '$code_matiere' 
                                                            AND n.num_eleve='$num_eleve'
                                                            AND n.num_eval=$evaluation");
            $res =$req->fetch(PDO::FETCH_ASSOC);
            if(empty($res)) {$note =new Note([]);}
                else {$note =new  NOTE($res);}
            $req->closeCursor();
            return $note;
        }

        function getStudentListWithNoNotes($eval,$matiere,$formation,$annee)
        {
            $list = array();
            $req = $this->db->query("select e.* from eleve e,passe
                                                    WHERE passe.num_eleve=e.num_eleve and passe.code_filiere='$formation'
                                                    and e.num_eleve NOT IN (SELECT n.num_eleve from note n,evaluation WHERE n.num_eval =$eval AND evaluation.num_eval = n.num_eval AND n.code_matiere ='$matiere' AND evaluation.date='$annee')");
            while ($el = $req->fetch(PDO::FETCH_ASSOC)) {
                $list[] = new  Eleve($el);
            }
            $req->closeCursor();
            return $list;
        }

        public function calculNote(array $note,array $coef){
            $i =0;
            $sumcoef=0;
            $sumNote=0;
            $moy = 0;
            foreach($note as $item){
                $sumNote+=$item*$coef[$i];
                $sumcoef+=$coef[$i];
            }
            if($sumcoef!=0)$moy=$sumNote/$sumcoef;

            return $moy;
        }
    }
?>