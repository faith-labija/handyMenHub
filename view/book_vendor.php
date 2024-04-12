<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Vendor</title>
    <style>
        body {
            background: url('https://st.depositphotos.com/1031174/1997/i/950/depositphotos_19971449-stock-photo-work-tools.jpg') center fixed;
            background-size: cover;
        }
        h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            border-radius: 20px;
            padding: 40px;
            background: burlywood;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            color: #fff;
            margin: 0 auto; 
        }
        label,
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        textarea,
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            background-color: #fff;
            color: #333;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
        }
        button[type="submit"] {
            background: #333;
            color: #fff;
        }
        button[type="submit"]:hover {
            background: #555;
        }
        button,
        a {
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
            display: block;
        }
        a:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <h1>Book Vendor</h1>
    <form action="../actions/book_vendor_action.php" method="POST">
       
        
        <label for="vendor_first_name">Vendor First Name:</label>
        <input type="text" id="vendor_first_name" name="vendor_first_name" required>
        
        <label for="vendor_phone">Vendor Phone:</label>
        <input type="tel" id="vendor_phone" name="vendor_phone" required>

        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required>
        
        <label for="student_location">Student Location:</label>
        <input type="text" id="student_location" name="student_location" required>

        <label for="student_phone">Student Phone:</label>
        <input type="tel" id="student_phone" name="student_phone" required>

        <label for="student_email">Student Email:</label>
        <input type="email" id="student_email" name="student_email" required> 

        <label for="desired_service">Desired Service:</label>
        <input type="text" id="desired_service" name="desired_service" required>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"></textarea>

        <button type="submit">Book Vendor</button>
    </form>
    <button onclick="window.location.href='../view/standard_welcome.php'">Go Back</button>
</body>
</html>
