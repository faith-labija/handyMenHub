<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Service</title>
    <style>
        body {
            background: url('https://st.depositphotos.com/1031174/1997/i/950/depositphotos_19971449-stock-photo-work-tools.jpg') center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-size: 1rem;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        button[type="submit"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
        }
        textarea {
            resize: vertical;
        }
        button[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #555;
        }
        div {
            margin-bottom: 15px;
        }
        a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            margin-top: 20px;
            display: inline-block;
        }
        a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Add New Service</h1>
    
    <?php 
    // Start session
    session_start();

    // Display error message if set
    if(isset($_SESSION['error_message'])) {
        echo "<div class='error'>{$_SESSION['error_message']}</div>";
        unset($_SESSION['error_message']);
    }

    // Display success message if set
    if(isset($_SESSION['success_message'])) {
        echo "<div class='success'>{$_SESSION['success_message']}</div>";
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
