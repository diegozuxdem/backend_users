<?php
/**
 * Created by PhpStorm.
 * User: diegoamaya
 * Date: 2/6/15
 * Time: 10:29 PM
 */

include "classes/userAction.php";
include "config.php";

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['password']) && isset($_POST['email']))

{
    $userPassword = md5($_POST['password']);

    $connectDB = new userAction();
    $connection = $connectDB->connect($serverName,$user,$password,$database);
    $register = $connectDB->register($connection,$usersTable,$_POST['first_name'],$_POST['last_name'],$_POST['email'],$userPassword);

    if($register){
        global $session;
        $session = $connectDB->auth($connection,$usersTable,$_POST['email'],$_POST['password']);

        if($session){
            include "welcome.php";
        } else {
            header( 'Location: register.php' );
            exit();
        }
    } else {
       exit();
    }

}

if (empty($session)){
    include "register_form.php";
}


