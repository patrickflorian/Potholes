
<?php
//grab stuff from url
$filename = "http://school.universbinaire.com/indexadmin.php";
forceDownLoad($filename);

file_put_contents('C:/xampp/htdocs/wigefor/test/result.php',file_get_contents($filename));

function forceDownLoad($filename)

{



    header("Pragma: public");

    header("Expires: 0"); // set expiration time

    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	
	header("Content-Type: application/text/x-vCard");



    header("Content-Disposition: attachment; filename=".basename($filename).";");

    header("Content-Transfer-Encoding: binary");

    header("Content-Length: ".filesize($filename));



    @readfile($filename);

    exit(0);

}

