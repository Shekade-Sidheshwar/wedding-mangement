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

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

   <style>
    .mt-5{
            border: 1px solid black;
            padding: 2px 2px 5px 2px;
            width: 30%;
            border-radius: 10px;
            margin-left: 35%;
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
            <a class="nav-link js-scroll active" href="registration/venue.php">Venue</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/theme.php">Theme</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/music.php">Music</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/catering.php">Catering</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/photoshop.php">PhotoShop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/decoration.php">Decoration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="checkbooking.php">Check Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/logout.php">Log out</a>
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
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">Sidhesh Wedding Planner</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Find your best Match,Make Your Wedding Memorable,Hire Us. Rest on Us</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  
  <!--/ Intro Skew End /-->
<!-- Header -->
<h2 class="text-center mt-5">Registered Wedding</h2>
<br>
<div class="container" style="margin-top: 7px; display: flex; justify-content: right;margin: left 50px;%;margin-bottom:-15px;">
    <form method="GET" action="" style="width: 50%; position: relative;">
        <input 
            type="text" 
            name="search" 
            placeholder="Search for UserName Only..." 
            class="form-control" 
            style="width: 100%; border-radius:8px; padding: 10px 60px 10px 20px; font-size: 16px; border: 2px solid #3b5998;"
            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
        >
        <button 
            type="submit" 
            class="btn btn-primary" 
            style="position: absolute; top: 50%; right: 0px; transform: translateY(-50%); border-radius: 8px; padding: 5px 36px; font-size: 16px;">
            <i class="fa fa-search"></i>
        </button>
    </form>
</div>

<!-- Container for the card -->
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <!-- Table header -->
            <div class="row">
                <div class="col-md-1"><strong>Regi Id</strong></div>
                <div class="col-md-2"><strong>Name</strong></div>
                <div class="col-md-2"><strong>Groom Name</strong></div>
                <div class="col-md-2"><strong>Bride Name</strong></div>
                <div class="col-md-2"><strong>Wedding Date</strong></div>
                <div class="col-md-1"><strong>Persons</strong></div>
                <div class="col-md-1"><strong>Total Cost</strong></div>
                <div class="col-md-1"><strong>Status</strong></div>
            </div>
        </div>

        <!-- Table body -->
        <div class="card-body" id="printArea">
            <?php
            // Check if the user is logged in
            $search = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the SQL query to fetch data
$sql = "SELECT * FROM registration";
if (!empty($search)) {
    $sql .= " WHERE name LIKE ?";
}

// Execute the SQL query with prepared statements
$stmt = $con->prepare($sql);

if (!empty($search)) {
    $search = $search . '%'; // Match names starting with the search term
    $stmt->bind_param("s", $search);
}

$stmt->execute();
$result = $stmt->get_result();

// Display the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reg_id = $row['reg_id'];
        $name = $row['name'];
        $d1name = $row['dname'];
        $dlname = $row['dlname'];
        $date = $row['wdate'];
        $pno = $row['pno'];
        $s = $pno * 100;

        // Fetch related details (similar logic as your original code)
        $sum = calculateTotalCost($row['cid'], $row['tid'], $row['mid'], $row['pid'], $row['did'], $row['vid'], $s, $con);

        echo "
        <div class='row'>
            <div class='col-md-1 d-flex align-items-center'><h6>$reg_id</h6></div> 
            <div class='col-md-2 d-flex align-items-center'><h6>$name</h6></div>
            <div class='col-md-2 d-flex align-items-center'><h6>$d1name</h6></div>
            <div class='col-md-2 d-flex align-items-center'><h6>$dlname</h6></div>
            <div class='col-md-2 d-flex align-items-center'><h6>$date</h6></div>
            <div class='col-md-1 d-flex align-items-center'><h6>$pno</h6></div>
            <div class='col-md-1 d-flex align-items-center'><h6>₹$sum</h6></div>
            <div class='col-md-1 d-flex align-items-center'>
                <form method='POST' action=''>
                    <input type='hidden' name='reg_id' value='$reg_id'>
                    <button type='submit' name='deleted' class='btn btn-outline-danger btn-sm'>Remove</button>
                </form>
            </div>
        </div>
        <hr class='my-2'>";
    }
} else {
    echo "<div style='text-align:center; font-size: 18px; color: #888; padding: 20px; font-style: italic;'>No users found</div>";
}

$stmt->close();

// Function to calculate total cost
function calculateTotalCost($cid, $tid, $mid, $pid, $did, $vid, $s, $con) {
  $total = $s;

  // Define the tables and their respective ID columns
  $categories = [
      'catering' => ['column' => 'cid', 'id' => $cid],
      'theme' => ['column' => 'tid', 'id' => $tid],
      'music' => ['column' => 'mid', 'id' => $mid],
      'photoshop' => ['column' => 'pid', 'id' => $pid],
      'decoration' => ['column' => 'did', 'id' => $did],
      'venue' => ['column' => 'vid', 'id' => $vid],
  ];

  // Iterate over categories and fetch the price
  foreach ($categories as $table => $data) {
      $column = $data['column'];
      $id = $data['id'];

      if (!empty($id)) {
          $sql = "SELECT price FROM $table WHERE $column=?";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $stmt->bind_result($price);
          if ($stmt->fetch()) {
              $total += $price;
          }
          $stmt->close();
      }
  }

  return $total;
}

            ?>
        </div>
    </div>
</div>

            <?php
              // Check if the delete button was clicked
              if (isset($_POST['deleted'])) {
                  $reg_id = $_POST['reg_id'];

                  // SQL query to delete the record from the registration table
                  $sql = "DELETE FROM registration WHERE reg_id = '$reg_id'";

                  // Execute the query
                  if (mysqli_query($con, $sql)) {
                      echo "<script>alert('Record deleted successfully');</script>";
                      echo "<script>window.location.href = window.location.href;</script>"; // Refresh the page
                  } else {
                      echo "<script>alert('Error deleting record: " . mysqli_error($con) . "');</script>";
                  }
              }
              ?>

        </div>
    </div>
</div>

<!-- Print Button -->
<button class="btn btn-primary mt-3" style="margin-left: 80%;" onclick="printDiv('printArea')">Print</button>

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
                    <h5 class="title-left">
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
                      <li><span class="ion-email"></span>Sidheshwarshekade@gmail.com</li>
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
                Designed by <a href="#">Sidheshwar Shekade</a>
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
