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
            color: #fff;
        }
        .form-wrapper h1,
        .form-wrapper p {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-wrapper input[type="text"],
        .form-wrapper textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            background-color: #fff;
            color: #333;
        }
        .form-wrapper button,
        .form-wrapper a {
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
        .form-wrapper button:hover,
        .form-wrapper a:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h1>Add New Service</h1>
            
            <?php 
           
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
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>

                <button type="submit">Add Service</button>
            </form>

            
            <a href="vendor_welcome copy.php">Go Back</a>
        </div>
    </div>
</body>
</html>
