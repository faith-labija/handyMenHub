<?php
include '../settings/connection.php';

session_start();

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $data = mysqli_fetch_assoc($result);
        $testing = password_verify($password, $data['password']);

        if ($testing == true) {
            $_SESSION["user_role"] = $data['ut_id'];
            $_SESSION["user_id"] = $data['user_id'];
            header("Location: ../view/welcome.php");
            exit();
        } else {
            echo "INVALID password";
        }
    } else {
        echo "User not found";
    }
} else {
    echo 'Form submission not detected.';
}
?>
