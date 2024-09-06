<?php
// Assuming you have a database connection established
// Retrieve the entered username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];
include 'db4_connection.php';
$connection = OpenCon4();    
// Perform the database query to check if the username and password match
$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
echo "<script>alert($password);</script>";
$result = mysqli_query($connection, $query);

// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
    // Authentication successful, redirect to the desired page
    header("Location: testing2.php");
    CloseCon4($connection);
    exit();
} else {
    // Authentication failed, redirect back to the login page with an error message
    header("Location: loginpage.php");
    CloseCon4($connection);
    exit();
}
?>
