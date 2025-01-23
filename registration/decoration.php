<?php
   include('../action.php');
   if (!isset($_SESSION['name'])) {
       header('location:../index.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Features Details</title>

    <!-- Font Icon -->
    <link href="/wedding/img/wed3.jpg" rel="icon">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Bootstrap files -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <style>
    .decodas{
        margin-left:850px; 
        font-weight: bold;
        font-size: large;
    }
    .navbar-brand{
        font-weight: bold;
        font-size:x-large;
    }
    .modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0, 0, 0); 
    background-color: rgba(0, 0, 0, 0.4); 
}

/* Modal Content/Box */
.modal-content {
    margin: 15% auto; /* 15% from the top and centered */
    border: 1px solid #00ffff;
    width: 50%; /* Could be more or less, depending on screen size */
    box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
    background-color: #ffffff;
    border-radius: 12px;
    padding: 30px;
}

/* The Close Button */
.close {
    color: black;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.venueh3{
    color: black;
     font-family: 'Roboto', sans-serif;
     text-transform: uppercase; 
    letter-spacing: 1px;
    text-align: center; 
     margin-bottom: 25px;
}
.venuedit{
    width: 100%;
     padding: 12px; 
     border-radius: 8px;
      background-color: #f5f5f5;
        color: #000000;
         font-size: 16px;
}
.h2{
           color: #fff; 
           font-family: 'Arial', sans-serif; 
           font-size: 2.5em; 
           font-weight: bold; 
           background: rgba(255,255,255,0.2); 
           backdrop-filter: blur(10px); 
           padding: 15px; 
           border-radius: 10px; 
           text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
}
      </style>
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
     <!-- Main css -->
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav" style="background-color:white;">
  <div class="container" style="margin-left:90px;">
    <a class="navbar-brand js-scroll " href="#page-top">Sidhesh Wedding Planner</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
      aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll decodas" href="/wedding/dasboard.php">Dashboard</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--/ Nav End /-->

    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Decoration Details</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="vname" id="name" placeholder="Decoration Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="price" id="email" placeholder="Price" required/>
                        </div>
                         <div class="form-group">
                         <input type="text" class="form-input" name="desc" id="date" placeholder="Description " required/>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="dect" id="submit" class="form-submit" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <div style="margin-top:50px">
    <h2 class="h2">Decoration Details</h2>

    <div class="container" style="margin-top: 7px; display: flex; justify-content: right;margin-left:64%;margin-bottom:-15px;">
    <form method="GET" action="" style="width: 50%; position: relative;">
        <input 
            type="text" 
            name="search" 
            placeholder="Search for venues..." 
            class="form-control" 
            style="width: 100%; border-radius:8px; padding: 10px 60px 10px 20px; font-size: 16px; border: 2px solid #3b5998;"
            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
        >
        <button 
            type="submit" 
            class="btn btn-primary" 
            style="position: absolute; top: 50%; right: 0px; transform: translateY(-50%); border-radius: 8px; padding: 10px 15px; font-size: 16px;">
            <i class="zmdi zmdi-search"></i>
        </button>
    </form>
</div>
    <?php
    // Check if a record needs to be deleted
    if (isset($_POST['delete_did'])) {
        $id_to_delete = $_POST['delete_did'];

        // Prepare the delete query
        $delete_sql = "DELETE FROM decoration WHERE did=?";

        // Execute the delete query using prepared statements
        if ($stmt = $con->prepare($delete_sql)) {   
            $stmt->bind_param("i", $id_to_delete);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error: " . $con->error;
        }
    }

    // Check if a record needs to be updated
    if (isset($_POST['update_did'])) {
        $did = $_POST['did'];
        $updated_name = $_POST['name'];
        $updated_price = $_POST['price'];
        $updated_descr = $_POST['descr'];
    
        // Prepare the update query
        $update_sql = "UPDATE decoration SET name=?, price=?, descr=? WHERE did=?";
        
        // Execute the update query using prepared statements
        if ($stmt = $con->prepare($update_sql)) {
            $stmt->bind_param("sdsi", $updated_name, $updated_price, $updated_descr, $did);
            $stmt->execute();
            $stmt->close();
            echo "<script>alert('Record updated successfully');</script>";
        } else {
            echo "Error: " . $con->error;
        }
    }
    
    // SQL query to fetch data from the catering table
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT did, name, price, descr FROM decoration";
    if (!empty($search)) {
        $sql .= " WHERE name LIKE ?";
    }
    
    $stmt = $con->prepare($sql);
    
    if (!empty($search)) {
        $search = $search . '%'; // Add wildcard for "starts with" matching
        $stmt->bind_param("s", $search);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
   // Check if there are results
if ($result->num_rows > 0) {
  echo '<table cellpadding="15" style="width:100%; font-size: 18px; background-color: #fff; border-collapse: collapse; font-family: Arial, sans-serif; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); border-radius: 12px; overflow: hidden; margin: 20px 0; border: 1px solid #ddd;">';
  echo '<thead>';
  echo '<tr style="background-color:#3b5998; color:white; text-transform: uppercase; font-weight: bold; text-align:center; animation: slideDown 0.5s ease;">';
  echo '<th style="padding: 15px;">Name</th>';
  echo '<th style="padding: 15px;">Price</th>';
  echo '<th style="padding: 15px;">Actions</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  while ($row = $result->fetch_assoc()) {
      $descr = $row["descr"];
      $short_descr = strlen($descr) > 100 ? substr($descr, 0, 100) . '...' : $descr;

      echo "<tr style='border-bottom: 1px solid #f1f1f1; transition: background-color 0.3s ease; cursor: pointer;' onmouseover=\"this.style.backgroundColor='#f9f9f9'\" onmouseout=\"this.style.backgroundColor='#fff'\">";
      echo "<td style='padding:15px; text-align:center;' title='" . htmlspecialchars($row["descr"]) . "'>" . htmlspecialchars($row["name"]) . "</td>";
      echo "<td style='padding:15px; text-align:center;'>" .'₹'. number_format($row["price"], 2) . "</td>";
      echo "<td style='padding:15px; text-align:center;'>";

      // Delete Button
      echo "<form method='POST' style='display:inline; margin-right: 10px;'>";
      echo "<input type='hidden' name='delete_did' value='" . $row['did'] . "'>";
      echo "<button type='submit' name='delete_decoration' class=' btn btn-outline-danger' style='padding: 8px 15px; border-radius: 5px; transition: background-color 0.3s; font-weight: bold;'>Remove</button>";
      echo "</form>";

      // Edit Button
      echo "<button class='btn btn-outline-primary editBtn ' data-did='" . $row['did'] . "' data-name='" .$row['name'] . "' data-price='" . $row['price'] . "' data-descr='" . addslashes($row['descr']) . "'
         style='padding: 8px 15px;margin-left:22px; border-radius: 5px; transition: background-color 0.3s; font-weight: bold;'>Edit</button>";

      echo "</td>";
      echo "</tr>";
  }

  echo '</tbody>';
  echo "</table>";
} else {
  echo "<div style='text-align:center; font-size: 18px; color: #888; padding: 20px; font-style: italic;'>No results found</div>";
}

echo "<style>
@keyframes slideDown {
  0% { opacity: 0; transform: translateY(-20px); }
  100% { opacity: 1; transform: translateY(0); }
}
</style>";
    ?>
    
    <!-- JavaScript to handle the edit form functionality -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the modal
        var modal = document.getElementById("editModal");
    
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var editButtons = document.querySelectorAll('.editBtn');
        editButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Retrieve data attributes from the clicked button
                var cid = this.getAttribute('data-did');
                var name = this.getAttribute('data-name');
                var price = this.getAttribute('data-price');
                var descr = this.getAttribute('data-descr');
    
                // Populate the modal form with the data
                document.getElementById('modal_edit_did').value = cid;
                document.getElementById('modal_edit_name').value = name;
                document.getElementById('modal_edit_price').value = price;
                document.getElementById('modal_edit_descr').value = descr;
    
                // Show the modal
                modal.style.display = "block";
            });
        });
    
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    </script>
    
    <!-- Edit Form Modal -->
    <div id="editModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3 class="venueh3">
          Edit Decoration
        </h3>
        <form method="POST" class="edit-venue-form">
          <input type="hidden" name="did" id="modal_edit_did">
    
          <div style="display: flex; justify-content: space-between; margin-bottom: 25px;">
            <div style="flex: 1; margin-right: 15px;">
              <label for="modal_edit_name" style="color: black; font-size: 14px;font-weight: bold;">Name:</label>
              <input type="text" name="name" id="modal_edit_name" required placeholder="Enter catering name" class="venuedit">
            </div>
    
            <div style="flex: 1; margin-left: 15px;">
              <label for="modal_edit_price" style="color: #black; font-size: 14px;font-weight: bold;">Price:</label>
              <input type="number" step="0.01" name="price" id="modal_edit_price" required placeholder="Enter price" class="venuedit">
            </div>
          </div>
    
          <div style="margin-bottom: 25px;">
            <label for="modal_edit_descr" style="color: #black; font-size: 14px;font-weight: bold;">Description:</label>
            <textarea name="descr" id="modal_edit_descr" required maxlength="500" placeholder="Enter a brief description" class="venuedit"></textarea>
          </div>
    
          <div style="text-align: center;">
            <button type="submit" name="update_did" class="btn btn-primary" style="padding: 12px 25px; border-radius: 8px; background-color: black; color: #ffffff; font-size: 16px; text-transform: uppercase; letter-spacing: 1px; border: none; transition: background-color 0.3s ease;">
              Update
            </button>
          </div>
        </form>
      </div>
    </div>



</body>
</html>