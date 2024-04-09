<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendors</title>
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

        .form-wrapper h2 {
            color: #fff;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style the vendor cards */
        .vendor-card {
            background: #333;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .vendor-card h2 {
            margin-bottom: 10px;
        }

        .vendor-card p {
            margin-bottom: 5px;
        }

        .vendor-card ul {
            padding-left: 20px;
        }

        .vendor-card li {
            margin-bottom: 5px;
        }

        /* Style the buttons */
        .vendor-card form button {
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
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        .vendor-card form button:hover {
            background: #555;
        }

        /* Style the "Go Back" button */
        .form-wrapper a.button {
            display: block;
            background: #333;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            padding: 15px 20px;
            text-decoration: none;
            text-align: center;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .form-wrapper a.button:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Vendors</h2>
            <?php 
            include '../settings/connection.php';

            // Retrieve list of all vendors with complete information
            $sql = "SELECT * FROM vendors 
                    WHERE first_name IS NOT NULL AND last_name IS NOT NULL 
                    AND location IS NOT NULL AND phone IS NOT NULL 
                    AND price_range IS NOT NULL";
            $result = $con->query($sql);

            // Check if vendors data is available
            if ($result && $result->num_rows > 0) {
                // Fetch vendors data as an associative array
                $vendors = $result->fetch_all(MYSQLI_ASSOC);

                // Loop through each vendor
                foreach ($vendors as $vendor) {
                    // Display vendor information only if all required fields are not null
                    if ($vendor['first_name'] && $vendor['last_name'] && $vendor['location'] && $vendor['phone'] && $vendor['price_range']) {
                        // Display vendor information
                        echo "<div class='vendor-card'>";
                        echo "<h2>{$vendor['first_name']} {$vendor['last_name']}</h2>";
                        echo "<p><strong>Location:</strong> {$vendor['location']}</p>";
                        echo "<p><strong>Phone:</strong> {$vendor['phone']}</p>";
                        echo "<p><strong>Price Range:</strong> {$vendor['price_range']}</p>";

                        // Fetch and display vendor's services
                        $services_sql = "SELECT DISTINCT service_name, description FROM services WHERE vendor_id = {$vendor['vendor_id']}";
                        $services_result = $con->query($services_sql);
                        if ($services_result && $services_result->num_rows > 0) {
                            echo "<p><strong>Services:</strong></p>";
                            echo "<ul>";
                            while ($service = $services_result->fetch_assoc()) {
                                echo "<li><strong>{$service['service_name']}:</strong> {$service['description']}</li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "<p>No services found for this vendor.</p>";
                        }

                        // Display buttons with vendor ID as value
                        echo "<form action='../view/book_vendor.php' method='POST'>";
                        echo "<input type='hidden' name='vendor_id' value='{$vendor['vendor_id']}'>"; // Pass vendor ID to book vendor page
                        echo "<button type='submit'>Book Me</button>";
                        echo "</form>";
                        echo "<form action='../view/review_vendor.php' method='POST'>";
                        echo "<input type='hidden' name='vendor_id' value='{$vendor['vendor_id']}'>"; // Pass vendor ID to review vendor page
                        echo "<button type='submit'>Review Me</button>";
                        echo "</form>";

                        echo "</div>";
                    }
                }
            } else {
                // If no vendors found, display a message
                echo "No vendors found with complete information.";
            }
            ?>
            <!-- Go back button -->
            <p><a href="../view/standard_welcome.php" class="button">Go Back</a></p>
        </div>
    </div>
</body>
</html>
