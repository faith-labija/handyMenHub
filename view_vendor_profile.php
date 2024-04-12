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
    <link rel="stylesheet" href="path_to_bootstrap_css/bootstrap-grid.min.css">
    <style>
        body {
            background: url('https://st.depositphotos.com/1031174/1997/i/950/depositphotos_19971449-stock-photo-work-tools.jpg') center fixed;
            background-size: cover;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-wrapper {
            border-radius: 20px;
            padding: 40px;
            background: burlywood;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        .form-wrapper h1 {
            color: #fff;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-wrapper p {
            color: #fff;
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .form-wrapper button {
            display: block;
            background: #333;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            padding: 15px 20px;
            text-decoration: none;
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }
        .form-wrapper button:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Vendor Profile</h1>
            <?php if (!empty($vendor_id)): ?>
                <p><strong>Vendor ID:</strong> <?php echo $vendor_id; ?></p>
                <p><strong>Name:</strong> <?php echo $first_name . ' ' . $last_name; ?></p>
                <p><strong>Location:</strong> <?php echo $location; ?></p>
                <p><strong>Phone:</strong> <?php echo $phone; ?></p>
                <p><strong>Price Range:</strong> <?php echo $price_range; ?></p>
                <button onclick="window.location.href='../view/vendor_welcome.php'" class="form-control">Go Back</button>
                <!-- Additional profile information can be displayed here -->
            <?php else: ?>
                <p><?php echo $vendor_id_err; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
