<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 11/06/2017
 * Time: 20:11
 */
    $studentManager = new EleveManager($bdd);
    $student = $studentManager->getUnique($_SESSION['login']);
?>

        <nav class="navbar navbar-default custom-header" style="background-color : lightblue;">
            <div class="container-fluid">
                <div class="navbar-header"><a href="#" class="navbar-brand navbar-link" style ="color : forestgreen"><i class="glyphicon glyphicon-phone"></i>Wige<span style="color: yellow;">for </span>--</a>
                    <button data-toggle="collapse" data-target="#navbar-collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav links">
                        <li role="presentation"><a href="#">Home </a></li>
                        <li role="presentation"><a href="#"> Mes Infos </a></li>
                        <li role="presentation"><a href="#"> Mon Parcours</a></li>
                        <li role="presentation"><a href="#" class="custom-navbar"> Paiements</a></li>
                        <li class="dropdown "><a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle"><i class="material-icons">assignment</i> <span class="hidden-sm">examens</span> <center><span class="badge teal-text" style="background-color: green;"> </span></center></a>
                        <ul role="menu" class="dropdown-menu">
                            <li role="presentation"><a href="?q=app/views/examen/listNote">Liste des Notes</a></li>
                            <li role="presentation"><a href="#">informations sur Examen</a></li>
                        </ul>
                    </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <p class="navbar-text" role="presentation"> <?php  echo $student->getNom(); ?> </p><span class="badge">el</span>
                        <li class="dropdown">
                            <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle">
                                <span class="caret"></span>
                                <img src="app/controllers/photo/image.php?id=<?php echo intval($student->getID_IMG());?>" style="width: 30px" class="dropdown-image " />
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