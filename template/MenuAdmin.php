<?php

/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 11/06/2017
 * Time: 20:11
 */
$adminManager = new AdministrateurManager($bdd);
$admin = new Administrateur($adminManager->getUnique($_SESSION['login']));
$annee_scol  =new AnneeScolaireManager($bdd); 
$eleveManager = new EleveManager($bdd);
$filiereManager = new FiliereManager($bdd );
$evaluationManager = new EvaluationManager($bdd);
$ensManager = new EnseignantManager($bdd);
try{
    $NbreEleve = $eleveManager->CountByYear($annee_scol->getCurrentYear());
    $NbreFiliere = $filiereManager->Count();
    $NbreEvaluation = $evaluationManager->CountByYear(date('Y'));
    $NbreEns = $ensManager->Count();

}catch (Exception $e){

}
?>
<style>
    .navbar-default{
        border-radius: 0;
    }
    .navbar-fixed-left{
        width: 240px;
        position: fixed;
        height: 100%;
        border-radius: 0;
        background-color: #2b5a05;
        padding-top: 80px;
    }
    .navbar-fixed-left >.navbar-nav{
        float: none;
        width:220px;
    }
    .navbar-fixed-left.navbar-nav >li{
        margin-left: -10px;
        width:220px;
    }
    .navbar-fixed-left +.container {
        margin-left: 100px;
    }
    .navbar-fixed-left .navbar-nav > li >.dropdown-menu{

    }
    .navbar-fixed-top{
        border-bottom: #61614c;
        box-shadow: grey 0 0 5px 0;

    }

</style>

<nav class="navbar navbar-default navbar-fixed-top custom-header">
    <div class="container-fluid">
        <div class="navbar-header"><a href="index.php" class="navbar-brand navbar-link" style="color: forestgreen;"><i class="glyphicon glyphicon-phone"></i>Wige<span style="color: yellow;">for </span>--</a>
            <button data-toggle="collapse" data-target="#navbar-collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav ">
                <li role="presentation" class=""><a href="index.php"> <i class="glyphicon glyphicon-home"></i> <span class="hidden-sm">Home</span></a></li>
                <li role="presentation"  class=""><a href="#"><span class="">Mes Infos</span></a></li>
                <li class="dropdown "  ><a data-toggle="dropdown" aria-expanded="false" href="?q=app/views/paiement/formPaiement" class="dropdown-toggle"><i class="glyphicon glyphicon-usd"></i> <span class="hidden-sm">Paiements</span><center><span class="badge teal-text" style="background-color: green;"></span></center></a>
                    <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="?q=app/views/apprenant/formSolde">Fiche des paiements</a></li>
                        <li role="presentation"><a href="?q=app/views/paiement/formPaiement">consulter/nouveau versement </a></li>

                    </ul>
                </li>
                <li role="presentation" class=""><a href="#" class="custom-navbar"><i class="fa fa-calendar"></i> <span class="hidden-sm">Discipline</span></a></li>
                <?php
                if(isset($_SESSION)&&strcmp($_SESSION['type'],'administrateur' )!=-1){?>
                    <li class="dropdown"><a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"><i class="glyphicon glyphicon-education"></i> <span class="hidden-sm">Apprenant</span><center><span class="badge teal-text" style="background-color: green;"><?php echo $NbreEleve;?></span></center>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li role="presentation"><a href="?q=app/views/apprenant/formApprenant">Inscription</a></li>
                            <li role="presentation"><a href="?q=app/views/apprenant/listApprenant">Liste des apprenants</a></li>
                            <li role="presentation"><a href="?q=app/views/apprenant/modifier_apprenant">Changement de filiere</a></li>
                        </ul>
                    </li>
             <?php   } ?>
                <?php
                if(isset($_SESSION)&&strcmp($_SESSION['type'],'administrateur' )!=-1){?>
                <li class="dropdown " ><a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i> <span class="hidden-sm">Enseignants</span><center><span class="badge teal-text" style="background-color: green;"><?php echo $NbreEns;?> </span></center>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <li ><a href="?q=app/views/enseignant/formEnseignant">recrutement</a></li>
                        <li role="presentation"><a href="?q=app/views/enseignant/listEnseignant">Liste des Enseignants</a></li>
                        <li role="presentation"><a href="#">Information sur Enseignant</a></li>

                    </ul>
                </li>
                <?php   } ?>
                <?php
                if(isset($_SESSION)&&strcmp($_SESSION['type'],'administrateur' )!=-1){?>
                    <li class="dropdown " ><a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"><i class="glyphicon glyphicon-book"></i> <span class="hidden-sm">Matiere</span><center><span class="badge teal-text" style="background-color: green;"></span></center>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li role="presentation"><a href="?q=app/views/administrateur/formMatiere">Nouvelle Matiere</a></li>
                            <li role="presentation"><a href="#">Modification</a></li>
                            <li role="presentation"><a href="?q=app/views/administrateur/formMatiere&list">Liste des Matieres</a></li>
                        </ul>
                    </li>
                <?php   } ?>
                <?php
                if(isset($_SESSION)&&strcmp($_SESSION['type'],'administrateur' )!=-1){?>
                    <li class="dropdown "><a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"><i class="material-icons">assignment</i> <span class="hidden-sm">examens</span> <center><span class="badge teal-text" style="background-color: green;"><?php echo $NbreEvaluation;?> </span></center></a>
                        <ul role="menu" class="dropdown-menu">
                            <li role="presentation"><a href="?q=app/views/examen/formEvaluation">Nouvel Examen</a></li>
                            <li role="presentation"><a href="?q=app/views/examen/formNote">Modification/Saisie Notes </a></li>
                            <li role="presentation"><a href="?q=app/views/examen/listNote">visualiser Notes</a></li>
                            <li role="presentation"><a href="?q=app/views/examen/recap">Recaputilatif</a></li>
                            <li role="presentation"><a href="#">informations sur Examen</a></li>
                        </ul>
                    </li>
                <?php   } ?>
                <?php
                if(isset($_SESSION)&&$_SESSION['type']=='administrateur'){?>
                    <li class="dropdown "><a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"><i class="glyphicon glyphicon-book"></i> <span class="hidden-sm">Formations</span><center><span class="badge teal-text" style="background-color: green;"><?php echo $NbreFiliere;?> </span></center></a>
                        <ul role="menu" class="dropdown-menu">
                            <li role="presentation"><a href="?q=app/views/administrateur/formFiliere">Ajouter</a></li>
                            <li role="presentation"><a href="#">Modification</a></li>
                            <li role="presentation"><a href="#">Liste des Formations</a></li>
                        </ul>
                    </li>
                <?php   } ?>

                <li role="presentation" class=""><a href="#" class="custom-navbar"><i class="fa fa-st"></i><span class="hidden-sm">Accounts</span></a></li>
                <li role="presentation" class=""><a href="?q=app/views/stats/statProgressionNbreApprenant" class="custom-navbar"><i class="glyphicon glyphicon-stats"></i><span class="hidden-sm">Stats</span></a></li>

            </ul>
            <ul class="nav navbar-inverse navbar-right  text-darken-3" style="background-color: green;">
                <p class="navbar-text hidden-sm" role="presentation"> <?php echo $admin->getNom(); ?> <!--</p><span class="badge">admin</span>-->
                <li class="dropdown">
                    <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle">
                        <span class="caret"></span>
                        <img class="hidden-sm" src="app/controllers/photo/image.php?id=<?php echo intval($admin->getId_Img());?>" style="width: 20px" class="dropdown-image " />
                    </a>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="#">Settings </a></li>
                        <li role="presentation" class="active">
                            <form class="form-inline navbar-form" action="index.php" method="post">
                                <input type="hidden" name="log" value="out" />
                                <button type="submit" class="btn btn-warning navbar-btn btn-sm" name = "deconnexion" >
                                    deconnexion  <i class="glyphicon glyphicon-log-out"> </i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    