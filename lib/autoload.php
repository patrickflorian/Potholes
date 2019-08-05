<?php
/**
 * Created by PhpStorm.
 * User: La Foi
 * Date: 06/11/14
 * Time: 09:39
 */

function autoload($classe)
{
 //echo dirname(__FILE__)."\\Models\\".$classe.".php";
    require dirname(__FILE__)."\\model\\".$classe.".php";
}
spl_autoload_register('autoload');