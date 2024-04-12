<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <style>
        body {
            background: url('https://st.depositphotos.com/1031174/1997/i/950/depositphotos_19971449-stock-photo-work-tools.jpg') center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            text-align: center;
            margin-top: 50px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            background-color: black;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #fff;
        }
        label {
            font-size: 1rem;
            margin-bottom: 5px;
            color: #fff;
            display: block;
            text-align: left;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0 15px;
            border-radius: 5px;
            border: none;
            background-color: #000;
            color: #fff;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #555;
        }
        p {
            margin-bottom: 20px;
        }
        a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form onsubmit="return ValidationFunctions()" action="../actions/register_user_action.php" method="POST" name = "registerForm">
        <h2>Register Page</h2>
        <p><label for="name">Enter First Name:</label>
            <input type="text" id="name" name="name" placeholder="Faith" required>
        </p>
        <p><label for="email">Enter Email:</label>
            <input type="email" id="email" name="email" placeholder="faith.labija@gmail.com" required>
        </p>
        <p><label for="role">Choose your Role:</label>
            <select name="role" id="role" required>
                <option value="">Select role</option>
                <?php
                include '../functions/select_role.php';
                $web_users = getUsers();
                foreach ($web_users as $role) {
                    echo "<option value='" . $role['role'] . "'>" . $role['role'] . "</option>";
                }
                ?>
            </select>
        </p>
        <p><label for="tel">Enter Phone:</label>
            <input type="tel" id="tel" name="tel" placeholder="(233) 20 555 3117" required>
        </p>
        <p><label for="location">Enter Location:</label>
            <input type="text" id="location" name="location" placeholder="Kwabenya" required>
        </p>
        <p><label for="password">Enter Password:</label>
            <input type="password" id="password" name="password" placeholder="060829Ee" required>
        </p>
        <p><label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
        </p>
        <input type="hidden" name="signUp" value="1">
        <p><button type="submit" id="signUp">Sign Up</button></p>
        <p><a href="loginPage.php">Login</a></p>
    </form>
    <script src="../js/registerPage.js"></script>
</body>
</html>
