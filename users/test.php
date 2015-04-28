<?php
/**
 * Created by PhpStorm.
 * User: useranonymous
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


try
{
    if ($connect = new mysqli($serverName, $userName, $password, $dbName))
    {
        echo ('it works');
    }
    else
    {
        throw new Exception('Unable to connect');
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}

$sql = "SELECT id, first_name, last_name FROM users_rti1";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
    }
} else {
    echo "0 results";
}
$connect->close();
?>
