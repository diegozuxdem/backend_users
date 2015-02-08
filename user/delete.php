<?php
/**
 * Created by PhpStorm.
 * User: diegoamaya
 * Date: 2/6/15
 * Time: 10:29 PM
 */

include "classes/userAction.php";
include "config.php";

$connectDB = new userAction();
$connection = $connectDB->connect($serverName,$user,$password,$database);

if (isset($_POST['btn_delete']))
{
    $delete = $connectDB->delete($connection,$usersTable,$_POST['email']);
    echo($delete);

}