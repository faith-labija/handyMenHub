<?php

session_start();

// Unset the session variables
unset($_SESSION["user_id"]);
unset($_SESSION["name"]);

// Redirect to login_view page
header("Location:../login/loginPage.php");
exit(); 
?>