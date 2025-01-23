<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP Verification</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <section class="otp">
            <div class="container">
                <div class="otp-content">
                    <form method="POST" id="otp-form" class="otp-form">
                        <h2 class="form-title">OTP Verification</h2>
                             <!-- Display error message -->
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo "<h3 style='color:red'>" . $_SESSION['error'] . "</h3>";
                                unset($_SESSION['error']); // Clear the error message after displaying it
                            }
                            ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="otp" id="otp" placeholder="Enter OTP" required />
                        </div>
                        <div class="form-group">
                        <input type="submit" name="verify_otp" id="submit" class="form-submit" value="Verify OTP"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Already verified? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
