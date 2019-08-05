<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 11/06/2017
 * Time: 20:11
 */

$enseignantManager = new EnseignantManager($bdd);
$ens = new enseignant($enseignantManager->getUnique($_SESSION['login']));

?>
<style>
    @media (max-width:767px) {
        .navbar-default{
            border-radius: 0;
        }
        .navbar-fixed-left{
            width: 100%;
            position: fixed;
            border-radius: 0;
            padding-top: 80px;

        }
        .navbar-fixed-left .navbar-nav{
            float: none;
            width:220px;
        }
        .navbar-fixed-left .navbar-nav >li{
            margin-left: -10px;
            width:220px;
        }
    }


    .navbar-fixed-left .navbar-nav > li >.dropdown-menu{

    }
</style>

<nav class="navbar navbar-default navbar-fixed-left custom-header">
    <div class="container-fluid">
        <div class="navbar-header"><a href="#" class="navbar-brand navbar-link" style="color: forestgreen;"><i class="glyphicon glyphicon-phone"></i>Wige<span style="color: yellow;">for </span>--</a>
            <button data-toggle="collapse" data-target="#navbar-collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav links">
                <li role="presentation"><a href="#">Home </a></li>
                <li role="presentation"><a href="#"> Mes Infos </a></li>
                <li role="presentation"><a href="#"> Examen  / Notes</a></li>
                <li role="presentation"><a href="#" class="custom-navbar"> Discipline</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <p class="navbar-text" role="presentation"> <?php  echo $ens->getNom(); ?> </p><span class="badge">ens</span>
                <li class="dropdown">
                    <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle">
                        <span class="caret"></span>
                        <img src="app/controllers/photo/image.php?id=<?php echo intval($ens->getID_IMG());?>" style="width: 30px" class="dropdown-image img-rounded " />
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


