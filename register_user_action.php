<?php
include 'settings/connection.php';

if (isset($_POST['signUp'])) {
    $fname = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $role = $_POST['role'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind parameters to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO Users (email, password, ut_id, name, phone, location) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        // Error handling
        die('Error: ' . $con->error);
    }

    $ut_id=($role=='vendor')?2:3;

    // Bind parameters
    
    $stmt->bind_param("ssissi", $email, $hashed_password, $ut_id, $fname, $tel, $location);

    // Execute the statement
    if ($stmt->execute()) {
        header("location: login/loginPage.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        // Error handling
        echo "Registration failed: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo 'Form submission not detected.';
}
?>
