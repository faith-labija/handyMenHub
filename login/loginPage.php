<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page</title>
    <link rel="stylesheet" type="text/css" href="loginPage.css">
    

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

        /* Adjust .form-wrapper styles to fit within the container */
        .form-wrapper {
            border-radius: 20px;
            padding: 40px;
            background: burlywood;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .form-wrapper h2 {
            color: #fff;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-wrapper form {
            margin: auto; /* Center the form horizontally */
            max-width: 300px; /* Set maximum width for the form */
        }

        .form-control {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control input {
            height: 50px;
            width: 100%;
            background: #333;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            padding: 0 20px;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="form-wrapper">
        <h2>HandyMen Login Page</h2>
        <form method="POST" onsubmit="return ValidationLogin()" action="../actions/login_user_action.php">
            <div class="form-control">
                <input type="email" id="email" name="email" required>
                <label for="email">Enter Email:</label>
            </div>
            <div class="form-control">
                <input type="password" id="password" name="password" required>
                <label for="password">Enter Password:</label>
            </div>
            <button type="submit" name="signIn">Login</button>
            <p><a href="registerPage.php">Sign Up</a></p>
        </form>
    </div>
    <script src="loginPage.js"></script>
    </div >
</body>
</html>
