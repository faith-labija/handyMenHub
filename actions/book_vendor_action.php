<?php
session_start();

include '../settings/connection.php';

// error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $vendor_first_name = $_POST['vendor_first_name']; 
    $vendor_phone = $_POST['vendor_phone']; 
    $student_name = $_POST['student_name'];
    $location = $_POST['student_location'];
    $phone = $_POST['student_phone'];
    $student_email = $_POST['student_email']; 
    $desired_service = $_POST['desired_service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];
    
    // Insert data into the confirm_bookings table
    $stmt = $con->prepare("INSERT INTO confirm_bookings (vendor_first_name, vendor_phone_number, students_name, students_location, students_phone, student_email, desired_service, date, time, Notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssssssssss", $vendor_first_name, $vendor_phone, $student_name, $location, $phone, $student_email, $desired_service, $date, $time, $notes);
        if ($stmt->execute()) {
            // Successful insertion
            echo "Booking successful!";
            exit();
        } else {
            
            echo "An error occurred while booking. Please try again.";
        }
    
} else {
    // If accessed via GET request or directly without form submission
    echo "Invalid request method. Please submit the form.";
}
?>
