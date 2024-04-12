<?php
// Start session
session_start();

// Include database connection
include '../settings/connection.php';

// Initialize variables
$first_name = $last_name = $location = $phone = $price_range = '';
$vendor_id_err = '';

// Check if user is logged in
if(isset($_SESSION["user_id"])) {
    // Get the user ID from session
    $user_id = $_SESSION["user_id"];

    // Prepare statement to fetch vendor profile information based on user ID
    $stmt_vendor = $con->prepare("SELECT vendor_id, first_name, last_name, location, phone, price_range FROM vendors WHERE user_id = ?");
    
    // Bind parameters
    $stmt_vendor->bind_param("i", $user_id);
    
    // Execute statement
    if ($stmt_vendor->execute()) {
        // Store result
        $stmt_vendor->store_result();
        
        // Check if vendor profile exists
        if ($stmt_vendor->num_rows == 1) {
            // Bind result variables
            $stmt_vendor->bind_result($vendor_id, $first_name, $last_name, $location, $phone, $price_range);
            
            // Fetch result
            $stmt_vendor->fetch();
            
            // Prepare statement to fetch services associated with the vendor
            $stmt_services = $con->prepare("SELECT DISTINCT service_name, description FROM services WHERE vendor_id = ?");
            
            // Bind parameters
            $stmt_services->bind_param("i", $vendor_id);
            
            // Execute statement
            if ($stmt_services->execute()) {
                // Store result
                $stmt_services->store_result();
            }
        } else {
            // If vendor profile does not exist, set error message
            $vendor_id_err = "Vendor profile not found.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    
    // Close statements
    $stmt_vendor->close();
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
            color: #fff;
        }
        .form-wrapper h1 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-wrapper p {
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
        .form-wrapper ul {
            list-style-type: none;
            padding: 0;
        }
        .form-wrapper li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Vendor Profile</h1>
            <?php if (!empty($first_name)): ?>
                <p><strong>Name:</strong> <?php echo $first_name . ' ' . $last_name; ?></p>
                <p><strong>Location:</strong> <?php echo $location; ?></p>
                <p><strong>Phone:</strong> <?php echo $phone; ?></p>
                <p><strong>Price Range:</strong> <?php echo $price_range; ?></p>
                <?php if ($stmt_services->num_rows > 0): ?>
                    <h2>Services Offered</h2>
                    <ul>
                        <?php
                        // Bind result variables for services
                        $stmt_services->bind_result($service_name, $description);
                        
                        // Fetch and display services
                        while ($stmt_services->fetch()) {
                            echo "<li><strong>Service Name:</strong> $service_name</li>";
                            echo "<li><strong>Description:</strong> $description</li>";
                        }
                        ?>
                    </ul>
                <?php else: ?>
                    <p>No services offered by this vendor.</p>
                <?php endif; ?>
                <button onclick="window.location.href='../view/vendor_welcome copy.php'">Go Back</button>
            <?php else: ?>
                <p><?php echo $vendor_id_err; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
