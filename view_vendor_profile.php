<?php
// Start session
session_start();

// Include database connection
include '../settings/connection.php';

// Initialize variables
$vendor_id = $first_name = $last_name = $location = $phone = $price_range = '';
$vendor_id_err = '';

// Check if user is logged in
if(isset($_SESSION["user_id"])) {
    // Get the user ID from session
    $user_id = $_SESSION["user_id"];

    // Prepare statement to fetch vendor profile information based on user ID
    $stmt = $con->prepare("SELECT vendor_id, first_name, last_name, location, phone, price_range FROM vendors WHERE user_id = ?");
    
    // Bind parameters
    $stmt->bind_param("i", $user_id);
    
    // Execute statement
    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();
        
        // Check if vendor profile exists
        if ($stmt->num_rows == 1) {
            // Bind result variables
            $stmt->bind_result($vendor_id, $first_name, $last_name, $location, $phone, $price_range);
            
            // Fetch result
            $stmt->fetch();
        } else {
            // If vendor profile does not exist, set error message
            $vendor_id_err = "Vendor profile not found.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    
    // Close statement
    $stmt->close();
}

// Close connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>View Vendor Profile</title>
    
</head>
<body>
    <h1>Vendor Profile</h1>
    <?php if (!empty($vendor_id)): ?>
        <p><strong>Vendor ID:</strong> <?php echo $vendor_id; ?></p>
        <p><strong>Name:</strong> <?php echo $first_name . ' ' . $last_name; ?></p>
        <p><strong>Location:</strong> <?php echo $location; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>Price Range:</strong> <?php echo $price_range; ?></p>
        <button onclick="window.location.href='../view/vendor_welcome.php'">Go Back</button>
        <!-- Additional profile information can be displayed here -->
        
    <?php else: ?>
        <p><?php echo $vendor_id_err; ?></p>
    <?php endif; ?>
</body>
</html>
