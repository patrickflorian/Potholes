<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 10/06/2017
 * Time: 20:45
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wigefor -- Accueil </title>
    <link rel="stylesheet" href="res/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="res/assets/bootstrap/datepicker/css/datepicker.css">
    <link rel="stylesheet" href="web/css/styles.css">
    <link rel="stylesheet" href="res/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="res/assets/fonts/material-icons.css">
    <link rel="stylesheet" href="web/css/user.css">
   <link rel="stylesheet" href="web/css/styles.css">
    <link rel="stylesheet" href="res/assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="res/assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="res/assets/css/Bootstrap-Payment-Form.css">

    <script type="text/javascript" src="res/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="res/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="res/assets/bootstrap/datepicker/js/bootstrap-datepicker.js"></script>

  

    <style>
        body{
           /* background-color: #f2f2f2;*/
        }
        .modal-header, .close {
    background-color: green;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        h4 {

    color: white !important;
            text-align: center;
            font-size: 20px;
        }

    </style>
    </head>

    <body onload="getListAnnee();getListCampus();getOptionListEnseignant();" style="margin-left: 1.0em;margin-right: 1.0em;">

    <div class="nav  navbar ">


        <?php  if (!isset($_SESSION['login'])&&!isset($_SESSION['pwd'])&&!isset($_SESSION['type'])) {
            include_once "template/index.php";
        }
        else{
            ?>


        <?php
        $type=$_SESSION['type'];
        
            if (strcmp($_SESSION['type'], 'eleve')!=-1){
                include_once "template/menuEleve.php";
            }else if (strcmp($_SESSION['type'], 'enseignant')!=-1){
                        include_once "template/menuEnseignant.php";
                    }else if (strcmp($_SESSION['type'],'administrateur' )!=-1 ){
                                include_once "template/menuAdmin.php";
                            }
            
            
        ?>
</div>
</nav>
                
            <?php

        }
        ?>

    </div>

    </body>
      <script type="text/javascript" src="web/js/wigeforAjax.js"></script>
    <script type="text/javascript" src="web/js/script.js"></script>
    <script type="text/javascript" src="web/js/alert.js"></script>