<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 03/06/2017
 * Time: 13:55
 */
class EmploiDuTempsManager
{
    protected $db;

    /**
     * EmploiDuTempsManager constructor.
     * @param $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function add(emploi_du_temps $emploi){
        $q=$this->db->prepare("insert into emploi_du_temps VALUES (
                                                                            :num_eval,
                                                                          :code_matiere,
                                                                            :id_emploi,
                                                                          :date_debut,
                                                                          :duree,
                                                                          :date_fin,
                                                                          :type,
                                                                          :evenement
                                                                        )");
        $q->bindValue(':num_eval',$emploi->getNUM_EVAL());
        $q->bindValue(':code_matiere',$emploi->getCODE_MATIERE());
        $q->bindValue(':id_emploi',$emploi->getIdEmploi());
        $q->bindValue(':date_debut',$emploi->getDateDebut());
        $q->bindValue(':duree',$emploi->getDuree());
        $q->bindValue('date_fin',$emploi->getDateFin());
        $q->bindValue(':type',$emploi->getType());
        $q->bindValue(':evenement',$emploi->getEvenement());
        $q->execute();


    }
    public function update(emploi_du_temps $emploi){
        $q=$this->db->prepare("update emploi_du_temps set 
                                                                           num_eval= :num_eval,
                                                                        code_matiere=  :code_matiere,
                                                                         id_emploi=   :id_emploi,
                                                                         date_debut= :date_debut,
                                                                         duree= :duree,
                                                                          date_fin=:date_fin,
                                                                         type= :type,
                                                                         evenement= :evenement
                                                                        ");
        $q->bindValue(':num_eval',$emploi->getNUM_EVAL());
        $q->bindValue(':code_matiere',$emploi->getCODE_MATIERE());
        $q->bindValue(':id_emploi',$emploi->getIdEmploi());
        $q->bindValue(':date_debut',$emploi->getDateDebut());
        $q->bindValue(':duree',$emploi->getDuree());
        $q->bindValue('date_fin',$emploi->getDateFin());
        $q->bindValue(':type',$emploi->getType());
        $q->bindValue(':evenement',$emploi->getEvenement());
        $q->execute();


    }

}