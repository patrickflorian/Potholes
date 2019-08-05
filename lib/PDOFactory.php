<?php


class PDOFactory {

    public  static function getPostgresConnexion1()
    {
        try
        {
			
		$bdd = pg_connect("host=localhost dbname=wigefor user=postgres password=1234")
		or die('Connexion impossible : ' . pg_last_error());
          
		  //echo $bdd;
            return($bdd);
			   
        }catch(\Exception $e)
        {
		    //echo 'false';
            die('Echec de Connexion'.$e->getMessage());
            return (NULL);
        }

}
	
	

//class PDOFactory {

    /**
     * @param string $server
     * @param string $user
     * @param string $pass
     * @param string $db
     * @return null|PDO
     */
    public  static function getPostgresConnexion($server="localhost", $user="postgres", $pass="1234", $db="wigefor")
    {
        try
        {
            $local = 'pgsql:host='.$server.';dbname='.$db;
            $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;
            $bdd = new \PDO($local, $user, $pass,$pdo_options);
              // echo 'true';
            return($bdd);
        }catch(\Exception $e)
        {
		   // echo 'false';
            die('Echec de Connexion'.$e->getMessage());
            return (NULL);
        }

   }
} 