<?php
    include_once 'NoteManager.php';
    include_once 'FiliereManager.php';
    class EvaluationManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db = $db;
        }

        public function add(EVALUATION $eval){

            $q=$this->db->prepare("INSERT INTO evaluation(type,date,pourcentage) VALUES (
                                                                          :type,
                                                                          :date_eval,
                                                                          :pct)");
            $q->bindValue(':type',$eval->getType());
            $q->bindValue(':date_eval',$eval->getdate());
            $q->bindValue(':pct',$eval->getPourcentage());
            $q->execute();
            $eval->hydrate(['num_eval'=>$this->db->lastInsertId('evaluation_num_eval_seq')]);
            echo '<script>alert("'.$eval->getNumEval().'");</script>';

        }

        public  function update(EVALUATION $eval){
            $q=$this->db->prepare("update  evaluation set
                                                                        type=  :type,
                                                                         date= :date_eval,
                                                                         pourcentage= :pct WHERE num_eval =:num_eval");
            $q->bindValue(':num_eval',$eval->getNumEval(),PDO::PARAM_INT);
            $q->bindValue(':type',$eval->getType());
            $q->bindValue(':date_eval',$eval->getdate());
            $q->bindValue(':pct',$eval->getPourcentage());
            $q->execute();
        }

        public function delete($num_eval){
            $this->db->exec("DELETe FROM evaluation WHERE num_eval = $num_eval");

        }
        public function getEvalByYear($year){
            $list=array();
            $req= $this->db->query("SELECT evaluation.* from evaluation where  evaluation.date='$year' ");
            while ($eval = $req->fetch(PDO::FETCH_ASSOC) ){
                $list[] = new EVALUATION($eval);
            }
            $req->closeCursor();
            return $list;
        }

        public function getUnique($eval){
            $q= $this->db->prepare("SELECT * from evaluation WHERE  evaluation.num_eval =$eval");
            $q->execute();
            return new EVALUATION($q->fetch(PDO::FETCH_ASSOC));
        }
        public function CountByYear($year){
            $year.='/01/01';
            return $this->db->query("SELECT COUNT(*) FROM evaluation WHERE date_trunc('year',date)=TIMESTAMP '$year'")->fetchColumn();
        }
        public function getListStudentMoyenne($num_eval,$code_filiere ){
            $list = array();
            $annee = $this->getUnique($num_eval)->getdate();
            $notemanager = new NoteManager($this->db);
            $eleveManager = new eleveManager($this->db);
            $matiereList = $this->getListmatiere($num_eval,$code_filiere);
            $listEleve = $eleveManager->getList($code_filiere,date_format(date_create($annee),'Y'));
            foreach ($listEleve as $item) {
                $listnote =array();
                $listcoef =[];
                foreach ($matiereList as $value){
                    $listnote[] = $notemanager->getUnique($item->getNumEleve(),$value->getCodeMatiere(),$num_eval)->getValeur();
                    $listcoef[]= $value->getCoefficient();
                }
                $note = $notemanager->calculNote($listnote,$listcoef);
                $ap ='';
                if($note==null) {echo'';}
                else{
                    if($note<8) $ap ='mediocre';
                    if($note<10&$note>8) $ap='Faible';
                    if($note>10&$note<12) $ap='Passable';
                    if($note>12&$note<14) $ap='Assez-Bien';
                    if($note>14&$note<16) $ap='Bien';
                    if($note>16&$note<18) $ap='T.Bien';
                    if($note>18&$note<20) $ap='Excellent';
                }
                $list[]=array($item->getNumeleve(),$note,$ap);
            }
            return $list;
        }

        public function getListmatiere($eval,$filiere){
            $list =[];
            $req = $this->db->query("select m.* from matiere m  join (emploi_du_temps e JOIN dispense 
                                        ON e.code_matiere = dispense.code_matiere) 
                                        on m.code_matiere= e.code_matiere 
                                      WHERE dispense.code_filiere='$filiere' 
                                      and e.num_eval = $eval ");
            while($matiere = $req->fetch(PDO::FETCH_ASSOC)){
                $list[]=new matiere($matiere);
            }
            return $list;
        }


    }/*
include_once "../autoload.php";

    $bdd = PDOFactory::getPostgresConnexion();
    $evalmanager = new EvaluationManager($bdd);
    $eval = $evalmanager->getListStudentMoyenne(47,'SEBU');

foreach ($eval as $item) {
    echo $item[0];
    echo $item[1];
    echo $item[2];
}
*/
