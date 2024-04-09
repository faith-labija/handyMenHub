<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Vendor Review</title>
</head>
<body>
    <h1>Submit Vendor Review</h1>
    <form action="../actions/review_vendor_action.php" method="POST">
        <!-- Vendor First Name -->
        <label for="vendor_first_name">Vendor First Name:</label>
        <input type="text" id="vendor_first_name" name="vendor_first_name" required><br>

        <!-- Vendor Phone Number -->
        <label for="vendor_phone">Vendor Phone Number:</label>
        <input type="tel" id="vendor_phone" name="vendor_phone" required><br>

        <!-- Rating -->
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>

        <!-- Note -->
        <label for="note">Note:</label>
        <textarea id="note" name="note" required></textarea><br>

        <!-- Date -->
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br>

        <!-- Submit Button -->
        <button type="submit">Submit Review</button>
    </form>
    <button onclick="window.location.href='../view/standard_welcome.php'">Go Back</button>
</body>
</html>
