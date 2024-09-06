<?php
function OpenCon()
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
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>