<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 09:14
 */



include "../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion() ;
$cptMAnager = new CompteManager($bdd);
if (isset($_GET['log'])) {
        if ($log=='out'){
            session_destroy();
        }
}
