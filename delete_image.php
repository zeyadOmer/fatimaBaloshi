<?php
      // Check if the 'data' parameter is set in the URL
      if (isset($_GET['data'])) {
        // Retrieve the value of the 'data' parameter
        $imageId = $_GET['data'];

        // Use the data for further processing or display
   
      } else {
        // Handle the case when the 'data' parameter is not set
        echo "No data parameter found in the URL.";
      }
      ?>


<?php

        // Fetch the image path from the database
        $imagePath = getImagePathFromDatabase($imageId);

        if ($imagePath) {
            // Delete the record from the database
            deleteFromDatabase($imageId);

            // Delete the image file from the "images" folder
            deleteImageFile($imagePath);

            echo "Image and record deleted successfully.";
        } else {
            echo "Image not found in the database.";
        }
   

function getImagePathFromDatabase($imageId) {
    try {
        // Replace these values with your actual database credentials
        $dsn = "mysql:host=localhost;dbname=fatima";
        $username = "root";
        $password = "";

        // Create a PDO instance
        $pdo = new PDO($dsn, $username, $password);

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SELECT statement
        $stmt = $pdo->prepare("SELECT image FROM slider WHERE id = :image_id");

        // Bind parameters
        $stmt->bindParam(':image_id', $imageId);

        // Execute the statement
        $stmt->execute();

        // Fetch the image path
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the connection
        $pdo = null;

        return $result ? $result['image'] : null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function deleteFromDatabase($imageId) {
    try {
        // Replace these values with your actual database credentials
        $dsn = "mysql:host=localhost;dbname=fatima";
        $username = "root";
        $password = "";

        // Create a PDO instance
        $pdo = new PDO($dsn, $username, $password);

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the DELETE statement
        $stmt = $pdo->prepare("DELETE FROM slider WHERE id = :image_id");

        // Bind parameters
        $stmt->bindParam(':image_id', $imageId);

        // Execute the statement
        $stmt->execute();

        // Close the connection
        $pdo = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function deleteImageFile($imagePath) {
    // Ensure the file exists before attempting to delete
    if (file_exists($imagePath)) {
        // Attempt to delete the file
        if (unlink($imagePath)) {
            echo "Image file deleted successfully.";
            echo '<script type="text/javascript">
            window.location.href = window.location.href;
          </script>';
        } else {
            echo "Error deleting image file.";
        }
    } else {
        echo "Image file not found.";
    }
}
?>
