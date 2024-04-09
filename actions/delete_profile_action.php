<?php
// Start session
session_start();

// Include database connection
include '../settings/connection.php';

// Check if user is logged in
if(isset($_SESSION["user_id"])) {
    // Get the user ID from session
    $user_id = $_SESSION["user_id"];

    // Prepare statement to delete vendor profile based on user ID
    $stmt = $con->prepare("DELETE FROM vendors WHERE user_id = ?");
    
    // Bind parameters
    $stmt->bind_param("i", $user_id);
    
    // Execute statement
    if ($stmt->execute()) {
        // Delete successful, redirect to logout page
        header("location: ../login/logout.php");
    } else {
        // Delete failed, redirect to error page
        header("location: ../error.php");
    }
    
    // Close statement
    $stmt->close();
} else {
    // If user is not logged in, redirect to login page
    header("location: ../login/loginPage.php");
}

// Close connection
$con->close();
?>
