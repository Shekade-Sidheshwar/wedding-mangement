<?php
include('action.php');


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $rating = intval($_POST['rating']);
    $comments = $con->real_escape_string($_POST['comments']);

    // Insert the feedback into the database
    $sql = "INSERT INTO feedback (name, email, rating, comments) VALUES ('$name', '$email', $rating, '$comments')";

    if ($con->query($sql) === TRUE) {
        // Redirect back to the form with a success message
        header("Location: profile.php?success=1");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

   
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $rating = intval($_POST['rating']);
    $comments = $con->real_escape_string($_POST['comments']);

    // Insert the feedback into the database
    $sql = "INSERT INTO feedback (name, email, rating, comments) VALUES ('$name', '$email', $rating, '$comments')";

    if ($con->query($sql) === TRUE) {
        // Redirect back to the form with a success message
        header("Location: index.php?success=1");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

   
}
?>
