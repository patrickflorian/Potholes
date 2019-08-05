<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 13/06/2017
 * Time: 22:02
 */
if(isset($_GET['check'])){
    echo $_GET['check'];
}



for($i=1;$i<=20;$i++){
    echo /** @lang HTML */'<img src="app/controllers/photo/image.php?id='.$i.'">';
}
?>
<form action="#" method="get">
    <input type="checkbox" name="check" onchange="alert('ooooo');">
    <input type="checkbox" name="check">
    <input type="submit">
</form>


