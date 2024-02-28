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
   
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../partials/_navbar.html -->
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
// Check if the 'delete' parameter is set in the URL
if (isset($_GET['delete'])) {
    // Retrieve the value of the 'delete' parameter
    $id = $_GET['delete'];

    // Prepare the DELETE SQL query
    $sql = "DELETE FROM blog WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Bind the parameters with data types
    $stmt->bind_param("s", $id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Blog deleted!";
        // Close the prepared statement
        $stmt->close();
        
        // Close the database connection
        $conn->close();

        // Reload the current page using JavaScript
        echo '<script type="text/javascript">
                window.location.href = blogs.php;
              </script>';
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
    
    // Close the database connection
    $conn->close();
} else {
    // Handle the case when the 'delete' parameter is not set
   
}
?>





      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <button class="btn btn-gradient-primary" onclick="displayAdd()">New </button>
          <br>
          <br><br>
          <div class="img-con">



            <?php

            // SQL query to select all data from the "posts" table
            $sql = "SELECT * FROM blog";

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
                  $image = $row['image'];

                  // Do something with the data (e.g., display it)

            ?>


                  <div class="card">
                    <div class="title">
                      <h4><?php echo $row['title'] ?></h4>
                    </div>
                    <a href="blog.php?data=<?php echo $row['id'] ?>" type="button" class="btn btn-outline-secondary " data-bs-toggle="dropdown" fdprocessedid="twa7" aria-expanded="false">
                      <img src="../<?php echo $image; ?>" alt="">


                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="blog.php?data=<?php echo $row['id'] ?>">Edit</a>

                        <a class="dropdown-item" href="?delete=<?php echo $row['id']; ?>">Delete</a>

                  
                      </a>
                      </div>


                  </div>


            <?php
                }
              }
            }


            ?>




          </div>
          <div class="add-new" id="add-new">
            <div class="card-con">
              <div class="card">

                <form action="" method="post" enctype="multipart/form-data">
                  <input type="text" class="form-control" id="title" name="title" required placeholder="العنوان" fdprocessedid="inbegb">
                  <br>


                  <i class="mdi mdi-upload btn-icon-prepend"></i>
                  <input type="file" class=" class=" btn btn-gradient-danger btn-icon-text"" id="image" name="image"><br><br>

                  <br> <br>

                  <textarea id="default-editor" name="post"></textarea>

                  </textarea><br><br><br>


              </div>
              <div class="card">


                <input type="text" class="form-control" id="entitle" name="entitle" required placeholder="Title" fdprocessedid="inbegb">
                <br>


                <br> <br>

                <textarea id="default-editor" name="enpost"></textarea><br><br><br>

                <input class="btn btn-danger btn-fw" type="button" value="cancel" onclick="cancelAdd()">
                <input class="btn btn-gradient-success" type="submit">
                </form>
              </div>
            </div>
            <script>
              function displayAdd() {
                document.get
                let x = document.getElementById('add-new').style.display = 'block'
              }

              function cancelAdd() {
                document.get
                let x = document.getElementById('add-new').style.display = 'none'
              }
            </script>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../partials/_footer.html -->
        <footer class="footer">
          <?php include_once('./partials/_footer.php') ?>
        </footer>
        <!-- partial -->





        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Retrieve form data
          $title = $_POST["title"];
          $post = $_POST["post"];
          $entitle = $_POST["entitle"];
          $enpost = $_POST["enpost"];

          // Handle image upload
          $targetDirectory = "../images/posts/";
          $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

          if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Image uploaded successfully, proceed with database insertion
            $targetFilereal = "images/posts/" . basename($_FILES["image"]["name"]);
            // Insert data into the database using prepared statement
            $sql = "INSERT INTO blog (title, post, image, entitle, enpost) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Bind the parameters with data types
            $stmt->bind_param("sssss", $title, $post, $targetFilereal, $entitle, $enpost);

            if ($stmt->execute()) {
              echo '<script type="text/javascript">
              window.location.href = window.location.href;
            </script>';
      exit();
            } else {
              echo "Error: " . $stmt->error;
            }

            $stmt->close();
          } else {
            echo "Sorry, there was an error uploading your file.";
          }

          // Close the database connection
          $conn->close();
          
        } else {
          // Handle form submission failure or redirect to the form page
        }
        ?>


<!-- delete post  -->



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