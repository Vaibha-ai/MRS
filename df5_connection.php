<?php
if (!function_exists('OpenCon5')) {
function OpenCon5()
 {
$servername="localhost";
            $username="root";
            $password="";
            $database="testing";
            
            $connection = new mysqli($servername, $username, $password, $database);
            
            if ($connection->connect_error) {
                die("Connection failed: ".$connection->connect_error);
            }
 
 return $connection;
 }
}
if (!function_exists('CloseCon5')) {
function CloseCon5($conn)
 {
    $conn -> close();
 }
}
?>