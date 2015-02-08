<?php
/**
 * Created by PhpStorm.
 * User: diegoamaya
 * Date: 2/8/15
 * Time: 10:00 AM
 */

include "classes/userAction.php";
include "config.php";

$connectDB = new userAction();
$objConnection = $connectDB->connect($serverName,$user,$password,$database);
$objResultQuery = $connectDB->query($usersTable,$objConnection);
$data = $connectDB->getList($objResultQuery);
header('Content-Type: application/json');
echo($data);