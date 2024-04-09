<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login Page</title>
        <link rel="stylesheet" type="text/css" href="loginPage.css">
        <style>
            body {
                background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4dopuvhGdEI5bSkevNHgtB3u68z_aYQaBa1416vPP6pUk1cEHeFyLQBGEOsfYojv7rj8&usqp=CAU') center fixed;
                
                background-size: cover;
                
            }
        </style>
       
    </head>
    <body>
        
    <form onsubmit="return ValidationLogin()">
        <h2>Chore Login Page</h2>
        <!-- Im going to use a background image instead of colour -->

        <p><label for="email">Enter Email:</label>
        <input type="email" id="email" name="email" required></p>

        <p><label for="password"> Enter Password:</label>
        <input type="password" id="password" name="password" required></p>

        <p><button type="submit">Login</button></p>

        <!-- Redirecting the user to the Register Page -->
        <p><a href="registerPage.html">No Account Yet? Register here.</a></p>
    </form>
    <script src="loginPage.JS"></script>
    </body>
</html>