<?php
include '../settings/connection.php';

// Retrieve all vendors from the database
$sql = "SELECT * FROM vendors";
$result = $con->query($sql);
$vendors = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Vendors</title>
</head>
<body>
    <h1>All Vendors</h1>
    <?php foreach ($vendors as $vendor): ?>
        <div>
            <h2><?php echo $vendor['vendor_name']; ?></h2>
            <p><?php echo $vendor['description']; ?></p>
            <!-- Other vendor details -->
            <a href="booking_form.php?vendor_id=<?php echo $vendor['vendor_id']; ?>">Book Me</a>
            <a href="review_form.php?vendor_id=<?php echo $vendor['vendor_id']; ?>">Review Me</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
