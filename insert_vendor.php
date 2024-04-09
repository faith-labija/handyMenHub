<?php
// Start session
session_start();

// Include database connection
include '../settings/connection.php';

// Define variables and initialize with empty values
$first_name = $last_name = $location = $phone = $price_range = '';
$first_name_err = $last_name_err = $location_err = $phone_err = $price_range_err = '';

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (empty(trim($_POST["first_name"]))) {
        $first_name_err = "Please enter first name.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    // Validate last name
    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Please enter last name.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }

    // Validate location
    if (empty(trim($_POST["location"]))) {
        $location_err = "Please enter location.";
    } else {
        $location = trim($_POST["location"]);
    }

    // Validate phone
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter phone number.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Validate price range
    if (empty(trim($_POST["price_range"]))) {
        $price_range_err = "Please enter price range.";
    } else {
        $price_range = trim($_POST["price_range"]);
    }

    // Check input errors before inserting into database
    if (empty($first_name_err) && empty($last_name_err) && empty($location_err) && empty($phone_err) && empty($price_range_err)) {
        // Check if the user has already inserted their profile
        $check_sql = "SELECT vendor_id FROM vendors WHERE user_id = ?";
        $check_stmt = $con->prepare($check_sql);
        $check_stmt->bind_param("i", $user_id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        if ($check_result->num_rows == 0) {
            // Prepare an insert statement
            $sql = "INSERT INTO vendors (user_id, first_name, last_name, location, phone, price_range) VALUES (?, ?, ?, ?, ?, ?)";

            if ($stmt = $con->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("isssss", $param_user_id, $param_first_name, $param_last_name, $param_location, $param_phone, $param_price_range);

                // Set parameters
                $param_user_id = $user_id;
                $param_first_name = $first_name;
                $param_last_name = $last_name;
                $param_location = $location;
                $param_phone = $phone;
                $param_price_range = $price_range;

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Success message with SweetAlert
                    echo 'added succesfuly';
                    exit; // Stop further execution
                } else {
                    echo 'could not add profile,try again';
                    
                    

                }
                

                // Close statement
                $stmt->close();
            }
        } else {
            echo 'you cannot add profile more than once!';
        }
        
    }

    // Close connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Vendor</title>
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
</head>
<body>
    <h2>Insert Vendor</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" value="<?php echo $first_name; ?>">
            <span><?php echo $first_name_err; ?></span>
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>">
            <span><?php echo $last_name_err; ?></span>
        </div>
        <div>
            <label>Location</label>
            <input type="text" name="location" value="<?php echo $location; ?>">
            <span><?php echo $location_err; ?></span>
        </div>
        <div>
            <label>Phone</label>
            <input type="tel" name="phone" value="<?php echo $phone; ?>">
            <span><?php echo $phone_err; ?></span>
        </div>
        <div>
            <label>Price Range</label>
            <input type="text" name="price_range" value="<?php echo $price_range; ?>">
            <span><?php echo $price_range_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Submit">
            <p><a href="vendor_welcome.php">Go Back</a></p>
            
        </div>
    </form>

    <!-- Include SweetAlert library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</body>
</html>
