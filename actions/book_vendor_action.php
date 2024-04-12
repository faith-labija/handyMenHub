<?php
session_start();

include '../settings/connection.php';

// error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $vendor_first_name = $_POST['vendor_first_name']; 
    $vendor_phone = $_POST['vendor_phone']; 
    
    // Fetch user's name from the users table using user_id
    if(isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        
        // Prepare statement to fetch user's name
        $stmt_user = $con->prepare("SELECT name FROM users WHERE user_id = ?");
        $stmt_user->bind_param("i", $user_id);
        $stmt_user->execute();
        $stmt_user->store_result();
        
        if ($stmt_user->num_rows == 1) {
            $stmt_user->bind_result($student_name);
            $stmt_user->fetch();
        } else {
            // Handle error if user is not found
            echo "User not found.";
            exit();
        }
        
        $stmt_user->close();
    } else {
        // Handle error if user_id is not set in session
        echo "User ID not found in session.";
        exit();
    }
    
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
    } 
} else {
    
    // If accessed via GET request or directly without form submission
    echo "Invalid request method. Please submit the form.";
}
?>
