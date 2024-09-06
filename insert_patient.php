<?php

// Retrieve form data from AJAX request
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
$address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

// Database connection configuration
$servername = "localhost";
$username = "root";
$password = ""; // Use your MySQL password if applicable
$dbname = "testing";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the table
$sql = "INSERT INTO patients (Name, Age, Address, Phone, Email) VALUES ('$name', $age, '$address', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
