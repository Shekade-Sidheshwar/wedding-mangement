<?php
   $con=mysqli_connect('localhost:3307','Root','1234','wedding');
   session_start();

   /*-----admin login-----*/
  if (isset($_POST['admin'])) {
  	$name=$_POST['name'];
  	$psw=$_POST['psw'];
  	$sql="SELECT *  FROM admin WHERE name='$name'AND psw='$psw'";
  	$run=mysqli_query($con,$sql);
  	if(mysqli_num_rows($run)==1){
       $_SESSION['name']=$name;
       header('location:../dasboard.php');
  	}
  }
  /*--------user registration------*/
  
if (isset($_POST['signup'])) {
    $name = trim($_POST['name']);
    $uname = trim($_POST['uname']);
    $email = $_POST['email'];
    $pno = $_POST['pno'];
    $add = $_POST['add'];
    $psw = trim($_POST['psw']);
    $repsw = trim($_POST['repsw']);

    if ($psw == $repsw) {
        $sql = "SELECT * FROM u_info WHERE uname='$uname'";
        $run = mysqli_query($con, $sql);
        if (mysqli_num_rows($run) > 0) {
            $_SESSION['error'] = 'Username already exists. Please choose a different username.';
            header('Location: signup.php');
            exit();
        } else {
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['signup_data'] = $_POST;

            $subject = "Sidhesh Wedding Planner";
            $message = "Welcome to Sidhesh Wedding Planner! Use This OTP $otp And Begin Your Journey 💍";
            $headers = "From: sidheshwarshekade@gmail.com";

            if (mail($email, $subject, $message, $headers)) {
                echo '<script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.getElementById("signup-form").style.display = "none";
                            document.getElementById("otp-form").style.display = "block";
                        });
                      </script>';
            } else {
                $_SESSION['error'] = 'OTP Sending Failed. Please try again.';
                header('Location: signup.php');
                exit();
            }
        }
    } else {
        $_SESSION['error'] = 'Passwords do not match!';
        header('Location: signup.php');
        exit();
    }
}

if (isset($_POST['verify'])) {
    $entered_otp = trim($_POST['otp']);
    $session_otp = trim($_SESSION['otp']);
    $signup_data = $_SESSION['signup_data'];

    if ($entered_otp == $session_otp) {
        $name = $signup_data['name'];
        $uname = $signup_data['uname'];
        $email = $signup_data['email'];
        $pno = $signup_data['pno'];
        $add = $signup_data['add'];
        $psw = $signup_data['psw'];

        $sql = "INSERT INTO u_info (name, uname, email, pno, adds, psw) VALUES ('$name', '$uname', '$email', '$pno', '$add', '$psw')";
        $run = mysqli_query($con, $sql);
        if ($run) {
            $_SESSION['uid'] = mysqli_insert_id($con);
            $_SESSION['uname'] = $uname;
            $_SESSION['urname'] = $name;
            unset($_SESSION['otp']);
            unset($_SESSION['signup_data']);
            echo '<script>
                    alert("User Registered Successfully.");
                    window.location.href = "login.php";
                  </script>';
        } else {
            echo '<script>
                    alert("Registration Failed: ' . mysqli_error($con) . '");
                    window.location.href = "signup.php";
                  </script>';
        }
    } else {
        echo '<script>
                alert("Invalid OTP. Please try again.");
                window.location.href = "signup.php";
              </script>';
    }
}

  /*--------------user login------*/
  if (isset($_POST['login'])) {
  	$name=$_POST['name'];
  	$psw=$_POST['psw'];
  	$sql="SELECT * FROM u_info WHERE uname='$name' AND psw='$psw'";
  	$run=mysqli_query($con,$sql);
  	$row=mysqli_fetch_array($run);
  	if(mysqli_num_rows($run)==1){
       $_SESSION['uname']=$name;
       $_SESSION['uid']=$row['uid'];
       $_SESSION['urname']=$row['name'];
       header('location:../profile.php');
  	}else{
        echo "<script>alert('Please Check Username And Password ');</script>";
    }
  }
  /*------------------wedding registration-------*/
  if (isset($_POST['submit'])) {
  	 $name=$_POST['name'];
  	 $dname=$_POST['dname'];
  	 $dlname=$_POST['dlname'];
  	 $date=$_POST['date'];
  	 $pno=$_POST['pno'];
     $pHno=$_POST['pHno'];
  	 $sql="SELECT *  FROM registration WHERE name='$name'AND dlname='$dlname'AND dname='$dname'";
  	 $run=mysqli_query($con,$sql);
  	 if (mysqli_num_rows($run)>0) {
  	 	 echo "<script>alert(' Already registered please check dashboard')</script>";
  	 }else{
        
  	 	$sql="INSERT INTO `registration` (`reg_id`, `name`, `dname`, `dlname`, `wdate`, `pno`,`pHno`, `vid`, `mid`, `cid`, `did`, `tid`, `pid`)
  	 	 VALUES (NULL, '$name', '$dname', '$dlname', '$date', '$pno','$pHno', '', '', '', '', '', '')";
  	 	 $run=mysqli_query($con,$sql);
  	 	 if ($run) {
  	 	 	header('location:../profile.php');
  	 	 }
  	 }

  }
  /*---------------------service addition--------*/
  if (isset($_POST['venue'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM venue WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `venue` (`vid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
            
         }
      }
  }
  if (isset($_POST['music'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM music WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `music` (`mid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['dect'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM decoration WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `decoration` (`did`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['cat'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM catering WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `catering` (`cid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['theme'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM theme WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `theme` (`tid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }
  if (isset($_POST['photo'])) {
      $name=$_POST['vname'];
      $price=$_POST['price'];
      $desc=$_POST['desc'];
      $sql="SELECT * FROM photoshop WHERE name='$name'";
      $run=mysqli_query($con,$sql);
      if (mysqli_num_rows($run)>0) {
           echo "<h2> Already present in database</h2>";
      }else{
        $sql="INSERT INTO `photoshop` (`pid`, `name`, `price`, `descr`) 
        VALUES (NULL, '$name', '$price', '$desc')";
         $run=mysqli_query($con,$sql);
         if ($run) {
             header('location:../dasboard.php');
         }
      }
  }

  if (isset($_POST['delete'])) {
    $rid=$_POST['rid'];
    $sql="DELETE FROM registration WHERE reg_id='$rid'";
     $run=mysqli_query($con,$sql);
     if($run){
          echo"Cancel Registration";
     }
        

   }
   /*=================== service selection----------*/
   
   if (isset($_POST['add1'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];    
       $sql="UPDATE registration SET vid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Venue Fixed for Wedding";
         }
   }
   if (isset($_POST['add2'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET cid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Catering Fixed for Wedding";
         }
   }
  if (isset($_POST['add3'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET mid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Music Fixed for Wedding";
         }
   }
  if (isset($_POST['add4'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET did='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Decoration Fixed for Wedding";
         }
   }
    
  if (isset($_POST['add5'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET tid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "Theme Fixed for Wedding";
         }

   }
  

   if (isset($_POST['add6'])) {
       $rid=$_POST['rid'];
       $name=$_SESSION['urname'];
       $sql="UPDATE registration SET pid='$rid' WHERE name='$name'";
        $run=mysqli_query($con,$sql);
         if ($run) {
            echo "photoshop Fixed for Wedding";
         }
   }



   /*--------------------searching operation----------------------*/
 
//    $sql_registration = "SELECT vid, mid, cid, pid, wdate,name, reg_id FROM registration WHERE reg_id='reg_id'";
// $result_registration = $con->query($sql_registration);

// if ($result_registration->num_rows > 0) {
//     echo '<div id="printArea">';  // Start of printable area
//     while ($row_registration = $result_registration->fetch_assoc()) {
//         $vid = $row_registration["vid"];
//         $mid = $row_registration["mid"];
//         $cid = $row_registration["cid"];
//         $pid = $row_registration["pid"];
//         $wdate = $row_registration["wdate"];
//         $name = $row_registration["name"];
        
//         echo "Registration Name: " . $name . "<br>";
//         echo "Wedding Date: " . $wdate . "<br>";


//         // Query for venue
//         $sql_venue = "SELECT * FROM venue WHERE vid = $vid";
//         $result_venue = $conn->query($sql_venue);
        
//         // Query for music
//         $sql_music = "SELECT * FROM music WHERE mid = $mid";
//         $result_music = $conn->query($sql_music);
        
//         // Query for catering
//         $sql_catering = "SELECT * FROM catering WHERE cid = $cid";
//         $result_catering = $conn->query($sql_catering);
        
//         // Query for photoshop
//         $sql_photoshop= "SELECT * FROM photoshop WHERE pid = $pid";
//         $result_photoshop = $conn->query($sql_photoshop);

//         if ($result_venue->num_rows > 0) {
//             $row_venue = $result_venue->fetch_assoc();
//             echo "Venue Name: " . $row_venue["name"] . " - Price: " . $row_venue["price"] . "<br>";
//         }
        
//         if ($result_music->num_rows > 0) {
//             $row_music = $result_music->fetch_assoc();
//             echo "Music Name: " . $row_music["name"] . " - Price: " . $row_music["price"] . "<br>";
//         }
        
//         if ($result_catering->num_rows > 0) {
//             $row_catering = $result_catering->fetch_assoc();
//             echo "Catering Name: " . $row_catering["name"] . " - Price: " . $row_catering["price"] . "<br>";
//         }
        
//         if ($result_photoshop->num_rows > 0) {
//             $row_photoshop = $result_photoshop->fetch_assoc();
//             echo "Photoshop Name: " . $row_photoshop["name"] . " - Price: " . $row_photoshop["price"] . "<br>";
//         }
//     }
//     echo '</div>';  // End of printable area
// } 



// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $reg_id = $_POST['reg_id'];
//     $wdate = $_POST['wdate'];
    
//     $sql_registration = "SELECT vid, mid, cid, pid, wdate, name, reg_id FROM registration WHERE reg_id = ? AND wdate = ?";
//     $stmt = $con->prepare($sql_registration);
//     $stmt->bind_param("ss", $reg_id, $wdate);
//     $stmt->execute();
//     $result_registration = $stmt->get_result();

//     if ($result_registration->num_rows > 0) {
//         echo '<div id="printArea">';  // Start of printable area

//         while ($row_registration = $result_registration->fetch_assoc()) {
//             $vid = $row_registration["vid"];
//             $mid = $row_registration["mid"];
//             $cid = $row_registration["cid"];
//             $pid = $row_registration["pid"];
//             $wdate = $row_registration["wdate"];
//             $name = $row_registration["name"];
            
//             // echo "<div class='row' style='background-color: #007bff; color: white;'>
//             //         <div class='col-md-3'>
//             //             <h4 class='text-center'>Registration Name</h4>
//             //         </div>
//             //         <div class='col-md-3'>
//             //             <h4 class='text-center'>$name</h4>
//             //         </div>
//             //         <div class='col-md-3'>
//             //             <h4 class='text-center'>Wedding Date</h4>
//             //         </div>
//             //         <div class='col-md-3'>
//             //             <h4 class='text-center'>$wdate</h4>
//             //         </div>
//             //     </div><br>";

//             // Query for venue
//             $sql_venue = "SELECT * FROM venue WHERE vid = ?";
//             $stmt_venue = $con->prepare($sql_venue);
//             $stmt_venue->bind_param("i", $vid);
//             $stmt_venue->execute();
//             $result_venue = $stmt_venue->get_result();
            
//             // Query for music
//             $sql_music = "SELECT * FROM music WHERE mid = ?";
//             $stmt_music = $con->prepare($sql_music);
//             $stmt_music->bind_param("i", $mid);
//             $stmt_music->execute();
//             $result_music = $stmt_music->get_result();
            
//             // Query for catering
//             $sql_catering = "SELECT * FROM catering WHERE cid = ?";
//             $stmt_catering = $con->prepare($sql_catering);
//             $stmt_catering->bind_param("i", $cid);
//             $stmt_catering->execute();
//             $result_catering = $stmt_catering->get_result();
            
//             // Query for photoshop
//             $sql_photoshop = "SELECT * FROM photoshop WHERE pid = ?";
//             $stmt_photoshop = $con->prepare($sql_photoshop);
//             $stmt_photoshop->bind_param("i", $pid);
//             $stmt_photoshop->execute();
//             $result_photoshop = $stmt_photoshop->get_result();

//             if ($result_venue->num_rows > 0) {
//                 $row_venue = $result_venue->fetch_assoc();
//                 $type = "Venue";
//                 $cname = $row_venue["name"];
//                 $price = $row_venue["price"];
//                 echo "<div class='row'>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$type</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$cname</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$wdate</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$price</h3>
//                         </div>
//                     </div><br>";
//             }
            
//             if ($result_music->num_rows > 0) {
//                 $row_music = $result_music->fetch_assoc();
//                 $type = "Music";
//                 $cname = $row_music["name"];
//                 $price = $row_music["price"];
//                 echo "<div class='row'>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$type</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$cname</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$wdate</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$price</h3>
//                         </div>
//                     </div><br>";
//             }
            
//             if ($result_catering->num_rows > 0) {
//                 $row_catering = $result_catering->fetch_assoc();
//                 $type = "Catering";
//                 $cname = $row_catering["name"];
//                 $price = $row_catering["price"];
//                 echo "<div class='row'>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$type</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$cname</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$wdate</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$price</h3>
//                         </div>
//                     </div><br>";
//             }
            
//             if ($result_photoshop->num_rows > 0) {
//                 $row_photoshop = $result_photoshop->fetch_assoc();
//                 $type = "Photoshop";
//                 $cname = $row_photoshop["name"];
//                 $price = $row_photoshop["price"];
//                 echo "<div class='row'>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$type</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$cname</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$wdate</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$price</h3>
//                         </div>
//                     </div><br>";
//             }
//         }
//         echo '</div>';  // End of printable area
//     } else {
//         echo "No registration data found";
//     }

//     $stmt->close();
// }




// if (isset($_POST['search'])) {
//    $bid=$_POST['bid'];
//    $sid=$_POST['sid'];
//    $date=$_POST['date'];

//    switch ($sid) {
//      case 'cid':
//                   $sql="SELECT * FROM registration WHERE wdate='$date' AND cid='$bid' ";
//                   $run=mysqli_query($con,$sql);
//                 if(mysqli_num_rows($run)==0){
//                     echo "<h2 class='text-center'>Not found </h2>";
//                  }else{
//                   $sql="SELECT * FROM catering WHERE cid='$bid'";
//                   $run=mysqli_query($con,$sql);
//                   $row=mysqli_fetch_array($run);
//                     $name=$row['name'];
//                     $price=$row['price'];
//                     $type="Catering";
//                      echo " <div class='row'>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'> $type</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$name</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$date</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$price</h3>
//           </div>
//         </div>";
//                  }
//        break;
//      case 'pid':
//               $sql="SELECT * FROM registration WHERE wdate='$date' AND pid='$bid' ";
//                   $run=mysqli_query($con,$sql);
//                 if(mysqli_num_rows($run)==0){
//                     echo "<h2 class='text-center'>Not found </h2>";
//                  }else{
//                   $sql="SELECT * FROM photoshop WHERE pid='$bid'";
//                   $run=mysqli_query($con,$sql);
//                   $row=mysqli_fetch_array($run);
//                   if ($row) {
//                     $name = $row['name'];
//                     $price = $row['price'];
//                     $type = "Photoshop";
//                     echo " <div class='row'>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'> $type</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$name</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$date</h3>
//                         </div>
//                         <div class='col-md-3'>
//                             <h3 class='text-center text-white'>$price</h3>
//                         </div>
//                     </div>";
//                 } else {
//                     echo "<h2 class='text-center'>No Photoshop record found for the given pid.</h2>";
//                 }
//                  }
//        break;
//      case 'tid':
//             $sql="SELECT * FROM registration WHERE wdate='$date' AND tid='$bid' ";
//                   $run=mysqli_query($con,$sql);
//                 if(mysqli_num_rows($run)==0){
//                     echo "<h2 class='text-center'>Not found </h2>";
//                  }else{
//                   $sql="SELECT * FROM theme WHERE tid='$bid'";
//                   $run=mysqli_query($con,$sql);
//                   $row=mysqli_fetch_array($run);
//                     $name=$row['name'];
//                     $price=$row['price'];
//                     $type="Theme";
//                      echo " <div class='row'>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'> $type</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$name</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$date</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$price</h3>
//           </div>
//         </div>";
//                  }
//        break;
//      case 'mid':
//                $sql="SELECT * FROM registration WHERE wdate='$date' AND mid='$bid' ";
//                   $run=mysqli_query($con,$sql);
//                 if(mysqli_num_rows($run)==0){
//                     echo "<h2 class='text-center'>Not found </h2>";
//                  }else{
//                   $sql="SELECT * FROM music WHERE mid='$bid'";
//                   $run=mysqli_query($con,$sql);
//                   $row=mysqli_fetch_array($run);
//                     $name=$row['name'];
//                     $price=$row['price'];
//                     $type="Music";
//                      echo " <div class='row'>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'> $type</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$name</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$date</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$price</h3>
//           </div>
//         </div>";
//                  }
//        break; 
//      case 'vid':
//                $sql="SELECT * FROM registration WHERE wdate='$date' AND vid='$bid' ";
//                   $run=mysqli_query($con,$sql);
//                 if(mysqli_num_rows($run)==0){
//                     echo "<h2 class='text-center'>Not found </h2>";
//                  }else{
//                   $sql="SELECT * FROM venue WHERE vid='$bid'";
//                   $run=mysqli_query($con,$sql);
//                   $row=mysqli_fetch_array($run);
//                     $name=$row['name'];
//                     $price=$row['price'];
//                     $type="Venue";
//                      echo " <div class='row'>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'> $type</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$name</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$date</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$price</h3>
//           </div>
//         </div>";
//                  }
//        break; 
//      case 'did':
//         $sql="SELECT * FROM registration WHERE wdate='$date' AND did='$bid' ";
//                   $run=mysqli_query($con,$sql);
//                 if(mysqli_num_rows($run)==0){
//                     echo "<h2 class='text-center'>Not found </h2>";
//                  }else{
//                   $sql="SELECT * FROM decoration WHERE did='$bid'";
//                   $run=mysqli_query($con,$sql);
//                   $row=mysqli_fetch_array($run);
//                     $name=$row['name'];
//                     $price=$row['price'];
//                     $type="Decoration";
//                      echo " <div class='row'>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'> $type</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$name</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$date</h3>
//           </div>
//           <div class='col-md-3'>
//             <h3 class='text-center text-white'>$price</h3>
//           </div>
//         </div>";
//                  }
//        break; 

     
    
//    }
//    }   

?>