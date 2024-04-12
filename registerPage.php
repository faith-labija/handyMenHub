<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <style>
        body {
            background: url('https://st.depositphotos.com/1031174/1997/i/950/depositphotos_19971449-stock-photo-work-tools.jpg')center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <form onsubmit="return ValidationFunctions()" action="actions/register_user_action.php" method="POST">
        <h2>Register Page</h2>
        <p><label for="FirstName">Enter First Name:</label>
            <input type="text" id="name" name="name" placeholder="Faith">
        </p>
        
      
        <p><label for="email">Enter Email:</label>
            <input type="email" id="email" name="email" placeholder="faith.labija@gmail.com" required>
        </p>
        <p><label for="roles">Choose your Role:</label>
            <select name="role" id="role" required>
                <option value="">Select role</option>
                <?php
                
                include 'functions/select_role.php';

                // Call the getUsers function to fetch roles from the database
                $web_users = getUsers();

                // Filter out and display only "standard" and "vendor" roles
                foreach ($web_users as $role) {
                    if ($role['role'] !== 'super admin') {
                        echo "<option value='" . $role['role'] . "'>" . $role['role'] . "</option>";
                    }
                }
                ?>
            </select>
        </p>
        <p><label for="tel">Enter Phone:</label>
            <input type="tel" id="telNum" name="tel" placeholder="(233) 20 555 3117" required>
        </p>

        <p><label for="location"> Enter Location:</label>
            <input type="location" id="location" name="location" placeholder="kwabenya" required>
        </p>
        <p><label for="password"> Enter Password:</label>
            <input type="password" id="password" name="password" placeholder="060829Ee" required>
        </p>
        <p><label for="password"> Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
        </p>
        <p><button type="submit" name="signUp" id="register">Sign Up</button></p>
        <p>Have an Account? Click below:</p>
        <a href="loginPage.php">Login</a>
    </form>
    <script src="register.js"></script>
</body>
</html>
