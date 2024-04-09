<?php
// Start session
session_start();

// Include database connection
include '../settings/connection.php';

// Initialize variables
$user_id = $first_name = $last_name = $location = $phone = $price_range = '';
$user_id_err = '';

// Check if user is logged in
if(isset($_SESSION["user_id"])) {
    // Get the user ID from session
    $user_id = $_SESSION["user_id"];

    // Prepare statement to fetch vendor profile information based on user ID
    $stmt = $con->prepare("SELECT first_name, last_name, location, phone, price_range FROM vendors WHERE user_id = ?");
    
    // Bind parameters
    $stmt->bind_param("i", $user_id);
    
    // Execute statement
    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        
        // Check if vendor profile exists
        if ($stmt->num_rows == 1) {
            // Bind result variables
            $stmt->bind_result($first_name, $last_name, $location, $phone, $price_range);
            
            // Fetch result
            $stmt->fetch();
        } else {
            // If vendor profile does not exist, set error message
            $user_id_err = "Vendor profile not found.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    
    // Close statement
    $stmt->close();
} else {
    // If user is not logged in, redirect to login page
    header("location: ../login/loginPage.php");
    exit;
}

// Close connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vendor Profile</title>
</head>
<body>
    <h2>Edit Vendor Profile</h2>
    <form action="../actions/edit_vendor_profile_action.php" method="post">
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" value="<?php echo $first_name; ?>">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>">
        </div>
        <div>
            <label>Location</label>
            <input type="text" name="location" value="<?php echo $location; ?>">
        </div>
        <div>
            <label>Phone</label>
            <input type="tel" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div>
            <label>Price Range</label>
            <input type="text" name="price_range" value="<?php echo $price_range; ?>">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>
