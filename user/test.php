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


echo("Test response with json");
$url = "list.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
var_dump(json_decode($result, true));


echo("Test post params");
$fields = array(
    'connection'=>$connect,
    'usersTable'=>'users_rti1',
    'first_name'=>urlencode('Diego'),
    'last_name'=>urlencode('Amayix'),
    'email'=> 'jhenderson9@acquirethisname.com',
    'password'=>urlencode('12345'),
);
$urlPost = "testpost.php";

function execPostRequest($urlPost,$post_array){

    if(empty($url)){ return false;}

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

    $result = curl_exec($ch);

    curl_close($ch);

    return $result;

}

execPostRequest($urlPost,$post_array);