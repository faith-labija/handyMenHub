<?php
// Start the session
session_start();

// Function to check if user is logged in
function userLoggedIn() {
    // Check if the user_id session variable is set
    return isset($_SESSION['user_id']);

}

// Example usage:
if (userLoggedIn()) {
    echo "User is logged in.";
    
    
} else {
    echo "User is not logged in.";
    header("Location: ../login/loginPage.php");
    echo "User is not logged in.";
    die();
}
?>