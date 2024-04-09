<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, Vendor!</h1>
    <p>You have access to additional options such as editing services offered.</p>
    <p><a href="edit_vendor_profile.php">Edit profile</a></p>
    <p><a href="../actions/delete_profile_action.php" onclick="return confirm('Are you sure you want to delete your profile? This action cannot be undone.');">Delete profile</a></p>
    <p><a href="view_vendor_profile.php">View profile</a></p>
    
    <p><a href="view_bookings.php">View Bookings</a></p>
    <p><a href="view_review.php">View Reviews</a></p>
    <p><a href="insert_vendor.php">set up Profile</a></p>
    <p><a href="insert_services.php">Add your services</a></p>
    <!-- Other vendor-specific content -->
    <p><a href="../login/logout.php">Logout</a></p>
</body>
</html>
