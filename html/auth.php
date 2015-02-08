<?php
/**
 * Created by PhpStorm.
 * User: diegoamaya
 * Date: 2/6/15
 * Time: 12:15 AM
 */

include "classes/connectDB.php";
include "config.php";


global $session;
$connectDB = new connectDB();
$connection = $connectDB->connect($serverName,$user,$password,$database);
$session = $connectDB->auth($connection,$usersTable,$_POST['username'],$_POST['password']);

if($session){
    include "welcome.php";
} else {
    header( 'Location: login_user.php' );
    exit();
}
