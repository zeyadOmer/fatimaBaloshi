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
      display: none;
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
    .law-card-con {
    display: flex;
    flex-direction: row;
    width: 90%;
    justify-content: space-evenly;
    flex-wrap: wrap;
    margin: auto;
    font-size: larger;
    color: #155a07;
}
.law-card {
    margin: 1rem;
    border-radius: 15px;
    width: 30%;
    height: 45vh;
    background: url(../bg.jpeg);
    background-color: gray;
    background-size: cover;
    box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.065);
    cursor: pointer;
}
.law-title {
    text-align: center;
    font-weight: 700;
    font-family: 'Almarai', sans-serif !important;
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
    $name = $_GET['delete'].".pdf";
    
    // Specify the directory path
    $path = '../law/';
    echo $path . $name;
    // Prepare the DELETE file
    if (file_exists($path . $name)) {
        // Attempt to delete the file
        if (unlink($path . $name)) {
            echo "File deleted successfully!";
        } else {
            echo "Error deleting file.";
        }
    } else {
        echo "File not found.";
    }
}
?>







      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <button class="btn btn-gradient-primary" onclick="displayAdd()">New </button>
          <br>
          <br><br>
       

          <div class="law-card-con">





  <?php

  $folderPath = '../law/'; // Replace with the actual path to your folder

  // Define the pattern to match PDF files
  $pattern = $folderPath . '*.pdf';

  // Use glob to get an array of file paths that match the pattern
  $pdfFiles = glob($pattern);

  // Output the list of PDF files
  foreach ($pdfFiles as $pdfFile) {
    $filename = pathinfo($pdfFile, PATHINFO_FILENAME);
  ?>

    <div class="law-card"  data-bs-toggle="dropdown" fdprocessedid="twa7" aria-expanded="false">
      <div class="law-title">
        <a href="../law/<?php echo $filename ?>.pdf">
          <?php echo $filename; ?>
        </a>
      </div>
    </div>


    <div class="dropdown-menu">

<a class="dropdown-item" href="?delete=<?php echo $filename ?>">Delete</a>
</div>

  <?php
  }
  ?>

</div>




          <div class="add-new" id="add-new">
            <form action="" method="post" enctype="multipart/form-data">
              <label for="image">Law:</label>
              <input type="file" name="pdfFile" id="pdfFile" accept=".pdf" required>
              <input class="btn btn-danger btn-fw" type="button" value="cancel" onclick="cancelAdd()">
              <input class="btn btn-gradient-success" type="submit">
            </form>
            <script>
              function displayAdd() {
                document.get
                let x = document.getElementById('add-new').style.display = 'flex'
              }

              function cancelAdd() {
                document.get
                let x = document.getElementById('add-new').style.display = 'none'
              }
            </script>
          </div>
        </div>



        <?php
    $uploadDirectory = "../law/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["pdfFile"])) {
            $targetFile = $uploadDirectory . basename($_FILES["pdfFile"]["name"]);
            $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

            // Check if the file is a PDF
            if ($fileType == "pdf") {
                if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
                    echo "File uploaded successfully.";
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "Please upload a PDF file.";
            }
        } else {
            echo "No file selected.";
        }
    }
    ?>



        <!-- content-wrapper ends -->
        <!-- partial:../partials/_footer.html -->
        <footer class="footer">
          <?php
          include_once('./partials/_footer.php')

          ?>
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