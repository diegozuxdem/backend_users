<?php
/**
 * Created by PhpStorm.
 * User: diegoamaya
 * Date: 2/5/15
 * Time: 10:44 PM
 */


class userAction {

    public function connect($serverName, $userName, $password, $dbName) {

        try
        {
            if ($connect = new mysqli($serverName, $userName, $password, $dbName)) {
                return $connect;
            }
            else {
                throw new Exception('Unable to connect');
            }
        }
        catch(mysqli_sql_exception $e)
        {
            echo $e->getMessage();
        }

    $connect->close();

    }

    public function query($dbTable,$connect) {

        try
        {
                $sql = "SELECT * FROM $dbTable";
                $result = $connect->query($sql);
                return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function auth($connect,$dbTable,$username,$password) {

        try
        {
            $sql = "SELECT * FROM $dbTable WHERE email='$username' AND  password='".md5($password)."'";
            $result = $connect->query( $sql );
            $row = $result->fetch_assoc();
            if($row["id"] > 0) {
                session_start();
                $_SESSION['userId'] = $row["id"];
                $_SESSION['username'] = $username;
                $_SESSION['first_name'] = $row["first_name"];
                $_SESSION['last_name'] = $row["last_name"];
                return $_SESSION;
            } else {
                throw new Exception('Username or password is wrong');
            }

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function login($connect,$dbTable,$username,$password) {

        try
        {
            $sql = "SELECT * FROM $dbTable WHERE email='$username' AND  password='".md5($password)."'";
            $result = $connect->query( $sql );
            $row = $result->fetch_assoc();
            if($row["id"] > 0) {
                session_start();
                $_SESSION['userId'] = $row["id"];
                $_SESSION['username'] = $username;
                $_SESSION['first_name'] = $row["first_name"];
                $_SESSION['last_name'] = $row["last_name"];

                $response["status"]=1;
                $response["user"]=$_SESSION;
                header('Content-Type: application/json');
                return(json_encode($response));
            } else {
                throw new Exception('Username or password is wrong');
            }

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function register($connect,$dbTable,$first_name,$last_name,$email,$password) {

        try
        {
            $checkUser = "SELECT email FROM $dbTable WHERE email = '".$email."'";
            $resultUser = $connect->query( $checkUser );
            $row = $resultUser->fetch_assoc();
            if ($row["email"])
            {
                throw new Exception('User already exists');
            } else {
                $insertUser = "INSERT INTO $dbTable (first_name, last_name, password, email) VALUES ( '$first_name', '$last_name', '$password', '$email')";
                $resultInsertUser = $connect->query( $insertUser );
                return($resultInsertUser);
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function readUser($connect,$dbTable,$email){
        try
        {
            $readUser = "SELECT * FROM $dbTable WHERE email = '".$email."'";
            $resultReadUser = $connect->query( $readUser );
            $rowUser = $resultReadUser->fetch_assoc();
            return($rowUser);

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function create($connect,$dbTable,$first_name,$last_name,$email,$password) {

        try
        {
            $checkUser = "SELECT email FROM $dbTable WHERE email = '".$email."'";
            $resultUser = $connect->query( $checkUser );
            $row = $resultUser->fetch_assoc();
            if ($row["email"])
            {
                throw new Exception('User already exists');
            } else {
                $insertUser = "INSERT INTO $dbTable (first_name, last_name, password, email) VALUES ( '$first_name', '$last_name', '$password', '$email')";
                $resultInsertUser = $connect->query( $insertUser );
                $response["query_status"]=$resultInsertUser;

                // Leer Usuario: Usar método
                $readUser = "SELECT * FROM $dbTable WHERE email = '".$email."'";
                $resultReadUser = $connect->query( $readUser );
                $rowUser = $resultReadUser->fetch_assoc();
                // Leer Usuario

                $response["created_user"]=$rowUser;
                header('Content-Type: application/json');
                return(json_encode($response));

            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function update($connect,$dbTable,$first_name,$last_name,$email,$password){
        try
        {
            $readUser = "SELECT * FROM $dbTable WHERE email = '".$email."'";
            $resultReadUser = $connect->query( $readUser );
            $rowUser = $resultReadUser->fetch_assoc();

            if ($rowUser["email"])
            {
                //Por Hacer:Automatizar parseo de variables con ciclos recibiendo arreglos
                if(empty($first_name)){
                    $first_name = $rowUser["first_name"];
                } else {
                    $response["new_first_name"] = $first_name;
                }
                if(empty($last_name)){
                    $last_name = $rowUser["last_name"];
                } else {
                    $response["new_last_name"] = $last_name;
                }
                if(empty($password)){
                    $password = $rowUser["password"];
                } else {
                    $response["new_password"] = $password;
                }

                $updateUser = "UPDATE $dbTable SET first_name='".$first_name."', last_name='".$last_name."', password='".$password."' WHERE email = '".$email."'";
                $resultQuery = $connect->query( $updateUser );
                $response["query_status"]=$resultQuery;

                header('Content-Type: application/json');
                return(json_encode($response));

            } else {
                throw new Exception('User does not exists');
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function delete($connect,$dbTable,$email){
        try
        {
                $readUserToDelete = "SELECT * FROM $dbTable WHERE email = '".$email."'";
                $resultReadUserToDelete = $connect->query( $readUserToDelete );
                $rowUser = $resultReadUserToDelete->fetch_assoc();

                $deleteUser = "DELETE from $dbTable WHERE email = '".$email."'";
                $resultQuery = $connect->query( $deleteUser );
                $response["query_status"]=$resultQuery;
                $response["deleted_user"]=$rowUser;
                header('Content-Type: application/json');
                return(json_encode($response));
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function getList($result){
        try
        {
            $count = 0;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[$count]["id"]=$row["id"];
                    $data[$count]["first_name"]=$row["first_name"];
                    $data[$count]["last_name"]=$row["last_name"];
                    $data[$count]["email"]=$row["email"];
                    $count=$count+1;
                }
                $data["count"]=$count;
                header('Content-Type: application/json');
                $response = json_encode($data);
                return($response);

            } else {
                throw new Exception('No data available');
            }

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function show_results($result) {

        try
        {
            $count = 0;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[$count]["id"]=$row["id"];
                    $data[$count]["first_name"]=$row["first_name"];
                    $data[$count]["last_name"]=$row["last_name"];
                    $data[$count]["email"]=$row["email"];
                    $count=$count+1;
                }
                return($data);
            } else {
                throw new Exception('No data available');
            }

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

}

