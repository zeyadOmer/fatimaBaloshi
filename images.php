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
     .img-con{
            display: flex;
            margin: auto;
            justify-content: space-evenly;
            flex-wrap: wrap;

        }
        .img-con .btn{
        display: flex;
        width: 30%;
        padding: 0;
       }
       .img-con .btn img{
          object-fit: contain;
          width: 100%;
        

        }
        .dropdown-menu.show{
          position: absolute;
            min-width: 23.5%;
            padding-inline: 0px;
        }
        .add-new{
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
            transform: translate(-50%,-50%);

        }
        .add-new form{
            display: grid;
            grid-template-columns: 40% 40%;
            justify-content: space-evenly;
            
            
        }
   
        .card{
    display: flex;
    width: 30%;
    padding: 0;
    max-height: 30vh;
    object-fit: contain;
    box-sizing: border-box;
        }
        .card img{
            max-width: 100%;
            max-height: 100%;
        }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../partials/_navbar.html -->
    <?php   include_once('./partials/_navbar.php')  ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php   include_once('./partials/_sidebar.php')  ?>
      <!-- partial -->






      
<?php
// Check if the 'delete' parameter is set in the URL
if (isset($_GET['delete'])) {
    // Retrieve the value of the 'delete' parameter
    $name = $_GET['delete'];
    
    // Specify the directory path
  
    // Prepare the DELETE file
    if (file_exists($name)) {
        // Attempt to delete the file
        if (unlink( $name)) {
           
        } else {
            echo "Error deleting file.";
        }
    } else {
        echo "File not found.";
    }
}
?>












      <div class="main-panel">
        <div class="content-wrapper">
          <button class="btn btn-gradient-primary" onclick="displayAdd()">New </button>
          <br>
          <br><br>
       

          <div class="img-con">






  <?php

  $folderPath = '../gallary/images/'; // Replace with the actual path to your folder

  // Define the pattern to match PDF files
  $pattern = $folderPath . '*';

  // Use glob to get an array of file paths that match the pattern
  $pdfFiles = glob($pattern);

  // Output the list of PDF files
  foreach ($pdfFiles as $pdfFile) {
    $pathInfo = pathinfo($pdfFile);
    $fileExtension = isset($pathInfo['extension']) ? '.' . $pathInfo['extension'] : '';
    
    $filename = pathinfo($pdfFile, PATHINFO_FILENAME);
    $filename = $folderPath . $filename . $fileExtension;
    // echo $folderPath . $filename . $fileExtension;

  ?>



<div class="card"  data-bs-toggle="dropdown" fdprocessedid="twa7" aria-expanded="false">
                       
                     
                <img src="<?php echo $filename; ?>"  alt="">

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
              <input type="file" name="pdfFile" id="pdfFile"  required>
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
    $uploadDirectory = "../gallary/images/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["pdfFile"])) {
            $targetFile = $uploadDirectory . basename($_FILES["pdfFile"]["name"]);
            $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

            // Check if the file is a PDF
        
                if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
                    echo "File uploaded successfully.";
                    echo '<script type="text/javascript">
                    window.location.href = window.location.href;
                  </script>';
            exit();
                } else {
                    echo "Error uploading file.";
                }
           
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