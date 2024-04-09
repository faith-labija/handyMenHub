<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "handyMen";

//create connection 

$con = mysqli_connect($serverName, $userName, $password, $dbName);

// Check connection
if ($con) {
  echo "Successful!";
}
else {
  echo "Condition not met!";
  die("Connection failed: " . mysqli_connect_error());

}
