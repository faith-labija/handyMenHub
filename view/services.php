<?php
include '../settings/connection.php';

// Retrieve distinct service names from the database
$sql = "SELECT DISTINCT service_name FROM services";
$result = $con->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Fetch the distinct service names
    $services = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // If no rows returned, display an error message or handle it as needed
    echo "No services found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose a Service</title>
    <!-- Include CSS file or style the elements directly -->
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

        /* Adjust .form-wrapper styles to fit within the container */
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

        /* Style the select element */
        select {
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

        /* Style the button */
        .button {
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

        .button:hover {
            background: #555;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Choose a Service</h1>
            <select name="service_name">
                <?php foreach ($services as $service): ?>
                    <option value="<?php echo htmlspecialchars($service['service_name']); ?>"><?php echo htmlspecialchars($service['service_name']); ?></option>
                <?php endforeach; ?>
            </select>
            <p><a href="../view/standard_welcome.php" class="button">Go Back</a></p>
        </div>
    </div>
</body>
</html>
