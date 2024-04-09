<?php
include '../settings/connection.php';

// Check if the database connection is successful
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

// Check if the query was executed successfully
if ($result === false) {
    die("Error executing the query: " . $con->error);
}

// Check if there are any reviews
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
    echo "<button onclick=\"window.location.href='../view/vendor_welcome.php'\">Go Back</button>";
} else {
    echo "No reviews found";
}

// Close database connection
$con->close();
?>
