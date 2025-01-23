<?php
  include('action.php');
  if(!isset($_SESSION['uname'])){
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
 

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <style>
    .circle {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: #007bff;
      display: inline-block;
      text-align: center;
      line-height: 30px;
      color: white;
      font-weight: bold;
      margin-right: 5px;
    }

 

/*# sourceMappingURL=style.css.map */

  </style>

  <!--------------- this script are used only logout alert box click on the ok so user logout but user click on the 
  cancel so stay on this user dashboard ------------------>
   <script>
        function confirmLogout(event) {
    
    if (confirm("Are you sure you want to log out?")) {
        document.getElementById('logoutForm').submit();
    } else {
      event.preventDefault(); // Prevent the default link action
     
       
    }
}
    </script>
  <!-- ------------------------------------------------------------------------------------ -->
</head>

<body id="page-top">

  <!-------------------------------------------/ Nav Star /----------------------------------------------------->
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
            <a class="nav-link js-scroll active" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#service">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/registration.php">Wedding Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="user_profile.php">
              <span class="circle"><?php echo substr($_SESSION['uname'], 0, 1); ?></span>
              <?php echo $_SESSION['uname']; ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/logout.php" onclick="confirmLogout(event)" id="logoutForm">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/wed3.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h1 class="intro-title mb-4">Sidhesh Wedding Planner</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Find your best Match,Make Your Wedding Memorable,Hire Us. Rest on Us</span><strong class="text-slider"></strong></p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
  <!---------------- this details work are user login but not register wedding so print wedding not register yet but 
  user wedding register so print all details about wedding ---------------------->
<div id="#das">
  <hr class='thin-line  my-4'>
 <h2 class="text-center weadding-details">Wedding Details</h2>
 <hr class='thin-line  my-4'>
  <br>
   <div class="container-fliud">
     <div class="card">
       <div class="card-header bg-info">
         <div class="row">
           <div class="col-md-2"> Name</div>
           <div class="col-md-2">Groom Name</div>
           <div class="col-md-2">Bride Name</div>
           <div class="col-md-2">Wedding Date</div>
           <div class="col-md-1">Person </div>
           <div class="col-md-2">Total Cost</div>
           <div class="col-md-1">Action</div>
         </div>
       </div>
        <div class="card-body">
          <?php
            if (isset($_SESSION['uname'])) {
              $name=$_SESSION['urname'];
               $sql="SELECT * FROM registration WHERE name='$name'";
        
               $run=mysqli_query($con,$sql);
                if(mysqli_num_rows($run)==0){
                  echo "<h2 class='text-center'>Wedding Not Register Yet</h2>";
                 }else{
               $row=mysqli_fetch_array($run);
                $reg_id=$row['reg_id'];
                $name=$row['name'];
                $dname=$row['dname'];
                $dlname=$row['dlname'];
                $date=$row['wdate'];
                $pno=$row['pno'];
                $s=$pno*100;
                $vid=$row['vid'];
                $tid=$row['tid'];
                $did=$row['did'];
                $pid=$row['pid'];
                $cid=$row['cid'];
                $mid=$row['mid'];
              $sql="SELECT * FROM catering WHERE cid='$cid' ";
              $run=mysqli_query($con,$sql);
              $price1 = 0;
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price1=$row['price'];
              }
              $sql="SELECT * FROM theme WHERE tid='$tid' ";
              $run=mysqli_query($con,$sql);
              $price2 = 0;
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price2=$row['price'];
              }
              $price3=0;
              $sql="SELECT * FROM music WHERE mid='$mid' ";
              $run=mysqli_query($con,$sql);
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price3=$row['price'];
              }
              $price4=0;
              $sql="SELECT * FROM photoshop WHERE pid='$pid' ";
              $run=mysqli_query($con,$sql);
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price4=$row['price'];
              }
              
              $sql="SELECT * FROM decoration WHERE did='$did' ";
              $run=mysqli_query($con,$sql);
              $price5 = 0;
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price5=$row['price'];
              }
            
              $sql="SELECT * FROM venue WHERE vid='$vid' ";
              $run=mysqli_query($con,$sql);
              $price6 = 0;
              if(mysqli_num_rows($run)!=0){
                $row=mysqli_fetch_array($run);
                $price6=$row['price'];
              }
              $sum=$price1+$price2+$price3+$price4+$price5+$price6+$s; 
                echo " <div class='row'>
                        <div class='col-md-2'><h5>$name</h5></div>
                        <div class='col-md-2'><h5>$dname</h5></div>
                        <div class='col-md-2'><h5>$dlname</h5></div>
                        <div class='col-md-2'><h5>$date</h5></div>
                        <div class='col-md-1'><h5>$pno</h5> </div>
                        <div class='col-md-2'><h5>$sum</h5></div>
                         <div class='col-md-1'><div class='btn btn-outline-danger del' rid='$reg_id'>Cancel</div></div>
                       </div><br>";
            }
          }
          ?>
       </div>
     </div>
   </div>
</div>

<div class="container">
  <div class="card mt-4">
    <div class="card-header bg-info">
      <h3 class="text-center wedding">Wedding Event Details</h3>
    </div>
    <?php
if (isset($_SESSION['uname'])) {
    $name = $_SESSION['urname'];
    $sql = "SELECT * FROM registration WHERE name='$name'";
    $run = mysqli_query($con, $sql);
    if (mysqli_num_rows($run) == 0) {
        echo "<h2 class='text-center'>Wedding Not Registered Yet</h2>";
    } else {
        $row = mysqli_fetch_array($run);
        $reg_id = $row['reg_id'];
        $name = $row['name'];
        $d1name = $row['dname'];
        $dlname = $row['dlname'];
        $date = $row['wdate'];
        $pno = $row['pno'];
        $s = $pno * 100;
        $vid = $row['vid'];
        $tid = $row['tid'];
        $did = $row['did'];
        $pid = $row['pid'];
        $cid = $row['cid'];
        $mid = $row['mid'];

        // Fetching details from tables
        $sql = "SELECT * FROM catering WHERE cid='$cid'";
        $run = mysqli_query($con, $sql);
        $price1 = 0;
        $cname = '';
        if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price1 = $row['price'];
            $cname = $row['name'];
        }

        $sql = "SELECT * FROM theme WHERE tid='$tid'";
        $run = mysqli_query($con, $sql);
        $price2 = 0;
        $tname = '';
        if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price2 = $row['price'];
            $tname = $row['name'];
        }

        $sql = "SELECT * FROM music WHERE mid='$mid'";
        $run = mysqli_query($con, $sql);
        $price3 = 0;
        $mname = '';
        if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price3 = $row['price'];
            $mname = $row['name'];
        }

        $sql = "SELECT * FROM photoshop WHERE pid='$pid'";
        $run = mysqli_query($con, $sql);
        $price4 = 0;
        $pname = '';
        if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price4 = $row['price'];
            $pname = $row['name'];
        }

        $sql = "SELECT * FROM decoration WHERE did='$did'";
        $run = mysqli_query($con, $sql);
        $price5 = 0;
        $dname = '';
        if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price5 = $row['price'];
            $dname = $row['name'];
        }

        $sql = "SELECT * FROM venue WHERE vid='$vid'";
        $run = mysqli_query($con, $sql);
        $price6 = 0;
        $vname = '';
        if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price6 = $row['price'];
            $vname = $row['name'];
        }

        $sum = $price1 + $price2 + $price3 + $price4 + $price5 + $price6 + $s;
        echo "
            <div class='container'>
               <h2></h2></br>
        
                <!-------------------------------- Wedding Couple Details----------------------------->
                <div class='card mb-4' style='border: 1px solid #ddd; border-radius: 10px;'>
                    <div class='card-header' style='background-color: #f5f5f5; border-bottom: 1px solid #ddd; font-family: \"Roboto\", sans-serif; font-size: 1.2rem; font-weight: 500;'>
                        <strong>Wedding Couple</strong>
                    </div>
                    <div class='card-body' style='font-family: \"Open Sans\", sans-serif;'>
                        <p><strong>Groom Name:</strong> <span style='font-size: 1.15rem; color: #333;'>$d1name</span></p>
                        <p><strong>Bride Name:</strong> <span style='font-size: 1.15rem; color: #333;'>$dlname</span></p>
                        <p><strong>Wedding Date:</strong> <span style='font-size: 1.15rem; color: #333;'>$date</span></p>
                    </div>
                </div>
        
                <!----------------------------------- Catering Details ---------------------->
                <div class='card mb-4' style='border: 1px solid #ddd; border-radius: 10px;'>
                    <div class='card-header' style='background-color: #f5f5f5; border-bottom: 1px solid #ddd; font-family: \"Roboto\", sans-serif; font-size: 1.2rem; font-weight: 500;'>
                        <strong>Catering</strong>
                    </div>
                    <div class='card-body d-flex justify-content-between align-items-center' style='font-family: \"Open Sans\", sans-serif;'>
                        <div>
                            <p><strong>Catering Name:</strong> <span style='font-size: 1.15rem; color: #333;'>$cname</span></p>
                            <p><strong>Price:</strong> <span style='font-size: 1.15rem; color: #333;'>$price1</span></p>
                        </div>
                        <button class='btn btn-outline-danger  remove-record' data-type='cid' data-id='$cid' data-price='$price1' style='font-family: \"Roboto\", sans-serif; border-radius: 5px;'>
                           Remove
                        </button>
                    </div>
                </div>
        
                <!------------------------------ Decoration Details ------------------------------->
                <div class='card mb-4' style='border: 1px solid #ddd; border-radius: 10px;'>
                    <div class='card-header' style='background-color: #f5f5f5; border-bottom: 1px solid #ddd; font-family: \"Roboto\", sans-serif; font-size: 1.2rem; font-weight: 500;'>
                        <strong>Decoration</strong>
                    </div>
                    <div class='card-body d-flex justify-content-between align-items-center' style='font-family: \"Open Sans\", sans-serif;'>
                        <div>
                            <p><strong>Decoration:</strong> <span style='font-size: 1.15rem; color: #333;'>$dname</span></p>
                            <p><strong>Price:</strong> <span style='font-size: 1.15rem; color: #333;'>$price5</span></p>
                        </div>
                        <button class='btn btn-outline-danger  remove-record' data-type='did' data-id='$did' data-price='$price5' style='font-family: \"Roboto\", sans-serif; border-radius: 5px;'>
                          Remove
                        </button>
                    </div>
                </div>
        
                <!--------------------- Music Details --------------->
                <div class='card mb-4' style='border: 1px solid #ddd; border-radius: 10px;'>
                    <div class='card-header' style='background-color: #f5f5f5; border-bottom: 1px solid #ddd; font-family: \"Roboto\", sans-serif; font-size: 1.2rem; font-weight: 500;'>
                        <strong>Music</strong>
                    </div>
                    <div class='card-body d-flex justify-content-between align-items-center' style='font-family: \"Open Sans\", sans-serif;'>
                        <div>
                            <p><strong>Music Style:</strong> <span style='font-size: 1.15rem; color: #333;'>$mname</span></p>
                            <p><strong>Price:</strong> <span style='font-size: 1.15rem; color: #333;'>$price3</span></p>
                        </div>
                        <button class='btn btn-outline-danger  remove-record' data-type='mid' data-id='$mid' data-price='$price3' style='font-family: \"Roboto\", sans-serif; border-radius: 5px;'>
                           Remove
                        </button>
                    </div>
                </div>
        
                <!--------------------------- Venue Details ---------------------------------->
                <div class='card mb-4' style='border: 1px solid #ddd; border-radius: 10px;'>
                    <div class='card-header' style='background-color: #f5f5f5; border-bottom: 1px solid #ddd; font-family: \"Roboto\", sans-serif; font-size: 1.2rem; font-weight: 500;'>
                        <strong>Venue</strong>
                    </div>
                    <div class='card-body d-flex justify-content-between align-items-center' style='font-family: \"Open Sans\", sans-serif;'>
                        <div>
                            <p><strong>Venue:</strong> <span style='font-size: 1.15rem; color: #333;'>$vname</span></p>
                            <p><strong>Price:</strong> <span style='font-size: 1.15rem; color: #333;'>$price6</span></p>
                        </div>
                        <button class='btn btn-outline-danger  remove-record' data-type='vid' data-id='$vid' data-price='$price6' style='font-family: \"Roboto\", sans-serif; border-radius: 5px;'>
                           Remove
                        </button>
                    </div>
                </div>
        
                <!--------------------------------- Theme Details -------------------------------->
                <div class='card mb-4' style='border: 1px solid #ddd; border-radius: 10px;'>
                    <div class='card-header' style='background-color: #f5f5f5; border-bottom: 1px solid #ddd; font-family: \"Roboto\", sans-serif; font-size: 1.2rem; font-weight: 500;'>
                        <strong>Theme</strong>
                    </div>
                    <div class='card-body d-flex justify-content-between align-items-center' style='font-family: \"Open Sans\", sans-serif;'>
                        <div>
                            <p><strong>Theme Type:</strong> <span style='font-size: 1.15rem; color: #333;'>$tname</span></p>
                            <p><strong>Price:</strong> <span style='font-size: 1.15rem; color: #333;'>$price2</span></p>
                        </div>
                        <button class='btn btn-outline-danger  remove-record' data-type='tid' data-id='$tid' data-price='$price2' style='font-family: \"Roboto\", sans-serif; border-radius: 5px;'>
                          Remove
                        </button>
                    </div>
                </div>
        
                <!-------------------------------------- Photoshop Details ---------------------------->
                <div class='card mb-4' style='border: 1px solid #ddd; border-radius: 10px;'>
                    <div class='card-header' style='background-color: #f5f5f5; border-bottom: 1px solid #ddd; font-family: \"Roboto\", sans-serif; font-size: 1.2rem; font-weight: 500;'>
                        <strong>Photoshop</strong>
                    </div>
                    <div class='card-body d-flex justify-content-between align-items-center' style='font-family: \"Open Sans\", sans-serif;'>
                        <div>
                            <p><strong>Photo:</strong> <span style='font-size: 1.15rem; color: #333;'>$pname</span></p>
                            <p><strong>Price:</strong> <span style='font-size: 1.15rem; color: #333;'>$price4</span></p>
                        </div>
                        <button class='btn btn-outline-danger  remove-record' data-type='pid' data-id='$pid' data-price='$price4' style='font-family: \"Roboto\", sans-serif; border-radius: 5px;'>
                           Remove
                        </button>
                    </div>
                </div>
            </div>
        
            <div class='card-footer text-center' style='background-color: #f5f5f5; border: 1px solid #ddd; border-radius: 10px; padding: 15px;'>
                <h3 style='font-family: \"Roboto\", sans-serif; font-weight: 600;'>Total Fare: <span id='total-fare' style='color: #e74c3c;'>$sum</span></h3>
                <button id='generate-bill-btn' class='btn btn-primary btn-lg' style='font-family: \"Roboto\", sans-serif; border-radius:8px; width:300px'>
                    <i class='fas fa-file-invoice'></i> Generate Bill
                </button>
            </div>
        ";
        
        
    }
}

// Fetch user info for bill
// $u_id=$_SESSION['uid']; where uid='$u_id'

$uname= $_SESSION['uname'];
$sql1 = "SELECT * FROM u_info WHERE  uname='$uname' ";
$run1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($run1);
$adds = $row1['adds'];
$mno = $row1['pno'];
?>

<!---------------- this script are used update the click on the remove button so remove the record from db and update total fare- record price -->
<script>
$(document).ready(function(){
    $('.remove-record').on('click', function(){
        var dataId = $(this).data('id');
        var dataType = $(this).data('type');
        var price = $(this).data('price');
        var element = $(this).closest('.row');

        // Remove the element from the screen
        element.remove();

        // Update the total fare
        var totalFare = parseInt($('#total-fare').text());
        $('#total-fare').text(totalFare - price);
       
        
        
        if(confirm('Are you sure you want to remove this item?')) {
          
            $.ajax({
                url: '', // Keep it empty to send the request to the same PHP file
                type: 'POST',
                data: {id: dataId, type: dataType},
                success: function(response){
                  location.reload();
                    if(response == 'success'){
                        alert('Record removed successfully.');
                        location.reload(); // Reload the page to reflect the changes
                    }
                }
            });
        }  location.reload();
    });
});
</script>

<?php
// Handle the AJAX request to remove records
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type = $_POST['type'];

    // Determine the table to delete from based on type
    switch ($type) {
        case 'cid':
            $table = 'registration';
            $column = 'cid';
            break;
        case 'tid':
            $table = 'registration';
            $column = 'tid';
            break;
        case 'mid':
            $table = 'registration';
            $column = 'mid';
            break;
        case 'pid':
            $table = 'registration';
            $column = 'pid';
            break;
        case 'did':
            $table = 'registration';
            $column = 'did';
            break;
        case 'vid':
            $table = 'registration';
            $column = 'vid';
            break;
        default:
            echo 'error';
            exit;
    }

    // Execute the delete query
   $sql = "UPDATE registration SET $column=0 WHERE reg_id='$reg_id' AND $column='$id'";

    if (mysqli_query($con, $sql)) {
        echo 'success';
    } else {
        echo 'error';
    }
}

// *******************************************************************************************************************************
?>

 
  </div>
</div>

<!-- Bill Modal -->
<div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="billModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="margin-left:175px;" id="billModalLabel">Wedding Bill</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Bill details will be injected here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>
  $(document).ready(function() {

      // Assign PHP variables to JavaScript variables
    var pno= "<?php echo $pno; ?>";
    var mno= "<?php echo $mno; ?>";
    var adds= "<?php echo $adds; ?>";
    var name="<?php echo $name; ?>";
    var cname = "<?php echo $cname; ?>";
    var price1 = "<?php echo $price1; ?>";
    var dname = "<?php echo $dname; ?>";
    var price5 = "<?php echo $price5; ?>";
    var mname = "<?php echo $mname; ?>";
    var price3 = "<?php echo $price3; ?>";
    var vname = "<?php echo $vname; ?>";
    var price6 = "<?php echo $price6; ?>";
    var tname = "<?php echo $tname; ?>";
    var price2 = "<?php echo $price2; ?>";
    var pname = "<?php echo $pname; ?>";
    var price4 = "<?php echo $price4; ?>";
    var sum = "<?php echo $sum; ?>";
    let date = new Date().toLocaleDateString('en-GB');
  




   $('#generate-bill-btn').on('click', function() {
    
  // Generate a unique bill number
  var billNo = 'BILL-' + (Math.floor(Math.random() * 900000) + 100000);

  var billDetails = `
    <div class='bill-container'>
      <div style='text-align: center;'>
        <h2>Sidhesh Wedding Planner</h2>
        <h5>Any service you provide</h5>
      </div>
      <hr>
      <div style='display: flex; justify-content: space-between;'>
        <div>No: ${billNo}</div>
        <div>Date: ${date}</div>
      </div>
      <div style='display: flex; justify-content: space-between; margin-top: 5px;'>
        <div>Name: ${name}</div>
        <div>Mobile:  ${mno}</div>
      </div>
      <div style='margin-top: 5px;'>Address:  ${adds}</div>
      <hr>
      <table border='1' width='100%' cellpadding='5' cellspacing='0' style='margin-top: 10px;'>
        <thead>
          <tr>
            <th>Sr</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Persons (${pno})</td>
            <td>${pno}</td>
            <td>100</td>
            <td>${pno*100}</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Catering (${cname})</td>
            <td>1</td>
            <td>${price1}</td>
            <td>${price1}</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Decoration (${dname})</td>
            <td>1</td>
            <td>${price5}</td>
            <td>${price5}</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Music (${mname})</td>
            <td>1</td>
            <td>${price3}</td>
            <td>${price3}</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Venue (${vname})</td>
            <td>1</td>
            <td>${price6}</td>
            <td>${price6}</td>
          </tr>
          <tr>
            <td>6</td>
            <td>Theme (${tname})</td>
            <td>1</td>
            <td>${price2}</td>
            <td>${price2}</td>
          </tr>
          <tr>
            <td>7</td>
            <td>Photoshop (${pname})</td>
            <td>1</td>
            <td>${price4}</td>
            <td>${price4}</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan='4' align='right'>Total Fare</td>
            <td>${sum}</td>
          </tr>
        </tfoot>
      </table>
      <hr>
       <div style='text-align: right; margin-top: 20px;'>
    <h4>Signature:<img src='/wedding/img/sign.jpg' alt='Signature' style='width: 150px; height: auto;'></h4>
    
  </div>
    </div>
  `;

  // Display the bill details in the modal
  $('#billModal .modal-body').html(billDetails);

  // Add Pay and Download buttons next to the Close button in the modal footer
  var modalFooter = `
    <button id="pay-btn" class="btn btn-primary">Pay</button>
   <button id="print-btn" class="btn btn-secondary">Print</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  `;
  $('#billModal .modal-footer').html(modalFooter);

  // Show the modal
  $('#billModal').modal('show');

  // Handle Pay button click
  $('#pay-btn').on('click', function() {
    var qrCode = `<div style="text-align: center;">
                    <h5>Scan to Pay</h5>
                    <img src="/wedding/img/QRcode.png" alt="QR Code" style="max-width: 50%; height: auto;" />
                  </div>`;
    $('#billModal .modal-body').html(qrCode);

    // Simulate QR scan and show payment confirmation
    setTimeout(function() {
      var paymentConfirmation = `<div style="text-align: center;">
                                   <h5>Total Fare: ${sum}</h5>
                                   <button id="confirm-pay-btn" class="btn btn-success">Confirm Now</button>
                                 </div>`;
      $('#billModal .modal-body').html(paymentConfirmation);

      // Handle payment confirmation
      $('#confirm-pay-btn').on('click', function() {
        var thankYouMessage = `<div style="text-align: center;">
                                 <h3>Thank you for visiting!</h3>
                               </div>`;
        $('#billModal .modal-body').html(thankYouMessage);
      });
    }, 10000); // Simulate 10 seconds delay for QR scan
  });
   // ****************** Handle Print button click*****************************
   $('#print-btn').on('click', function() {
    window.print();
  });

  // *****************************
 
});




  });
</script>
  </div>
</div>
  <!---------------------/ Section Services Star /------------------->
  <section id="service" class="services-mf route mt-4">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
            Select  Services
            </h3>
            <p class="subtitle-a">
             
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <a href="venue.php">
          <div class="service-box" style="background-image:url(img/venue.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Venue</b></h2>
              <p class="s-description text-center text-white"><b>
                </b>
              </p>
            </div>
          </div></a>
        </div>
        <div class="col-md-4">
          <a href="theme.php">
           <div class="service-box" style="background-image:url(img/theme.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Theme</b></h2>
              <p class="s-description text-center text-white"><b>
               </b>
              </p>
            </div>
          </div></a>
        </div>
        <div class="col-md-4">
             <a href="cat.php">
           <div class="service-box" style="background-image:url(img/cat.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Catering</b></h2>
              <p class="s-description text-center text-white"><b>
                </b>
              </p>
            </div>
          </div></a>
        </div>
        <div class="col-md-4">
             <a href="music.php">
           <div class="service-box" style="background-image:url(img/dj.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Music</b></h2>
              <p class="s-description text-center text-white"><b>
               </b>
              </p>
            </div>
          </div>
        </div></a>
        <div class="col-md-4">
           <a href="photo.php">
           <div class="service-box" style="background-image:url(img/photo.jpg); background-size: cover;">
            <div class="service-ico">
            </div>
            <div class="service-content ">
              <h2 class="s-title text-white"> <b>Photoshop</b></h2>
              <p class="s-description text-center text-white"><b>
                
              </p>
            </div>
          </div></a>
        </div>
        <div class="col-md-4">
    <a href="decoration.php">
        <div class="service-box" style="background-image:url(img/decoration.jpg);background-size:cover; width: 350px;">
            <div class="service-ico"></div>
            <div class="service-content ">
                <h2 class="s-title text-white"><b>Decoration</b></h2>
                <p class="s-description text-center text-white"></p>
            </div>
        </div>
    </a>
</div>
      </div>
    </div>
  </section>
  <!-------------------------/ Section Services End /---------------------------->
   
  <div class="section-counter paralax-mf bg-image" style="background-image: url(img/wed.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">550</p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">4</p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-people"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">950</p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">36</p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-----------------/ Section Portfolio Star /---------------------->
 

 <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row">
              <div class="col-md-6">
                    <div class="about-img">
                      <img src="img/wed2.jpg" class="img-fluid rounded b-shadow-a" alt="">
                    </div>
                 
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>
                  <p class="lead">
                    
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!----------------------/ Section Testimonials Star /----------------------->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(img/wed1.jpeg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="testimonial-mf" class="owl-carousel owl-theme">
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/rajesh.jpeg" alt="" class="rounded-circle b-shadow-a" style="height: 250px; width: 250px;">
                <span class="author">Aishwarya </span>
              </div>
              <div class="content-test">
                <p class="description lead">
                 
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
            <div class="testimonial-box">
              <div class="author-test">
                <img src="img/CEO-img.jpg" alt="" class="rounded-circle b-shadow-a" style="height: 250px; width: 250px;">
                <span class="author">Sidheshwar Shekade</span>
              </div>
              <div class="content-test">
                <p class="description lead">
                  
                </p>
                <span class="comit"><i class="fa fa-quote-right"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


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
                <h5 class="title-left">Get in Touch</h5>
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

            <!-- Feedback Form Section -->
            <div class="col-md-6">
              <div class="title-box-2 pt-4 pt-md-0">
                <h5 class="title-left">Feedback Form</h5>
              </div>
              <div class="feedback-form mt-3" style="padding: 15px; margin-top: 10px;">
              <?php if (isset($_GET['success'])) { ?>
                                        <div class="alert alert-success">Feedback Submitted Successfully!</div>
                                    <?php } ?>
                <form action="store_feedback.php" method="POST">
                  <div class="mb-2">
                    <label for="name" class="form-label font-weight-bold">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                  </div>
                  <div class="mb-2">
                    <label for="email" class="form-label font-weight-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                  </div>
                  <div class="mb-2">
                    <label for="rating" class="form-label font-weight-bold">Rate Our Services</label>
                    <select class="form-select" id="rating" name="rating" required>
                      <option value="" disabled selected>Select Rating</option>
                      <option value="1">1 - Poor</option>
                      <option value="2">2 - Fair</option>
                      <option value="3">3 - Good</option>
                      <option value="4">4 - Very Good</option>
                      <option value="5">5 - Excellent</option>
                    </select>
                  </div>
                  <div class="mb-2">
                    <label for="comments" class="form-label font-weight-bold">Comments</label>
                    <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Share your experience" required></textarea>
                  </div>
                  <div class="text-center font-weight-bold">
                    <button type="submit" class="btn btn-dark btn-sm">Submit Feedback</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End of Feedback Form Section -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>    <footer>
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
                Designed by <a href="#">Sidheshwar Shekade And Rohit Randhvane</a>
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
