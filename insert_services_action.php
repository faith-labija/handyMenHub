<?php
// Start session
session_start();

// Include database connection
include '../settings/connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user input
    $service_name = $_POST['service_name'] ?? '';
    $description = $_POST['description'] ?? '';

    // Validate service name
    if (empty($service_name)) {
        $_SESSION['error_message'] = "Please enter service name.";
        header("Location:../view/insert_services.php");
        exit();
    }

    // Validate description
    if (empty($description)) {
        $_SESSION['error_message'] = "Please enter description.";
        header("Location:../view/insert_services.php");
        exit();
    }

    // Retrieve user ID from session
    $user_id = $_SESSION['user_id'];

    // Fetch vendor ID corresponding to the user ID
    $get_vendor_id_sql = "SELECT vendor_id FROM vendors WHERE user_id = ?";
    $get_vendor_id_stmt = $con->prepare($get_vendor_id_sql);
    $get_vendor_id_stmt->bind_param("i", $user_id);
    $get_vendor_id_stmt->execute();
    $get_vendor_id_result = $get_vendor_id_stmt->get_result();

    // Check if vendor ID is found
    if ($get_vendor_id_result->num_rows > 0) {
        $vendor_row = $get_vendor_id_result->fetch_assoc();
        $vendor_id = $vendor_row['vendor_id'];

        // Prepare and execute SQL statement to insert new service
        $insert_service_sql = "INSERT INTO services (vendor_id, service_name, description) VALUES (?, ?, ?)";
        $insert_service_stmt = $con->prepare($insert_service_sql);
        $insert_service_stmt->bind_param("iss", $vendor_id, $service_name, $description);

        if ($insert_service_stmt->execute()) {
            // Service inserted successfully
            $_SESSION['success_message'] = "Service added successfully!";
            header("Location:../view/insert_services.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Error inserting service. Please try again.";
        }

        // Close statement
        $insert_service_stmt->close();
    } else {
        $_SESSION['error_message'] = "Error: Vendor ID not found for the user.";
    }

    // Close prepared statement
    $get_vendor_id_stmt->close();
}

// Close connection
$con->close();

// If there was an error, redirect back to the form page with an error message
header("Location:../view/insert_services.php");
exit();
?>
