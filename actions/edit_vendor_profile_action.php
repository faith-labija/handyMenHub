<?php

session_start();


include '../settings/connection.php';


if(isset($_SESSION["user_id"])) {
    // Get the user ID from session
    $user_id = $_SESSION["user_id"];

    // Initialize variables
    $first_name = $last_name = $location = $phone = $price_range = '';
    $first_name_err = $last_name_err = $location_err = $phone_err = $price_range_err = '';

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Validations
        if (empty(trim($_POST["first_name"]))) {
            $first_name_err = "Please enter first name.";
        } else {
            $first_name = trim($_POST["first_name"]);
        }

        
        if (empty(trim($_POST["last_name"]))) {
            $last_name_err = "Please enter last name.";
        } else {
            $last_name = trim($_POST["last_name"]);
        }

        
        if (empty(trim($_POST["location"]))) {
            $location_err = "Please enter location.";
        } else {
            $location = trim($_POST["location"]);
        }

        
        if (empty(trim($_POST["phone"]))) {
            $phone_err = "Please enter phone number.";
        } else {
            $phone = trim($_POST["phone"]);
        }

        
        if (empty(trim($_POST["price_range"]))) {
            $price_range_err = "Please enter price range.";
        } else {
            $price_range = trim($_POST["price_range"]);
        }

        // Check input errors before updating the database
        if (empty($first_name_err) && empty($last_name_err) && empty($location_err) && empty($phone_err) && empty($price_range_err)) {
            // Prepare an update statement
            $sql = "UPDATE vendors SET first_name=?, last_name=?, location=?, phone=?, price_range=? WHERE user_id=?";

            if ($stmt = $con->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("sssssi", $param_first_name, $param_last_name, $param_location, $param_phone, $param_price_range, $param_user_id);

                // Set parameters
                $param_first_name = $first_name;
                $param_last_name = $last_name;
                $param_location = $location;
                $param_phone = $phone;
                $param_price_range = $price_range;
                $param_user_id = $user_id;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Redirect to profile page after successful update
                    header("location: ../view/view_vendor_profile.php");
                    exit;
                } else {
                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }
    }
} else {
    // If user is not logged in, redirect to login page
    header("location: ../login/loginPage.php");
    exit;
}

// Close connection
$con->close();
?>
