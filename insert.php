<?php

$servername="localhost";
            $username="root";
            $password="";
            $database="testing";
            
            $connection = new mysqli($servername, $username, $password, $database);
            
            if ($connection->connect_error) {
                die("Connection failed: ".$connection->connect_error);
            }
        $id = $_POST['column1'];
        $reserve1 = 'OR1';
        $sql = "UPDATE testing1 SET reserve = '$reserve1' WHERE id = '$id'";

if ($connection->query($sql) === TRUE) {
  echo '<script type="text/JavaScript"> 
     alert("GeeksForGeeks");
     </script>';
    
} 
else{
    echo '<script type="text/JavaScript"> 
     alert("nothing");
     </script>';
}
        $connection -> close();

?>