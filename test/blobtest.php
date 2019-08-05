<?php
$dsn = 'pgsql:dbname=wigefor;host=127.0.0.1';
$user = 'postgres';
$password = 'patrick';
// these variables must be set to match the actual connection
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Stores a file:
if(isset($_GET['file'])){

    $filename=$_GET['file'];
    $img_type= $_GET['type'];
    // Normally, the file will probably be uploaded, but that's another howto  ;-)
    $data = bin2hex(file_get_contents($filename)); // This may be a problem on too large files
    try{
        $sql="insert into blobstore (doc,blob) values('test',?)";
        $sqlh= $dbh->prepare($sql);
        $sqlh->execute(array($data));
    }
    catch(Exception $e){
        die($e->getMessage());
    }
    print("<p>Done</p>");

}
// reads a file out of the database:
if(isset($_GET['id'])){
    $sql="select blob from blobstore where id=?";
    $sqh=$dbh->prepare($sql);
    $sqh->execute(array($_GET['id']));
    $data=$sqh->fetchAll(PDO::FETCH_NUM);
    $data=$data[0][0]; // print($data) here will just return "Resource id # ..."
    header('Content-Type: image/jpg'); // must be adjusted accordingly for other file types, maybe filetype stored as a field in the table?
    $data=fgets($data); // The data are returned as a stream handle gulp all of it in in one go, again, this may need some serious rework for too large files
    print(pack('H*',$data)); // reverses the bin2hex, no hex2bin in my php... ????
}

?>

<form   action="blobtest.php" method="get">
    <input type="text" name="file">
    <input type="submit">
</form>
