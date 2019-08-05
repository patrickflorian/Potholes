<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:33
 */
include_once "../../../lib/autoload.php";
$bdd = PDOFactory::getPostgresConnexion();
$annneManager = new AnneeScolaireManager($bdd);
$lastyear = new AnneeScolaire(array('annee'=>date_format(new DateTime(),'Y'),'cloture'=>true));
$current = new AnneeScolaire(array('annee'=>date_format(new DateTime(),'Y'),'cloture'=>true));
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire-matiere</title>
    <link rel="stylesheet" href="../../../res/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../web/css/styles.css">
    <link rel="stylesheet" href="../../../res/assets/css/untitled.css">
    <link rel="stylesheet" href="../../../res/assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../../../res/assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="../../../res/assets/css/Bootstrap-Payment-Form.css">
</head>

<body>
<div class="dropdown"><a class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false" role="button" href="#school-year">Start a new School Year</a>
    <ul class="dropdown-menu" role="menu">
        <li role="presentation"><a href="#"><?php  echo date_format(new DateTime(),'Y')+1; ?> </a></li>
        <li class="dropdown-header" role="presentation">this will open a new school year</li>
    </ul>
</div>
<script src="../../../res/assets/js/jquery.min.js"></script>
<script src="../../../res/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
