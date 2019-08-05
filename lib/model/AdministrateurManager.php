<?php

/**
 * Class AdministrateurManager
 */
class AdministrateurManager
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * AdministrateurManager constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
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

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     *
     */
    public function getLogin()
    {
        $q = $this->db->prepare("
                                        SELECT administrateur.login 
                                        FROM 
                                          administrateur,compte
                                        WHERE 
                                          administrateur.login = compte.login AND 
                                          compte.type = 'admin';");
        $q->execute();

    }

    /**
     * @param Administrateur $admin
     */
    public function add(Administrateur $admin)
    {
        $q = $this->db->prepare("
                INSERT INTO administrateur(code_admin,login,id_img,code_adresse,nom,prenom,sexe,cni,dob) 
                    VALUES(:code_admin,:login,:id_img,:code_adresse,:nom,:prenom,:sexe,:cni,:dob)");
        $q->bindValue(':code_admin', $admin->getCodeAdmin());
        $q->bindValue(':login', $admin->getLogin());
        $q->bindValue(':id_img', $admin->getId_Img());
        $q->bindValue(':code_adresse', $admin->getCode_Adresse());
        $q->bindValue(':nom', $admin->getNom());
        $q->bindValue(':prenom', $admin->getPrenom());
        $q->bindValue(':sexe', $admin->getCni());
        $q->bindValue(':dob', $admin->getDob());
        $q->execute();
        $admin->hydrate(array('CODE_ADMIN' => $this->db->lastInsertId()));
    }

    /**
     * @param Administrateur $admin
     */
    public function update(Administrateur $admin)
    {
        $q = $this->db->prepare("UPDATE administrateur SET
                                            LOGIN = :login,
                                            ID_IMG = :id,
                                            CODE_ADRESSE = :codeadresse,
                                            NOM = :nom,
                                            PRENOM = : prenom,
                                            SEXE=:sexe,
                                            CNI =:cni,
                                            DOB=:dob 
                                            WHERE CODE_ADMIN=:codeadmin ");
        $q->bindValue(':codeadmin', $admin->getCodeAdmin());
        $q->bindValue(':login', $admin->getLogin());
        $q->bindValue(':id', $admin->getId_Img());
        $q->bindValue(':codeadresse', $admin->getCode_Adresse());
        $q->bindValue(':nom', $admin->getNom());
        $q->bindValue(':prenom', $admin->getPrenom());
        $q->bindValue(':sexe', $admin->getSexe());
        $q->bindValue(':cni', $admin->getCni());
        $q->bindValue(':dob', $admin->getDob());
        $q->execute();
    }

    /**
     * @param $code
     */
    public function delete($code)
    {
        $this->db->exec("DELETE FROM administrateur WHERE CODE_ADMIN='$code' ");
    }

    /**
     * @return string
     */
    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM public.administrateur')->fetchColumn();
    }

    /**
     * @param int $debut
     * @param int $limite
     * @return array
     */
    public function getList($debut = -1, $limite = -1)
    {
        $listeAdmin = array();
        $sql = 'SELECT  code_admin ,login,id_img,code_adresse,nom,prenom,sexe,cni,dob FROM administrateur ORDER BY
login DESC';
// On vérifie l'intégrité des paramètres fournis
        if ($debut != -1 || $limite != -1) {
            $sql .= ' LIMIT ' . (int)$limite . ' OFFSET ' . (int)
                $debut;
        }
        $requete = $this->db->query($sql);
        while ($admin = $requete->fetch(PDO::FETCH_ASSOC)) {
            $listeAdmin[] = new Administrateur($admin);
        }
        $requete->closeCursor();
        return $listeAdmin;
    }


    /**
     * @param $id
     * @return Administrateur
     */
    public function getUnique($id)
    {
        $requete = $this->db->prepare('SELECT * 
                                            FROM administrateur WHERE code_admin = :id');
        $requete->bindValue(':id', (string)$id, PDO::PARAM_STR);
        $requete->execute();
        return new Administrateur($requete->fetch(PDO::FETCH_ASSOC));
    }

    public function newMatricule(){
        $num = date('y') ;
        $num .="WSFADMIN".($this->Count()+1);
        return $num;
    }
}
?>