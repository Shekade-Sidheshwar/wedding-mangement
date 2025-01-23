<?php
   include('../action.php');
?>

   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Sign Up Form</title>

   
       <!-- Font Icon -->
       <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
     
       <!-- Main css -->
       <link rel="stylesheet" href="css/style.css">
   
       <style>
           @keyframes float {
               0% {
                   transform: translateY(0);
                   opacity: 2;
               }
               100% {
                   transform: translateY(-100vh);
                   opacity: 0;
               }
           }
   
           .heart,
           .emoji1 {
               position: fixed;
               bottom: -50px;
               font-size: 30px;
               animation: float 5s infinite;
           }
   
           .heart {
               color: darkred;
           }
   
           .emoji1 {
               color: blue;
           } 
           #otp-form {
               display: none;
           }
       </style>
     
   </head>
   <body>
   
   <div class="main">
       <section class="signup">
           <div class="container">
               <div class="signup-content">
                   <form method="POST" id="signup-form" class="signup-form">
                       <h2 class="form-title">Create account</h2>
                       <?php
                       if (isset($_SESSION['error'])) {
                           echo "<h3 style='color:red'>" . $_SESSION['error'] . "</h3>";
                           unset($_SESSION['error']);
                       }
                       ?>
                       <div class="form-group">
                           <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required />
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-input" name="uname" id="uname" placeholder="Username" required/>
                       </div>
                       <div class="form-group">
                           <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required/>
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-input" name="pno" id="pno" placeholder="Phone No." required/>
                       </div>
                       <div class="form-group">
                           <input type="text" class="form-input" name="add" id="add" placeholder="Address" required/>
                       </div>
                       <div class="form-group">
                           <input type="password" class="form-input" name="psw" id="password" placeholder="Password" required/>
                           <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                       </div>
                       <div class="form-group">
                           <input type="password" class="form-input" name="repsw" id="re_password" placeholder="Repeat your password" required/>
                       </div>
                       <div class="form-group">
                           <input type="submit" name="signup" id="submit" class="form-submit" value="Sign up"/>
                       </div>
                       <p class="loginhere">
                           Have already an account? <a href="login.php" class="loginhere-link">Login here</a>
                       </p>
                   </form>
   
                   <form method="POST" id="otp-form" class="otp-form" style="display:none;">
                       <h2 class="form-title">Verify OTP</h2>
                       <div class="form-group">
                           <input type="text" class="form-input" name="otp" id="otp" placeholder="Enter OTP" required/>
                       </div>
                       <div class="form-group">
                           <input type="submit" name="verify" id="verify" class="form-submit" value="Verify OTP"/>
                       </div>
                   </form>
               </div>
           </div>
       </section>
   </div>
   </body>
   </html>
                  
<?php
 

//  $check=mail('sidheshwarshekade20@gmail.com','Wedding Email','Hi Amol, Xampp smtp mail setup successfully run ','From:sidheshwarshekade@gmail.com');

//  if($check){
//     echo 'Email sent successfull';
//     echo'sent to amol';
//  }
//  else{
//        echo 'Email not sent successfull';
//  }
      

// if (isset($_POST['signup'])) {
//     $name = trim($_POST['name']);
//     $uname = trim($_POST['uname']);
//     $email = $_POST['email'];
//     $pno = $_POST['pno'];
//     $add = $_POST['add'];
//     $psw = $_POST['psw'];
//     $repsw = $_POST['repsw'];

//     // Validate passwords
//     if ($psw !== $repsw) {
//         echo "<script>alert('Passwords do not match!'); window.location.href = 'signup.php';</script>";
//         exit();
//     }

//     // Check if username already exists
//     $sql = "SELECT * FROM u_info WHERE uname='$uname'";
//     $run = mysqli_query($con, $sql);
//     if (mysqli_num_rows($run) > 0) {
//         echo "<script>alert('Username already exists. Please choose a different username.'); window.location.href = 'signup.php';</script>";
//         exit();
//     }

//     // Generate OTP
//     $otp = rand(100000, 999999);

//     // Save OTP and email in session
//     $_SESSION['otp'] = $otp;
//     $_SESSION['email'] = $email;

//     // Send OTP via email
//     $subject = "Your OTP Code";
//     $message = "Your OTP code is: $otp";
//     $headers = "From: sidheshwarshekade@gmail.com";

//     if (mail($email, $subject, $message, $headers)) {
//         echo '<script>
//                 alert("OTP Sent Successfully. Please check your inbox.");
//                 document.getElementById("signup-form").style.display = "none";
//                 document.getElementById("otp-form").style.display = "block";
//               </script>';
//     } else {
//         echo '<script>alert("OTP Sending Failed. Please try again."); window.location.href = "signup.php";</script>';
//     }
// }

// if (isset($_POST['verify'])) {
//     $entered_otp = trim($_POST['otp']);
//     $session_otp = trim($_SESSION['otp']);
//     $email = $_SESSION['email'];

//     // Debugging lines
//     echo "<script>console.log('Entered OTP: " . $entered_otp . "');</script>";
//     echo "<script>console.log('Session OTP: " . $session_otp . "');</script>";

//     // Verify OTP
//     if ($entered_otp == $session_otp) {
//         // Insert user into the database
//         $sql = "INSERT INTO u_info (name, uname, email, pno, adds, psw) VALUES ('$name', '$uname', '$email', '$pno', '$add', '$psw')";
//         $run = mysqli_query($con, $sql);
//         if ($run) {
//             $_SESSION['uid'] = mysqli_insert_id($con);
//             $_SESSION['uname'] = $uname;
//             $_SESSION['urname'] = $name;
//             echo '<script>alert("User Registered Successfully."); window.location.href = "login.php";</script>';
//         } else {
//             echo '<script>alert("Registration Failed: ' . mysqli_error($con) . '"); window.location.href = "signup.php";</script>';
//         }
//     } else {
//         echo '<script>alert("Invalid OTP. Please try again."); window.location.href = "signup.php";</script>';
//     }
// }
?>

                    
  

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
    <script>
        function createHeart() {
            // Create heart element
            const heart = document.createElement('div');
            heart.classList.add('heart');
            heart.innerText = '❤️';

            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.animationDuration = Math.random() * 2 + 3 + 's';

            document.body.appendChild(heart);

            // Create emoji1 element
            const emoji1 = document.createElement('div');
            emoji1.classList.add('emoji1');
            emoji1.innerText = '❤️';

            emoji1.style.left = Math.random() * 100 + 'vw';
            emoji1.style.animationDuration = Math.random() * 2 + 3 + 's';

            document.body.appendChild(emoji1);

            
            // Remove elements after animation
            setTimeout(() => {
                heart.remove();
                emoji1.remove();
            },6000);
        }

        setInterval(createHeart, 300);
    </script>

</body>
</html>