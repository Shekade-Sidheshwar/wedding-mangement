<?php
   include('../action.php');
   if (!isset($_SESSION['uid'])) {
       header('location:../index.php');
   }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wedding Registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<?php


$_SESSION['urname'];

?>

<body>
<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form">
                    <h2 class="form-title">Registration</h2>
                   
                    <div class="form-group">
                        <input type="text" class="form-input" name="name" id="name" 
                        placeholder="Your Name" 
                        value="<?php echo isset($_SESSION['urname']) ? $_SESSION['urname'] : ''; ?>" 
                        disabled />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="dname" id="dname" placeholder="Groom Name" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="dlname" id="dlname" placeholder="Bride Name" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="pno" id="pno" placeholder="Number of person" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="pHno" id="pHno" placeholder="Enter Phone Number" required/>
                    </div>
                    <div class="form-group">
                        <h3 class="form-input">Wedding Date: &nbsp   &nbsp<input type="date" name="date" id="date" required/></h3>  
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term">
                            <span><span></span></span>I agree to all statements in  
                            <a href="#" class="term-service">Terms of service</a>
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>


    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
            document.getElementById('signup-form').addEventListener('submit', function() {
                document.getElementById('name').disabled = false;
            });
</script>
</body>
</html>