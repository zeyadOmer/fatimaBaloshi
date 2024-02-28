<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        #login-container {
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        #login-container h5 {
            text-align: center;
            color: #333;
        }

        #login-form input[type="text"],
        #login-form input[type="password"] {
            font-size: 16px;
        }

        #login-form .btn {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="login-container">
        <h5>Login</h5>
        <form id="login-form" action="" method="post">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" id="username" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit">Login</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>



<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded username and password for demonstration purposes
    $validUsername = "admin";
    $validPassword = "admin";

    // Retrieve user input
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    // Check if credentials are valid
    if ($inputUsername == $validUsername && $inputPassword == $validPassword) {
        // Store user information in the session
        $_SESSION["username"] = $inputUsername;

        // Redirect to a dashboard or home page
        header("Location: home.php");
        exit();
    } else {
        // Invalid credentials, redirect back to login page with an error message
        header("Location: login.php?error=Invalid credentials");
        exit();
    }
}
?>
