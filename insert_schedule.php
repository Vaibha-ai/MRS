<?php
// Retrieve form data from schedule.html
$doctorName = filter_input(INPUT_POST, "doctor_name", FILTER_SANITIZE_STRING);
$department = filter_input(INPUT_POST, "department", FILTER_SANITIZE_STRING);
$availableDays = filter_input(INPUT_POST, "available_days", FILTER_SANITIZE_STRING);
$availableTime = filter_input(INPUT_POST, "available_time", FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_STRING);

// Connect to the database
$servername = "localhost";
$username = "root";
$password = ""; // Leave empty if no password is set
$dbname = "testing";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the table
$sql = "INSERT INTO doctor_schedule (doctor_name, department, available_days, available_time, status)
        VALUES ('$doctorName', '$department', '$availableDays', '$availableTime', '$status')";

if ($conn->query($sql) === TRUE) {
    //echo "Data inserted successfully";
    //echo "<a href='testing2.php'></a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

