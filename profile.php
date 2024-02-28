<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />


    <style>
        .profile {
            display: grid;

        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
               
            </div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <?php

        include_once('./partials/_navbar.php')


        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php
            include_once('./partials/_sidebar.php')



            ?>





            <?php
            // Include your database connection file

            // Retrieve the user's information from the database
            $username = $_SESSION["username"];
            $sql = "SELECT * FROM user WHERE name = '$username'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $user = $result->fetch_assoc();
            } else {
                // Redirect to the login page if user information is not found
                header("Location: login.php");
                exit();
            }

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve user input
                $currentPassword = $_POST["current_password"];
                $newPassword = $_POST["new_password"];
                $confirmPassword = $_POST["confirm_password"];

                // Verify the current password
                if ($currentPassword=== $user["password"]) {
                    // Check if the new password and confirm password match
                    if ($newPassword === $confirmPassword) {
                        // Hash the new password
                        $hashedPassword = $newPassword;

                        // Update the user's password in the database
                        $updateSql = "UPDATE user SET password = '$hashedPassword' WHERE name = '$username'";
                        if ($conn->query($updateSql)) {
                            // Password updated successfully
                            echo "Password updated successfully!";
                        } else {
                            // Error updating password
                            echo "Error updating password: " . $conn->error;
                        }
                    } else {
                        // New password and confirm password do not match
                        echo "New password and confirm password do not match.";
                    }
                } else {
                    // Current password is incorrect
                    echo "Incorrect current password.";
                }
            }
            ?>


            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home"></i>
                            </span> Profile
                        </h3>
                    </div>

                    <h1>Welcome, <?php echo $username; ?>!</h1>

                    <h2>Change Password</h2>
                    <form method="POST" action="" class="profile">
                        <label for="current_password">Current Password:</label>
                        <input type="password" name="current_password" required><br>

                        <label for="new_password">New Password:</label>
                        <input type="password" name="new_password" required><br>

                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" name="confirm_password" required><br>
                        <input type="hidden">
                        <input type="submit" value="Change Password">
                    </form>

                    <br>



                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>