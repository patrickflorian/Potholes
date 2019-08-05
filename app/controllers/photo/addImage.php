<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 10/06/2017
 * Time: 19:34
 */

if (isset($_FILES['photo'])) {

    $ret = false;
    $img_blob = '';
    $id_img = 0;
    $img_type = '';
    $img_nom = '';
    $taille_max = 250000;
    $ret = is_uploaded_file($_FILES['photo']['tmp_name']);

    if (!$ret) {
        echo /** @lang HTML*/"<script >alertMsg('warning','aucune image selectionnée');</script>";
        return false;
    } else {
        // Le fichier a bien été reçu
        $img_taille = $_FILES['photo']['size'];

        if ($img_taille > $taille_max) {
            echo /** @lang HTML*/"<script >alertMsg('danger','la taille de l\'image doit etre inferieure a 25ko' );</script>";
            return false;
        }

        $img_type = $_FILES['photo']['type'];
        $img_blob = bin2hex(file_get_contents($_FILES['photo']['tmp_name']));
        try{
            $req = "INSERT INTO photo(type_img, blob_img) VALUES ('$img_type',?) ";
            $q=$bdd->prepare($req) ;
            $q->execute(array($img_blob));
            $req2 = "select currval('photo_id_img_seq')";
            $id_img = $bdd->query("$req2")->fetchColumn();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

}

