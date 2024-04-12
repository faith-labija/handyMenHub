<?php

session_start();


include '../settings/connection.php';


if(isset($_SESSION["user_id"])) {
    // Get the user ID from session
    $user_id = $_SESSION["user_id"];

    // Prepare statement to delete vendor profile based on user ID
    $stmt = $con->prepare("DELETE FROM vendors WHERE user_id = ?");
    
   
    $stmt->bind_param("i", $user_id);
    
    
    if ($stmt->execute()) {
        // Delete successful, redirect to logout page
        header("location: ../login/logout.php");
    } else {
        // Delete failed, redirect to error page
        header("location: ../error.php");
    }
    
    
    $stmt->close();
} else {
    // If user is not logged in, redirect to login page
    header("location: ../login/loginPage.php");
}


$con->close();
?>
