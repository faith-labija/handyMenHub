<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>    
    
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
            background-color: "green";
        }

        .form-wrapper {
            border-radius: 20px;
            padding: 40px;
            background: burlywood;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .form-wrapper h1,
        .form-wrapper p {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
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
    <div class="container">
        <div class="form-wrapper">
            <h1>Welcome, Vendor!</h1>
            <p>You have access to additional options such as editing services offered.</p>
            <p><a href="edit_vendor_profile.php">Edit profile</a></p>
            <p><a href="../actions/delete_profile_action.php" onclick="return confirm('Are you sure you want to delete your profile? This action cannot be undone.');">Delete profile</a></p>
            <p><a href="view_vendor_profile.php">View profile</a></p>
            <p><a href="view_bookings.php">View Bookings</a></p>
            <p><a href="view_review.php">View Reviews</a></p>
            <p><a href="insert_vendor.php">set up Profile</a></p>
            <p><a href="insert_services.php">Add your services</a></p>
            <p><a href="../login/logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>
