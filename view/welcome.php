<?php
session_start();


if (!isset($_SESSION["user_id"])) {
    // If not logged in, redirect to login page
    header("Location: ../login/loginPage.php");
    exit();
}


$user_role = $_SESSION["user_role"];

// Include different content based on the user's role
if ($user_role == 2) { // Vendor
    include 'vendor_welcome copy.php';
} else { // Standard user
    include 'standard_welcome.php';
}
?>
