<?php
/**
 * Created by PhpStorm.
 * User: diegoamaya
 * Date: 2/8/15
 * Time: 5:56 PM
 */

include "classes/userAction.php";
include "config.php";


global $session;
$connectDB = new userAction();
$connection = $connectDB->connect($serverName,$user,$password,$database);
$session = $connectDB->login($connection,$usersTable,$_POST['username'],$_POST['password']);

if($session){
    header('Content-Type: application/json');
    echo($session);
}
