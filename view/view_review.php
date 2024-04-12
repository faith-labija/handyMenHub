<?php
include '../settings/connection.php';


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Vendor Reviews</title>
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
            width: 800px; /* Adjust width to fit the content */
            max-width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            color: #fff;
            overflow-x: auto; /* Enable horizontal scrolling if needed */
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
            width: 100%; /* Make table width 100% */
        }
    </style>
</head>
<body>
    <div class=\"container\">
        <div class=\"form-wrapper\">
            <h1>Vendor Reviews</h1>";

// Fetch reviews data from the database, ordered by vendor_id
$sql = "SELECT r.review_id, u.name AS user_name, v.first_name AS vendor_name, r.rating, r.note, r.date_posted
        FROM reviews r
        INNER JOIN users u ON r.user_id = u.user_id
        INNER JOIN vendors v ON r.vendor_id = v.vendor_id
        ORDER BY r.vendor_id";
$result = $con->query($sql);


if ($result === false) {
    echo "Error executing the query: " . $con->error;
} else {
    
    if ($result->num_rows > 0) {
        // Display reviews in a table
        echo "<table border='1'>
                <tr>
                    <th>Review ID</th>
                    <th>User Name</th>
                    <th>Vendor Name</th>
                    <th>Rating</th>
                    <th>Note</th>
                    <th>Date Posted</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["review_id"] . "</td>
                    <td>" . $row["user_name"] . "</td>
                    <td>" . $row["vendor_name"] . "</td>
                    <td>" . $row["rating"] . "</td>
                    <td>" . $row["note"] . "</td>
                    <td>" . $row["date_posted"] . "</td>
                  </tr>";
        }
        echo "</table>";
        echo "<button onclick=\"window.location.href='../view/vendor_welcome copy.php'\">Go Back</button>";
    } else {
        echo "No reviews found";
    }
}


$con->close();


echo "</div>
    </div>
</body>
</html>";
?>
