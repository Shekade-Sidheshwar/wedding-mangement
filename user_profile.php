<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Party</title>
      <!-- Favicons -->
  <link href="img/wed3.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
</head>
<body>
    
</body>
</html>
<?php
include('action.php'); // Include your database connection file


// Check if user is logged in
if (!isset($_SESSION['uname'])) {
    die("User not logged in");
}

// Fetch user information

// $urname = $_SESSION['urname'];
// $se ="SELECT reg_id FROM registration  WHERE name='$urname' ;";
// $result = mysqli_query($con, $se);
// // Fetch and print the user_id
// if ($row = mysqli_fetch_assoc($result)) {
//      $regid=$row['reg_id'];
// }

$uname = $_SESSION['uname'];
$sql = "SELECT * FROM u_info WHERE uname='$uname'";
$run = mysqli_query($con, $sql);

if (mysqli_num_rows($run) == 0) {
    die("No user information found");
}

$row = mysqli_fetch_array($run);
$name = $row['name'];
$uname = $row['uname'];
$email = $row['email'];
$pno = $row['pno'];
$adds = $row['adds'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update user information
    $new_name = $_POST['name'];
    $new_uname = $_POST['uname'];
    $new_email = $_POST['email'];
    $new_pno = $_POST['pno'];
    $new_adds = $_POST['adds'];

    $sql = "UPDATE u_info SET name='$new_name', uname='$new_uname', email='$new_email', pno='$new_pno', adds='$new_adds' WHERE uname='$uname'";
    // $sql1= "UPDATE registration SET name='$new_name' WHERE reg_id='$regid'";   && mysqli_query($con, $sql1)
    
    if (mysqli_query($con,$sql)) {
        // Redirect with success message
        header("Location: ".$_SERVER['PHP_SELF']."?success=1");
        exit();
    } else {
        $message = "Error updating record: " . mysqli_error($con);
    }

   
}

// Check if the query parameter 'success' is set
$showAlert = isset($_GET['success']) && $_GET['success'] == 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Update User Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        // JavaScript function to display an alert if the 'success' query parameter is set
        window.onload = function() {
            var showAlert = <?php echo json_encode($showAlert); ?>;
            if (showAlert) {
                alert("Are You Sure To? Update Your Profile!");
                // Redirect to the profile page after the alert
                
                setTimeout(function() {
                    window.location.href = "profile.php";
                }, 1000); // Redirect after 1 second to allow alert to be visible
            }
        }
    </script>

</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-info">
                <h3 class="text-center userinfo">User Information</h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="uname">User Name</label>
                        <input type="text" id="uname" name="uname" class="form-control" value="<?= htmlspecialchars($uname) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pno">Phone Number</label>
                        <input type="text" id="pno" name="pno" class="form-control" value="<?= htmlspecialchars($pno) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="adds">Address</label>
                        <textarea id="adds" name="adds" class="form-control" rows="3" required><?= htmlspecialchars($adds) ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update profile</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
