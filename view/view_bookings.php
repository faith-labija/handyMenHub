<?php
session_start();

include '../settings/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Bookings</title>
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
            width: 800px; 
            max-width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            color: #fff;
            overflow-x: auto; 
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
        .form-wrapper table {
            width: 100%; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <?php
            
            if (!isset($_SESSION['user_id'])) {
                echo "You are not logged in. Please log in first.";
                exit();
            }

            // Retrieve user ID from session
            $user_id = $_SESSION['user_id'];

            // Retrieve vendor ID from the vendors table based on the user ID
            $stmt = $con->prepare("SELECT vendor_id, first_name FROM vendors WHERE user_id = ?");
            if ($stmt) {
                $stmt->bind_param("s", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $vendor_id = $row['vendor_id'];
                    $vendor_first_name = $row['first_name'];
                } else {
                    echo "Vendor details not found for this user.";
                    exit();
                }
            } else {
                echo "An error occurred while retrieving vendor details.";
                exit();
            }

            // Retrieve bookings for the vendor using the vendor's first name
            $stmt = $con->prepare("SELECT students_name, student_email, students_location, desired_service, date, time, Notes FROM confirm_bookings WHERE vendor_first_name = ?");
            if ($stmt) {
                $stmt->bind_param("s", $vendor_first_name);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    // Display booking information
                    echo "<h1>Bookings for Vendor: $vendor_first_name</h1>";
                    echo "<table border='1'>";
                    echo "<tr><th>Student Name</th><th>Student Email</th><th>Student Location</th><th>Desired Service</th><th>Date</th><th>Time</th><th>Notes</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['students_name']."</td>";
                        echo "<td>".$row['student_email']."</td>";
                        echo "<td>".$row['students_location']."</td>";
                        echo "<td>".$row['desired_service']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['time']."</td>";
                        echo "<td>".$row['Notes']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<button onclick=\"window.location.href='../view/vendor_welcome copy.php'\">Go Back</button>";

                } else {
                    echo "No bookings found for this vendor.";
                }
            } else {
                echo "An error occurred while retrieving bookings.";
            }
            ?>
        </div>
    </div>
</body>
</html>
