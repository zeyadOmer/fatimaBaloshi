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
    .counter {
      display: grid;
      grid-template-columns: 70% 10%;
      gap: 10px;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
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




      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
              </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Weekly Visits <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">15</h2>
                
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Monthley Visits <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">15</h2>
                 
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                  <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">1</h2>
              
                </div>
              </div>
            </div>
          </div>


        




          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="clearfix">
                    <h4 class="card-title float-left">التعداد</h4>
                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    <form action="" method="post" class="counter">



                      <?php

                      // SQL query to select all data from the "posts" table
                      $sql = "SELECT * FROM counters";

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



                            <p>Experince </p>
                            <input type="text" name="exp" value="<?php echo $row['exp'] ?>">
                            <p>Attorney </p>
                            <input type="text" name="att" value="<?php echo $row['att'] ?>">
                            <p>Consultant </p>
                            <input type="text" name="con" value="<?php echo $row['con'] ?>">
                            <p>Cases </p>
                            <input type="text" name="cases" value="<?php echo $row['cases'] ?>">
                            <p>Clients</p>
                            <input type="text" name="client" value="<?php echo $row['client'] ?>">
                            <p>nationality</p>
                            <input type="text" name="nat" value="<?php echo $row['nat'] ?>">
                      <?php

                          }
                        }
                      }



                      ?>



                      <input type="submit" class="btn btn-gradient-success" value="Save">
                    </form>

                  </div>
                </div>
              </div>
            </div>






            <!-- // update counter -->




            <?php

include_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $exp = $_POST["exp"];
    $att = $_POST["att"];
    $con = $_POST["con"];
    $cases = $_POST["cases"];
    $client = $_POST["client"];
    $nat = $_POST["nat"];

            // Insert data into the database using prepared statement
            $sql = "UPDATE counters SET exp = ?, att = ?,con = ?,cases = ? , client = ?,nat=? WHERE id = 6"; // Assuming 'id' is the primary key
            $stmt = $conn->prepare($sql);
         
            // Bind the parameters with data types
            $stmt->bind_param("ssssss", $exp, $att,$con  ,$cases, $client,$nat);

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

            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Founder Message </h4>
                  <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>

                  <textarea id="default-editor">
                    يبدأ النجاح بحلم، يواكبه تخطيط مُحكَم، ويعقبه تنفيذ دقيق. منذ بداية رحلتنا في عالم المحاماة والاستشارات القانونية وضعنا النجاح هدفًا وجعلنا التفرّد غايةً لتحقيق طموحاتنا واخترنا الالتزام التام بمبادئ وقيم المهنة منهجًا لا يقبل المساومة.

منذ عام 2018 ونحن كلما حققنا هدفًا تولدت لدينا أهداف أكبر، وكلما أنجزنا حلما اتسعت دائرة أحلامنا، ليس من أجلنا وحدنا، وإنما لأجل طاقم عملنا، ولأجل المؤمنين بنا وبقدراتنا من عملائنا الأعزاء.

نحن سعداء للغاية بما حققناه طيلة السنوات الماضية، بتوفيق من الله، وبفضل جهود فريق عملنا المخلص، واقتراحات عملائنا وأصدقائنا الذين يشاركوننا رحلتنا في التقدم والتميز.
                    </textarea>
                  <input class="btn btn-gradient-success" value="Save">

                </div>
              </div>
            </div>
          </div>



          <?php


function changeCounter(){

  $sql = "update counters values ";


}





?>


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- End custom js for this page -->
</body>

</html>