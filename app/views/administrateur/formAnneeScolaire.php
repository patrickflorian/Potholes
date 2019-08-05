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


<body>
<script> window.document.title = "Wigefor --new School year"</script>
<div class="dropdown"><a class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false" role="button" href="#school-year">Start a new School Year</a>
    <ul class="dropdown-menu" role="menu">
        <li role="presentation"><a class="navbar-btn" onclick="newSchoolYear();"><?php  echo date_format(new DateTime(),'Y')+1; ?> </a></li>
        <li class="dropdown-header" role="presentation">this will open a new school year</li>
    </ul>
</div>

</body>
