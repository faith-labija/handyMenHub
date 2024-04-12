<?php

session_start();


include '../settings/connection.php';

// Check if service_id is set and not empty
if(isset($_POST['service_id']) && !empty($_POST['service_id'])) {
    
    $service_id = $_POST['service_id'];

    // Prepare statement to delete the service
    $stmt = $con->prepare("DELETE FROM services WHERE service_id = ?");
    
    
    $stmt->bind_param("i", $service_id);
    
    
    if ($stmt->execute()) {
        // If deletion is successful, redirect back to the edit vendor profile page
        header("Location: ../view/edit_vendor_profile.php");
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error: Unable to delete the service. Please try again.";
    }
    
    // Close statement
    $stmt->close();
} else {
    // If service_id is not set or empty, redirect back to the edit vendor profile page
    header("Location: ../view/edit_vendor_profile.php");
    exit();
}


$con->close();
?>
