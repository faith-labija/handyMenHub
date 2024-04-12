<?php

$serverName = "localhost";
$userName = "root";
$password = "Password@2024";
$dbName = "handyMen";

//create connection 

$con = mysqli_connect($serverName, $userName, $password, $dbName);

// Check connection
if ($con) {
}
else {
  echo "Condition not met!";
  die("Connection failed: " . mysqli_connect_error());

}
