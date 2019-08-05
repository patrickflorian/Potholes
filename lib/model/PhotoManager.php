<?php

    class PhotoManager{
        protected $db;
        public function __construct(PDO $db)
        {
            $this->db=$db;
        }

        public function add(Photo $photo){
            $img_blob = $photo->getBLOB_IMG();
            $img_type = $photo->getTYPE_IMG();
            $req = "INSERT INTO photo(type_img, blob_img) VALUES ('$img_type',?) ";
            $q=$this->db->prepare($req) ;
            $q->execute(array($img_blob));
            $photo->hydrate(array('id_img'=>$this->db->query("select cu")));
            echo "<script>alert('".$photo->getID_IMG()."');";
            return $photo;
        }
        public function update(Photo $photo){
            $q=$this->db->exec("update photo SET
                                                                  nom_img=:nom_img,
                                                                  taille_img=:taille_img,
                                                                  desc_img=:desc_img,
                                                                  blob_img=:blob_img 
                                                                  WHERE id_img =:id_img");
            $q->bindValue(':id_img',$photo->getID_IMG() ,PDO::PARAM_INT);
            $q->bindValue(':nom_img',$photo->getNOM_IMG());
            $q->bindValue(':taille_img',$photo->getTAILLE_IMG());
            $q->bindValue(':desc_img',$photo->getDESC_IMG());
            $q->bindValue('::blob_img',$photo->getBLOB_IMG(),PDO::PARAM_LOB);
            $q->execute();
        }

        public function delete($id_img){
            $this->db->exec("delete from photo WHERE  id_img = $id_img");
        }
        public function getUnique($id_img){
            $q=$this->db->prepare("select * from photo WHERE id_img = $id_img");
            $q->execute();
            return new Photo($q->fetch(PDO::FETCH_ASSOC));
        }
    }




?>