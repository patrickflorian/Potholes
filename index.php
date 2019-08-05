<link rel="shortcut icon" href="res/assets/img/logo.ico" type="image/ico"> </link>
<meta charset="utf-8">
<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:40
 */
session_start();

include_once "connexion.php";

include_once "header.php";
?>
<div class="center-block">

    <div class="col-md-2 col-sm-2">
        <?php
        if (isset($_SESSION['type'])&&strcmp($_SESSION['type'],'administrateur' )){
            include_once "template/adminSideBarLeft.php";
        }?>
    </div>
    <div class="container1 container col-md-10 col-sm-9 col-md-offset-0">

<div id="msg" class="col-md-offset-1">

</div>
    <?php

    if(isset($_SESSION['type'])&& isset ($_SESSION['pwd']) && isset($_SESSION['type'])&&isset($_GET['q']) and file_exists($_GET['q'].'.php'))
    {

        include ($_GET['q'].".php");
    }
    ?>
</div>
    
</div>

<?php
include_once "footer.php";
?>

