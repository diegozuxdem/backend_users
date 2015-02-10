<?php
/**
 * Created by PhpStorm.
 * User: edwinalbertovallejo
 * Date: 2/4/15
 * Time: 8:09 PM
 */

$ymlDatabase ="/vagrant/config/database.yml";
$dbParams = yaml_parse_file($ymlDatabase);
$serverName = $dbParams[db][dev][host];
$userName = $dbParams[db][dev][user];
$password = $dbParams[db][dev][password];
$dbName = $dbParams[db][dev][dbname];
$connect = new mysqli($serverName, $userName, $password, $dbName);
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo("---------------------------------------------------------------------------");
echo("<br/> TEST LIST METHOD OUTPUT <br/>");
$url = "http://php.botshell.net/user/list.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
var_dump(json_decode($result, true));

echo("---------------------------------------------------------------------------");
echo("---------------------------------------------------------------------------");
echo("<br/> TEST CREATE METHOD AND PRINT OUTPUT <br/>");
echo("\n");

$urlCreate = "http://php.botshell.net/user/create.php";
$paramsCreate = 'first_name=Edwin&last_name=Vallejo&email=edwinvallejo3@gmail.com&password=12345';

$chCreate = curl_init( $urlCreate );
curl_setopt( $chCreate, CURLOPT_POST, 1);
curl_setopt( $chCreate, CURLOPT_POSTFIELDS, $paramsCreate);
curl_setopt( $chCreate, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $chCreate, CURLOPT_HEADER, 0);
curl_setopt( $chCreate, CURLOPT_RETURNTRANSFER, 1);

$responseCreate = curl_exec( $chCreate );
print_r($responseCreate);
echo("---------");
echo("---------");
echo("<br/> TEST UPDATE METHOD AND PRINT OUTPUT <br/>");
echo("\n");

$urlUpdate = "http://php.botshell.net/user/update.php";
$paramsUpdate = 'first_name=NewDiego&last_name=NewAmayix&email=edwinvallejo@gmail.com&password=12345';

$chUpdate = curl_init( $urlUpdate );
curl_setopt( $chUpdate, CURLOPT_POST, 1);
curl_setopt( $chUpdate, CURLOPT_POSTFIELDS, $paramsUpdate);
curl_setopt( $chUpdate, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $chUpdate, CURLOPT_HEADER, 0);
curl_setopt( $chUpdate, CURLOPT_RETURNTRANSFER, 1);

$responseUpdate = curl_exec( $chUpdate );
var_dump(json_decode($responseUpdate, true));
echo("---------");
echo("---------");
echo("<br/> TEST DELETE METHOD AND PRINT OUTPUT <br/>");
echo("\n");

$urlDelete = "http://php.botshell.net/user/delete.php";
$paramsDelete = 'email=edwinvallejo2@gmail.com';

$chDelete = curl_init( $urlDelete );
curl_setopt( $chDelete, CURLOPT_POST, 1);
curl_setopt( $chDelete, CURLOPT_POSTFIELDS, "email=edwinvallejo2@gmail.com");
curl_setopt( $chDelete, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $chDelete, CURLOPT_HEADER, 0);
curl_setopt( $chDelete, CURLOPT_RETURNTRANSFER, 1);

$responseDelete = curl_exec( $chDelete );
var_dump(json_decode($responseDelete, true));
echo("---------");
echo("---------");
echo("<br/> TEST LOGIN METHOD AND PRINT OUTPUT <br/>");
echo("\n");

$urlLogin = "http://php.botshell.net/user/login.php";
$paramsLogin = 'username=jgibson0@oracle.com&password=12345';

$chLogin = curl_init( $urlLogin );
curl_setopt( $chLogin, CURLOPT_POST, 1);
curl_setopt( $chLogin, CURLOPT_POSTFIELDS, $paramsLogin);
curl_setopt( $chLogin, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $chLogin, CURLOPT_HEADER, 0);
curl_setopt( $chLogin, CURLOPT_RETURNTRANSFER, 1);

$responseLogin = curl_exec( $chLogin );
var_dump(json_decode($responseLogin, true));
echo("---------------------------------------------------------------------------");