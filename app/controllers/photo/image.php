<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 08/06/2017
 * Time: 10:52
 */
include "../../../lib/model/PDOFactory.php";
$bdd = PDOFactory::getPostgresConnexion() ;
// reads a file out of the database:
if(isset($_GET['id'])){
    //get img_blob
    $sql="select blob_img from wigefor.public.photo where id_img=?";
    $q=$bdd->prepare($sql);
    $q->execute(array($_GET['id']));
    $data=$q->fetchAll(PDO::FETCH_NUM);
    $data=$data[0][0]; // print($data) here will just return "Resource id # ..."
    //get img_type
    $sql="select type_img from wigefor.public.photo where id_img=?";
    $q=$bdd->prepare($sql);
    $q->execute(array($_GET['id']));
    $ext=$q->fetch(PDO::FETCH_ASSOC);
    $content = 'Content-Type:'.$ext['type_img'];

   header($content); // must be adjusted accordingly for other file types, maybe filetype stored as a field in the table?
    $data=fgets($data); // The data are returned as a stream handle gulp all of it in in one go, again, this may need some serious rework for too large files
    print(pack('H*',$data)); // reverses the bin2hex, no hex2bin in my php... ????*/
}

?>