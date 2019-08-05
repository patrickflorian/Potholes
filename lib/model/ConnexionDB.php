<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 07/06/2017
 * Time: 21:23
 */
$user='postgres';
$pass='1234';
$bd='wigefor';
$host='localhost';

/***************************Connexion  PDO Postgres ****************************************************/
$con = new PDO("pgsql:host=$host port=5432 dbname=$bd user=$user password=$pass");

/****************************Connexion PG Posgres  **************************************************************/
$dbm=('host=' . $host . ' port=' . 5432 . ' dbname=' . $bd . ' user=' . $user . ' password=' . $pass);
$conn = pg_pconnect($dbm);
?>