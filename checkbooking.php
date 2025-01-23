<?php
  include('action.php');
  if(!isset($_SESSION['name'])){
    header('location:index.php');
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Wedding Party</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/wed3.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="stylesheet" href="path/to/bootstrap.min.css">
  <link rel="stylesheet" href="path/to/your-custom-styles.css">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
   <style>
       .bounce {
        font-size: 2.5rem;
        font-weight: bold;
        color: black; /* Customize color */
        animation: bounce 0.5s infinite alternate;
        
    }

    @keyframes bounce {
        from { transform: translateY(0); }
        to { transform: translateY(-10px); }
    }
    .userdet{
               text-align:center;
               margin-top: 20px;
                margin-bottom:30px;
                width:25%;
                margin-left:35%;
                border-radius:8px;
                padding: 2px 2px;
    }
   </style>
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">Sidhesh Wedding Planner</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="dasboard.php">Dasboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/wed3.jpg)">
        <div class="overlay-itro"></div>
        <div class="intro-content display-table">
            <div class="table-cell">
                <div id="ticketdate" class="container mt-5">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">Enter Details</h3>
                                </div>
                                <div class="card-body bg-dark">
                                    <form method="post" action="checkbooking.php">
                                        <div class="form-group">
                                            <label for="reg_id" style='margin-right: 40px; padding-right: 70%;'>Registration ID:</label>
                                            <input type="text" class="form-control" id="reg_id" name="reg_id" placeholder="Enter Your Registration Id" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wdate" style='margin-right: 40px; padding-right: 70%;'>Wedding Date:</label>
                                            <input type="date" class="form-control" id="wdate" name="wdate" required>
                                        </div>
                                        <button type="submit" class="btn btn-danger ">Submit</button>
                                    </form>
                                </div>
                                <div class="card-footer bg-dark">
                                    <!-- Footer content if any -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
  <!--/ Intro Skew End /-->

  <div class="card-body" id="printArea">

  <?php

$records_found = false; // Declare the variable here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_id = $_POST['reg_id'];
    $wdate = $_POST['wdate'];
    
    $sql_registration = "SELECT vid, mid,did,tid,pno,cid, pid, wdate, name,pHno, reg_id FROM registration WHERE reg_id = ? AND wdate = ?";
    $stmt = $con->prepare($sql_registration);
    $stmt->bind_param("ss", $reg_id, $wdate);
    $stmt->execute();
    $result_registration = $stmt->get_result();

    if ($result_registration->num_rows > 0) {
        $records_found = true;
        echo '<div id="printArea">';  // Start of printable area

        while ($row_registration = $result_registration->fetch_assoc()) {
            $vid = $row_registration["vid"];
            $mid = $row_registration["mid"];
            $cid = $row_registration["cid"];
            $did = $row_registration["did"];
            $tid = $row_registration["tid"];
            $pno = $row_registration["pno"];
            $pid = $row_registration["pid"];
            $wdate = $row_registration["wdate"];
            $name = $row_registration["name"];
            $pHno = $row_registration["pHno"];

            echo"<h2 class='userdet bounce'>User Details</h2>";
            echo "<div style='background-color: #f4f4f9; 
            padding: 30px; border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
            margin-bottom: 20px;'>
  <div style='display: flex; justify-content: space-between;'>
      <div style='flex: 1;'>
          <h4 style='color: #444; font-family: Georgia, serif;'>Registration User Name</h4>
      </div>
      <div style='flex: 1; text-align: right;'>
          <h4 style='color: #6c757d; font-family: Georgia, serif;'>$name</h4>
      </div>
  </div>
</div>";

echo "<div style='background-color: #f4f4f9; 
            padding: 30px; border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
            margin-bottom: 20px;'>
  <div style='display: flex; justify-content: space-between;'>
      <div style='flex: 1;'>
          <h4 style='color: #444; font-family: Georgia, serif;'>Wedding Date</h4>
      </div>
      <div style='flex: 1; text-align: right;'>
          <h4 style='color: #6c757d; font-family: Georgia, serif;'>$wdate</h4>
      </div>
  </div>
</div>";

echo "<div style='background-color: #f4f4f9; 
            padding: 30px; border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
            margin-bottom: 20px;'>
  <div style='display: flex; justify-content: space-between;'>
      <div style='flex: 1;'>
          <h4 style='color: #444; font-family: Georgia, serif;'>No Of Persons</h4>
      </div>
      <div style='flex: 1; text-align: right;'>
          <h4 style='color: #6c757d; font-family: Georgia, serif;'>$pno</h4>
      </div>
  </div>
</div>";

echo "<div style='background-color: #f4f4f9; 
            padding: 30px; border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
            margin-bottom: 20px;'>
  <div style='display: flex; justify-content: space-between;'>
      <div style='flex: 1;'>
          <h4 style='color: #444; font-family: Georgia, serif;'>Phone No Person</h4>
      </div>
      <div style='flex: 1; text-align: right;'>
          <h4 style='color: #6c757d; font-family: Georgia, serif;'>$pHno</h4>
      </div>
  </div>
</div>";
           

         echo'  <h2 class="text-center bounce">Service Details</h2>';


// Function to render service rows
function renderServiceRow($type, $cname, $wdate, $price) {
  echo "<div class='col-md-4 mb-4'>
          <div class='card' style='width: 100%;'>
            <div class='card-body'>
              <h5 class='card-title'>$type</h5>
              <h6 class='card-subtitle mb-2 text-muted'>$cname</h6>
              <p class='card-text'>Date: $wdate</p>
              <p class='card-text'>Price: ₹$price</p>
              <a href='#' class='btn btn-primary mb-2'>More Details</a>
              <a href='#get' class='btn btn-secondary mb-2'>Contact</a>
            </div>
          </div>
        </div>";
}













// Queries for different services
$queries = [
  'Venue' => "SELECT * FROM venue WHERE vid = ?",
  'Music' => "SELECT * FROM music WHERE mid = ?",
  'Catering' => "SELECT * FROM catering WHERE cid = ?",
  'Photoshop' => "SELECT * FROM photoshop WHERE pid = ?",
  'Decoration' => "SELECT * FROM decoration WHERE did = ?",
  'Theme' => "SELECT * FROM theme WHERE tid = ?"
];

$params = [$vid, $mid, $cid, $pid, $did, $tid];
$serviceTypes = array_keys($queries);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Start the Bootstrap container and row
echo "<div class='container'>
      <div class='row'>";

for ($i = 0; $i < count($queries); $i++) {
  $stmt = $con->prepare($queries[$serviceTypes[$i]]);
  $stmt->bind_param("i", $params[$i]);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          renderServiceRow($serviceTypes[$i], $row["name"], $wdate, $row["price"]);
      }
  }
}

// Close the row and container divs
echo "  </div>
    </div>";

echo '</div>';  // End of container
        }
        
        echo '</div>';  // End of printable area
    } else {
        echo "<h2 class='text-center' style='margin-top:50px'>No Data found</h2>";
    }

    $stmt->close();
}
?>

</div>

<?php if ($records_found) { ?>
    <!-- Print Button -->
    <button class="btn btn-primary mt-3" style="margin-left: 80%;" onclick="printDiv('printArea')">Print</button>
<?php } ?>

<!-- JavaScript for Print Functionality -->
<script>
function printDiv(divId) {
    var printContents = document.getElementById(divId).innerHTML;
    var originalContents = document.body.innerHTML;
    
    document.body.innerHTML = '<html><head><title>Print</title></head><body>' + printContents + '</body></html>';
    window.print();
    document.body.innerHTML = originalContents;
}
</script>


  

  <!--/ Section Services Star /-->

  <!--/ Section Blog Star /-->
  <!--/ Section Blog End /-->
  
  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/wed2.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left" id='get'>
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      <!-- Sidhesh Games headquarter -->
                     </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span>5P-704 Ahemadnagar Maharastra</li>
                      <li><span class="ion-ios-telephone"></span> +919022200460</li>
                      <li><span class="ion-email"></span> sidheshwarshekade@gmail.com</li>
                    </ul>
                  </div>
                  <div class="socials">
                    <ul>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-pinterest"></i></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>Sidhesh Wedding Planner</strong>. All Rights Reserved</p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                Designed by <a href="#">Sidheshwar Shekade </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
