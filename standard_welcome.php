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

    /* Adjust the style for the links */
    .form-wrapper a {
        display: block; /* Ensure each link appears on a new line */
        background: #333;
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 1rem;
        padding: 15px 20px; /* Adjust padding for better appearance */
        text-decoration: none; /* Remove underline from links */
        margin-bottom: 10px; /* Add margin between links */
        text-align: center; /* Center the text horizontally */
    }

    .form-wrapper a:hover {
        background: #555; /* Change background color on hover */
    }

</style>


    </style>

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css" integrity="sha512-i1b/nzkVo97VN5WbEtaPebBG8REvjWeqNclJ6AItj7msdVcaveKrlIIByDpvjk5nwHjXkIqGZscVxOrTb9tsMA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Welcome, Standard User!</h1>
            <p>You can review vendors and access other standard user features.</p>
            <p><a href="../view/services.php" class="form-control">Services available</a></p>
            <!-- Other standard user content -->
            <p><a href="vendor_listing.php" class="form-control">View Vendors Profiles</a></p>
            <p><a href="view_review_standard.php" class="form-control">View Reviews</a></p>
            <p><a href="../login/logout.php" class="form-control">Logout</a></p>
        </div>
    </div>
</body>
</html>