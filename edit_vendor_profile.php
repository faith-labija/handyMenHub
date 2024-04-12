<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vendor Profile</title>
    <style>
        body {
            background: url('https://st.depositphotos.com/1031174/1997/i/950/depositphotos_19971449-stock-photo-work-tools.jpg') center fixed;
            background-size: cover;
        }
        h2 {
            color: #fff;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            color: #fff;
            font-size: 1rem;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="tel"],
        input[type="submit"] {
            width: 300px;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h2>Edit Vendor Profile</h2>
    <form action="../actions/edit_vendor_profile_action.php" method="post">
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" value="<?php echo $first_name; ?>">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>">
        </div>
        <div>
            <label>Location</label>
            <input type="text" name="location" value="<?php echo $location; ?>">
        </div>
        <div>
            <label>Phone</label>
            <input type="tel" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div>
            <label>Price Range</label>
            <input type="text" name="price_range" value="<?php echo $price_range; ?>">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>
