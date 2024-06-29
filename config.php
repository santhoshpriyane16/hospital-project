<?php
session_start();
//error_reporting(0);



$servername= "localhost";
$username= "root";
$password= "";
$db_name="hospital";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    //echo $conn; set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected succesfully";
}
catch(PDOException $e )
    {
        echo "connection failed:" . $e->getMessage();exit;
    }
?>