<?php
include '../settings/connection.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

if (isset($_POST['signUp'])) {
    $fname = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $role = $_POST['role'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind parameters to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO users (email, password, ut_id, name, phone, location) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die('Prepare failed: ' . $con->error);
    }

    $ut_id = ($role == 'vendor') ? 2 : 3;

    // Bind parameters

    $stmt->bind_param("ssisss", $email, $hashed_password, $ut_id, $fname, $tel, $location);

    // Execute the statement
    if ($stmt->execute()) {
        header("location: ../login/loginPage.php");
        exit(); 
    } elseif (!$stmt->execute()) {
        die('Execute failed: ' . $stmt->error);
    }

  
    $stmt->close();
} else {
    echo 'Form submission not detected.';
}
