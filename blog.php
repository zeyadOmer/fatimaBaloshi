<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdn.tiny.cloud/1/hvqvt6ho6nz3tjik36ewazgvtnt4qvr4qs43sf0lkez3vlbr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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

  <style>
    .img-con {
      display: flex;
      margin: auto;
      justify-content: space-evenly;
      flex-wrap: wrap;

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
      height: 500px;
      width: 500px;
      display: flex;
      align-items: center;
      background: #f2edf3;
      justify-content: space-evenly;
      margin: auto;
      border-radius: 5px;
      box-shadow: 0 0 2px 2px #b66dff;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);

    }

    .add-new form {
      display: grid;
      grid-template-columns: 40% 40%;
      justify-content: space-evenly;


    }

    input[type="file"]::file-selector-button {
      border: none;
      background: transparent;
      color: #fff;
    }

    .card-con {
      display: flex;
      min-width: 100%;
      justify-content: space-evenly;
      width: auto;
      text-align: center;
    }

    .card>* {
      padding: 1em;
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
      // Check if the 'data' parameter is set in the URL
      if (isset($_GET['data'])) {
        // Retrieve the value of the 'data' parameter
        $dataValue = $_GET['data'];

        // Use the data for further processing or display
   
      } else {
        // Handle the case when the 'data' parameter is not set
        echo "No data parameter found in the URL.";
      }
      ?>


      <?php

      // SQL query to select all data from the "posts" table
      $sql = "SELECT * FROM blog where id =$dataValue";

      // Execute the query
      $result = $conn->query($sql);

      // Check if the query was successful
      if ($result) {
        // Check if there are rows in the result set
        if ($result->num_rows > 0) {
          // Loop through the rows and fetch data
          while ($row = $result->fetch_assoc()) {
            // Access the data using column names

            // Do something with the data (e.g., display it)

      ?>
            <!-- partial -->
            <div class="main-panel">
              <div class="content-wrapper">

                <div class="card-con">
                  <div class="card">

                    <form action="" method="post" enctype="multipart/form-data">
                      <label for="title">arabic</label>
                      <input type="text" class="form-control" id="title" name="title" required placeholder="Title" fdprocessedid="inbegb" value="<?php echo $row['title'] ?>">
                      <br>
                      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                      <button type="button" class="btn btn-gradient-danger btn-icon-text" fdprocessedid="vkujxh">
                        <i class="mdi mdi-upload btn-icon-prepend"></i><input type="file" id="image" name="image"><br><br>
                      </button>
                      <br> <br>
                  
                      <textarea id="default-editor" name="post"><?php echo $row['post'] ?></textarea>

                      </textarea><br><br><br>
               
                  </div>
                  <div class="card">

                   <label for="title">english</label>
                      <input type="text" class="form-control" id="title" name="entitle" required placeholder="Title" fdprocessedid="inbegb" value="<?php echo $row['entitle'] ?>">
                      <br>

                   
                      <br> <br>
                     
                      <textarea id="default-editor" name="enpost">
            <?php echo $row['enpost'] ?>
            </textarea><br><br><br>

                      <input class="btn btn-danger btn-fw" type="button" value="cancel" onclick="cancelAdd()">
                      <input class="btn btn-gradient-success" type="submit">
                    </form>
                  </div>
                </div>




          <?php

          }
        } else {
          echo "No records found in the 'posts' table.";
        }
      } else {
        echo "Error: " . $conn->error;
      }

          ?>



              </div>



              

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"];
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
        $sql = "update blog set title=?, post=?, image=?, entitle=?, enpost=? where id =?";
        $stmt = $conn->prepare($sql);

        // Bind the parameters with data types
        $stmt->bind_param("ssssss", $title, $post, $targetFilereal, $entitle, $enpost,$id);

        if ($stmt->execute()) {
            echo "Blog post with image successfully created!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
    
      // Insert data into the database using prepared statement
      $sql = "update blog set title=?, post=?, entitle=?, enpost=? where id =?";
      $stmt = $conn->prepare($sql);

      // Bind the parameters with data types
      $stmt->bind_param("sssss", $title, $post,  $entitle, $enpost,$id);

      if ($stmt->execute()) {
          echo "Blog post with image successfully created!";
      } else {
          echo "Error: " . $stmt->error;
      }
        echo "Sorry, there was an error uploading your file.";
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle form submission failure or redirect to the form page
}
?>














              <!-- content-wrapper ends -->
              <!-- partial:../partials/_footer.html -->
              <footer class="footer">
                <?php  include_once('./partials/_footer.php') ?>
              </footer>
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