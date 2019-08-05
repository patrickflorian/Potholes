
<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 13:45
 */

include_once "lib/autoload.php";
try{
    $bdd = PDOFactory::getPostgresConnexion("localhost", "postgres", "1234", "wigefor") ;
    $cptMAnager = new CompteManager($bdd);
    $compte;
        if (isset($_POST['log'])) {
            $log = $_POST['log'];
            if ($log == 'in') {
                if (isset($_POST['login']) && isset($_POST['pwd'])) {
                    $login = $_POST['login'];
                    $pwd =$_POST['pwd'];
                    $compte=$cptMAnager->getUnique($login,$pwd);
                    $log =strtok($compte->getLogin(),' ') ;
                    $p=strtok($compte->getPassword(),' ');
                    $type = $compte->getType();
                    if(($login==$log)&&($pwd==$p)) {
                        $_SESSION['login'] = $login;
                        $_SESSION['pwd'] = $pwd;
                        $_SESSION['type'] =$type ;
                        ?>
                            <script> $(document).ready(function () {
                                    $("#msgModal").modal();
                                })</script>
                        <?php
                        if(isset($_POST['remember'])&&($_POST['remember'] == 'on') ){
                            setcookie('user', $login);
                        }
                    }
                }
            }
            if ($log=='out'){
                session_destroy();
                header('location:index.php');
                echo  'delete session';
            }

        }
    }catch (Exception $e){
        echo "base de donnée non disponible pour l'instant veuillez essayer plutard";
    }
?>

