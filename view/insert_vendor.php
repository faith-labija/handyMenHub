<?php

session_start();


include '../settings/connection.php';

// initialization
$first_name = $last_name = $location = $phone = $price_range = '';
$first_name_err = $last_name_err = $location_err = $phone_err = $price_range_err = '';


$user_id = $_SESSION['user_id'];

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validations of data collected
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

    // Check input errors before inserting into database
    if (empty($first_name_err) && empty($last_name_err) && empty($location_err) && empty($phone_err) && empty($price_range_err)) {

        // Check if the user has already inserted their profile
        $check_sql = "SELECT vendor_id FROM vendors WHERE user_id = ?";
        $check_stmt = $con->prepare($check_sql);
        $check_stmt->bind_param("i", $user_id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        if ($check_result->num_rows == 0) {
            
            $sql = "INSERT INTO vendors (user_id, first_name, last_name, location, phone, price_range) VALUES (?, ?, ?, ?, ?, ?)";

            if ($stmt = $con->prepare($sql)) {
               
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
                    exit; 
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

.form-wrapper h2 {
    color: #fff;
    font-size: 2rem;
    text-align: center;
    margin-bottom: 20px;
}


.form-wrapper input[type="text"],
.form-wrapper input[type="tel"] {
    width: 100%;
    height: 40px;
    border-radius: 8px;
    border: none;
    padding: 0 10px;
    margin-bottom: 20px;
    background: #fff;
    color: #333;
    font-size: 1rem;
}


.form-wrapper span {
    color: red;
}


.form-wrapper input[type="submit"] {
    display: block;
    width: 100%;
    background: #333;
    border: none;
    border-radius: 8px;
    color: #fff;
    font-size: 1rem;
    padding: 15px 20px;
    text-decoration: none;
    text-align: center;
    transition: background 0.3s ease;
}

.form-wrapper input[type="submit"]:hover {
    background: #555;
}


.form-wrapper p {
    text-align: center;
}

.form-wrapper a {
    display: block;
    background: #333;
    border: none;
    border-radius: 8px;
    color: #fff;
    font-size: 1rem;
    padding: 15px 20px;
    text-decoration: none;
    margin-bottom: 10px;
    text-align: center;
}

.form-wrapper a:hover {
    background: #555;
}


    </style>
    
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
            <p><a href="vendor_welcome copy.php">Go Back</a></p>
            
        </div>
    </form>

    
</body>
</html>
