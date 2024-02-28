<?php
include_once('database.php')

?>

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

    // Retrieve user input
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM user WHERE name = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("s", $inputUsername);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Check if the password is correct (consider using password_hash)
        if ($inputPassword === $row['password']){
            // Valid credentials, store user information in the session
            $_SESSION["username"] = $inputUsername;

            // Redirect to a dashboard or home page
            header("Location: home.php");
            exit();
        } else {
            // Invalid password, redirect back to login page with an error message
            header("Location: login.php?error=Invalid credentials");
            exit();
        }
    } else {
        // User not found, redirect back to login page with an error message
        header("Location: login.php?error=User not found");
        exit();
    }

    // Close the statement
    $stmt->close();
}
?>
