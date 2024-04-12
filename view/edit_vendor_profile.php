<?php

session_start();


include '../settings/connection.php';

// Initialize variables
$user_id = $first_name = $last_name = $location = $phone = $price_range = '';
$user_id_err = '';


if(isset($_SESSION["user_id"])) {
    // Get the user ID from session
    $user_id = $_SESSION["user_id"];

    // Prepare statement to fetch vendor profile information based on user ID
    $stmt = $con->prepare("SELECT vendor_id, first_name, last_name, location, phone, price_range FROM vendors WHERE user_id = ?");
    
    
    $stmt->bind_param("i", $user_id);
    
    
    if ($stmt->execute()) {
      
        $stmt->store_result();
        
        // Check if vendor profile exists
        if ($stmt->num_rows == 1) {
            
            $stmt->bind_result($vendor_id, $first_name, $last_name, $location, $phone, $price_range);
            
            
            $stmt->fetch();
            
            // Prepare statement to fetch services associated with the vendor
            $stmt_services = $con->prepare("SELECT service_id, service_name, description FROM services WHERE vendor_id = ?");
            
            
            $stmt_services->bind_param("i", $vendor_id);
            
            
            if ($stmt_services->execute()) {
                
                $result = $stmt_services->get_result();
            }
        } else {
            // If vendor profile does not exist, set error message
            $user_id_err = "Vendor profile not found.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    
    
    $stmt->close();
} else {
    // If user is not logged in, redirect to login page
    header("location: ../login/loginPage.php");
    exit;
}


$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vendor Profile</title>
    <style>
        body {
    background: url('https://st.depositphotos.com/1031174/1997/i/950/depositphotos_19971449-stock-photo-work-tools.jpg') center fixed;
    background-size: cover;
}
    </style>
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

    <!-- Display services offered by the vendor -->
    <?php if (isset($result) && $result->num_rows > 0): ?>
        <h2>Services Offered</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <strong>Service Name:</strong> <?php echo $row['service_name']; ?> - 
                    <strong>Description:</strong> <?php echo $row['description']; ?> 
                    <form action="../actions/delete_service_action.php" method="post" style="display: inline;">
                        <input type="hidden" name="service_id" value="<?php echo $row['service_id']; ?>">
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this service?');">
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No services offered by this vendor.</p>
    <?php endif; ?>
</body>
</html>
