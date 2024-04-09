<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // If not logged in, redirect to login page
    header("Location: ../login/loginPage.php");
    exit();
}

// Check the user's role
$user_role = $_SESSION["user_role"];

// Include different content based on the user's role
if ($user_role == 2) { // Vendor
    include 'vendor_welcome.php';
} else { // Standard user
    include 'standard_welcome.php';
}
?>
