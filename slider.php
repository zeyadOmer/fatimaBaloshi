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

include_once('partials/_sidebar.php')


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
$sql = "SELECT * FROM slider";

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


      
<button type="button" class="btn btn-outline-secondary" <?php echo 'onclick="showDelete(' . $row['id'] . ')"' ?>  data-bs-toggle="dropdown"  fdprocessedid="twa7" aria-expanded="false">
    <img src="../<?php echo $image; ?>" alt="">
    <div class="dropdown-menu" id="<?php echo $row['id'] ?>">
        <form action="delete_image.php" method="post">
            <input type="hidden" name="image_id" value="<?php echo $row['id']; ?>">
            <input type="submit" class="dropdown-item" value="Delete">
        </form>
    </div>
</button>



<?php

}
  }
}

?>

<script>
  function showDelete(id){
   
  console.log(document.getElementById(id));
  if(document.getElementById(id).style.display=='none')
  {
  document.getElementById(id).style.display='initial';
  }
  else{
  document.getElementById(id).style.display='none';

  }

   
  }
</script>
                    
                            


            </div>
            <div class="add-new" id="add-new">
                <form action="uploadimg.php" method="post"  enctype="multipart/form-data">
                    <label for="image">image:</label>
                    <input type="file" name="image" id="image" accept="image/*">
                    <input class="btn btn-danger btn-fw" type="button" value="cancel" onclick="cancelAdd()">
                    <input class="btn btn-gradient-success" type="submit">
                </form>
                <script>
                     function displayAdd(){
                                document.get
                        let x =document.getElementById('add-new').style.display='flex'
                    }
                    function cancelAdd(){
                                document.get
                        let x =document.getElementById('add-new').style.display='none'
                    }

                </script>






            </div>
            </div>
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