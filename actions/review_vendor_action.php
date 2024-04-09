<?php
session_start();
include '../settings/connection.php';

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $vendor_first_name = $_POST['vendor_first_name']; // New field
    $vendor_phone = $_POST['vendor_phone']; // New field
    $rating = $_POST['rating'];
    $note = $_POST['note'];
    $date = $_POST['date'];

    // Fetch vendor_id using vendor's first name and phone number
    $get_vendor_id_sql = "SELECT vendor_id FROM vendors WHERE first_name = ? AND phone = ?";
    $get_vendor_id_stmt = $con->prepare($get_vendor_id_sql);
    $get_vendor_id_stmt->bind_param("ss", $vendor_first_name, $vendor_phone);
    $get_vendor_id_stmt->execute();
    $get_vendor_id_result = $get_vendor_id_stmt->get_result();

    // Check if vendor ID is found
    if ($get_vendor_id_result->num_rows > 0) {
        $vendor_row = $get_vendor_id_result->fetch_assoc();
        $vendor_id = $vendor_row['vendor_id'];

        // Retrieve user_id from session
        $user_id = $_SESSION['user_id'];

        // Insert data into the reviews table
        $insert_review_sql = "INSERT INTO reviews (user_id, vendor_id, rating, note, date_posted) VALUES (?, ?, ?, ?, ?)";
        $insert_review_stmt = $con->prepare($insert_review_sql);
        if ($insert_review_stmt) {
            // Bind parameters and execute the statement
            $insert_review_stmt->bind_param("iiiss", $user_id, $vendor_id, $rating, $note, $date);
            if ($insert_review_stmt->execute()) {
                // Successful insertion
                echo "Review submitted successfully!";
                exit();
            } else {
                // Error handling
                echo "An error occurred while submitting the review. Please try again.";
            }
        } else {
            // Error handling
            echo "An error occurred while preparing the statement. Please try again.";
        }
    } else {
        // If vendor ID is not found
        echo "Vendor not found with provided details.";
    }

    // Close statement and result set
    $get_vendor_id_stmt->close();
    $get_vendor_id_result->close();
} else {
    // If accessed via GET request or directly without form submission
    echo "Invalid request method. Please submit the form.";
}
?>
