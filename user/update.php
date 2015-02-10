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


if (isset($_POST['btn_update']) && $_POST['email'])
{
    $update = $connectDB->update($connection,$usersTable,$_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password']);
    echo($update);

} elseif(isset($_POST['email'])) {
    $update = $connectDB->update($connection,$usersTable,$_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password']);
    echo($update);
}