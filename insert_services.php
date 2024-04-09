<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Service</title>
</head>
<body>
    <h1>Add New Service</h1>
    
    <?php 
    // Start session
    session_start();

    // Display error message if set
    if(isset($_SESSION['error_message'])) {
        echo "<div>{$_SESSION['error_message']}</div>";
        unset($_SESSION['error_message']);
    }

    // Display success message if set
    if(isset($_SESSION['success_message'])) {
        echo "<div>{$_SESSION['success_message']}</div>";
        unset($_SESSION['success_message']);
    }
    ?>

    <form id="service_form" action="../actions/insert_services_action.php" method="POST">
        <div>
            <label for="service_name">Service Name:</label>
            <input type="text" id="service_name" name="service_name" required>
        </div>

        <div>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        </div>

        <button type="submit">Add Service</button>
    </form>

    <!-- Go back button -->
    <a href="vendor_welcome.php">Go Back</a>
</body>
</html>
