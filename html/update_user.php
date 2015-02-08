<?php
/**
 * Created by PhpStorm.
 * User: diegoamaya
 * Date: 2/6/15
 * Time: 10:29 PM
 */

include "classes/connectDB.php";
include "config.php";

$connectDB = new connectDB();
$connection = $connectDB->connect($serverName,$user,$password,$database);
$userPassword = md5($_POST['password']);

if (isset($_POST['btn_update']))
{
    $update = $connectDB->update($connection,$usersTable,$_POST['first_name'],$_POST['last_name'],$_POST['email'],$userPassword);
    header( 'Location: manage_users.php' );
    exit();
}
else if (isset($_POST['btn_delete']))
{
    $delete = $connectDB->delete($connection,$usersTable,$_POST['email']);
    header( 'Location: manage_users.php' );
    exit();

}