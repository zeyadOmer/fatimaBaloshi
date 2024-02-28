<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tiny.cloud/1/hvqvt6ho6nz3tjik36ewazgvtnt4qvr4qs43sf0lkez3vlbr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#default-editor',
            height: 400,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code'
        });
    </script>
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
        .img-con {
            display: flex;
            margin: auto;
            justify-content: space-evenly;


        }

        .img-con .btn {
            display: flex;
            width: 30%;
            padding: 0;
        }

        .img-con .btn img {
            object-fit: contain;
            width: 100%;


        }

        .dropdown-menu.show {

            min-width: 23%;
            padding-inline: 0px;
        }

        .add-new {
            height: 90vh;
            width: 80%;
            display: none;
            background: #f2edf3;
            justify-content: space-around;
            margin: auto;
            border-radius: 5px;
            box-shadow: 0 0 2px 2px #b66dff;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 99999;
            overflow: scroll;

        }

        .card-con {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            width: 100%;
            z-index: 99;
        }

        .card {
            display: flex;
            justify-content: space-evenly;
            padding: 1rem;

        }

        .control {
            display: flex;
            padding: 1rem;
            width: 100%;
            justify-content: flex-end;
          
            gap: 1rem;
         
        }

       
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../partials/_navbar.html -->
        <?php include_once('./partials/_navbar.php')?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once('./partials/_sidebar.php') ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card-con">


                        <?php

                        // SQL query to select all data from the "posts" table
                        $sql = "SELECT * FROM aboutus";

                        // Execute the query
                        $result = $conn->query($sql);

                        // Check if the query was successful
                        if ($result) {
                            // Check if there are rows in the result set
                            if ($result->num_rows > 0) {
                                // Loop through the rows and fetch data
                                while ($row = $result->fetch_assoc()) {
                                    // Access the data using column names
                                    $x = 1;
                                    $x++;

                                    // Do something with the data (e.g., display it)

                        ?>

                                    <div class="card">
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <textarea id="default-editor" name="about_us"><?php echo $row['about_us'] ?></textarea>

                                    </div>
                                    <div class="card">
                                        <textarea id="default-editor" name="en_about_us"><?php echo $row['en_about_us'] ?></textarea>
                                        <div class="control">
                                            <input type="hidden" name="aboutus">
                                            <input class="btn btn-danger btn-fw" type="button" value="cancel" onclick="cancelAdd()">
                                            <input class="btn btn-gradient-success" type="submit" value="save">
                                        </form>
                                    </div>

                        <?php
                                }
                            }
                        }


                        ?>

                    </div>


                </div>

                <!-- content-wrapper ends -->
                <!-- partial:../partials/_footer.html -->
                <footer class="footer">
                    <?php include_once('./partials/_footer.php') ?>
                </footer>

                <?php

include_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $about_us = $_POST["about_us"];
    $en_about_us = $_POST["en_about_us"];

            // Insert data into the database using prepared statement
            $sql = "UPDATE aboutus SET about_us = ?, en_about_us = ? WHERE id = 1"; // Assuming 'id' is the primary key
            $stmt = $conn->prepare($sql);
         
            // Bind the parameters with data types
            $stmt->bind_param("ss", $about_us, $en_about_us);

            if ($stmt->execute()) {
                echo "Blog post  successfully created!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
     

    // Close the database connection
    $conn->close();

}
?>











                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>