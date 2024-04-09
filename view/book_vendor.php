<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Vendor</title>
</head>
<body>
    <h1>Book Vendor</h1>
    <form action="../actions/book_vendor_action.php" method="POST">
        <!-- Form fields for booking details -->
        <!-- Removed the vendor_id field -->
        
        <label for="vendor_first_name">Vendor First Name:</label>
        <input type="text" id="vendor_first_name" name="vendor_first_name" required><br>
        
        <label for="vendor_phone">Vendor Phone:</label>
        <input type="tel" id="vendor_phone" name="vendor_phone" required><br>

        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required><br>
        
        <label for="student_location">Student Location:</label>
        <input type="text" id="student_location" name="student_location" required><br>

        <label for="student_phone">Student Phone:</label>
        <input type="tel" id="student_phone" name="student_phone" required><br>

        <label for="student_email">Student Email:</label>
        <input type="email" id="student_email" name="student_email" required><br> <!-- Added field for email -->

        <label for="desired_service">Desired Service:</label>
        <input type="text" id="desired_service" name="desired_service" required><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required><br>

        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"></textarea><br>

        <button type="submit">Book Vendor</button>
    </form>
    <button onclick="window.location.href='../view/standard_welcome.php'">Go Back</button>
</body>
</html>
