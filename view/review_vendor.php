<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Vendor Review</title>
    <style>
        body {
            background: url('https://st.depositphotos.com/1031174/1997/i/950/depositphotos_19971449-stock-photo-work-tools.jpg') center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; 
            height: 100vh;
        }

        form {
            border-radius: 20px;
            padding: 20px;
            background: burlywood;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px; 
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        textarea {
            width: calc(100% - 20px); 
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            background-color: #fff;
        }

        button[type="submit"],
        .go-back {
            display: block;
            background: #333;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            padding: 15px;
            text-decoration: none;
            margin-top: 20px;
            text-align: center;
            width: calc(100% - 20px); 
        }

        button[type="submit"]:hover,
        .go-back:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <h1>Submit Vendor Review</h1>
    <form action="../actions/review_vendor_action.php" method="POST">
        
        <label for="vendor_first_name">Vendor First Name:</label>
        <input type="text" id="vendor_first_name" name="vendor_first_name" required><br>

        
        <label for="vendor_phone">Vendor Phone Number:</label>
        <input type="tel" id="vendor_phone" name="vendor_phone" required><br>

        
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>

        
        <label for="note">Note:</label>
        <textarea id="note" name="note" required></textarea><br>

      
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br>

        <!-- Submit Button -->
        <button type="submit">Submit Review</button>
    </form>
    <!-- Go Back Button -->
    <button class="go-back" onclick="window.location.href='../view/standard_welcome.php'">Go Back</button>
</body>
</html>
