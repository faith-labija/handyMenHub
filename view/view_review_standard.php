<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    
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

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #fff;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
        }

        
        button {
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

        button:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Reviews</h1>
            <?php
            include '../settings/connection.php';

            
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            // Fetch reviews data from the database, ordered by vendor_id
            $sql = "SELECT r.review_id, u.name AS user_name, v.first_name AS vendor_name, r.rating, r.note, r.date_posted
                    FROM reviews r
                    INNER JOIN users u ON r.user_id = u.user_id
                    INNER JOIN vendors v ON r.vendor_id = v.vendor_id
                    ORDER BY r.vendor_id";
            $result = $con->query($sql);

            
            if ($result === false) {
                die("Error executing the query: " . $con->error);
            }

            
            if ($result->num_rows > 0) {
                // Display reviews in a table
                echo "<table>
                        <tr>
                            <th>User Name</th>
                            <th>Vendor Name</th>
                            <th>Rating</th>
                            <th>Note</th>
                            <th>Date Posted</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["user_name"] . "</td>
                            <td>" . $row["vendor_name"] . "</td>
                            <td>" . $row["rating"] . "</td>
                            <td>" . $row["note"] . "</td>
                            <td>" . $row["date_posted"] . "</td>
                          </tr>";
                }
                echo "</table>";
                echo "<button onclick=\"window.location.href='../view/standard_welcome.php'\">Go Back</button>";
            } else {
                echo "No reviews found";
            }

            
            $con->close();
            ?>
        </div>
    </div>
</body>
</html>
