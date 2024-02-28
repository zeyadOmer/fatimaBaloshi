<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is selected
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDirectory = "../images/";
        $targetFile = "../images/" . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Check if the file already exists
            if (file_exists($targetFile)) {
                echo "Sorry, the file already exists.";
            } else {
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

                    // Save the path to the database
                    $imagePath = "images/".$_FILES["image"]["name"];

                    // Replace database connection details with your own
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "fatima";

                    // Create a connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check the connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Insert the image path into the "slider" table
                    $sql = "INSERT INTO slider (image) VALUES ('$imagePath')";
                    if ($conn->query($sql) === TRUE) {
                        echo "Image path saved to the database.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    // Close the connection
                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "No file selected.";
    }
}
?>
