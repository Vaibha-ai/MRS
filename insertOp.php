<?php

$servername="localhost";
            $username="root";
            $password="";
            $database="testing";
            
            $connection = new mysqli($servername, $username, $password, $database);
            
            if ($connection->connect_error) {
                die("Connection failed: ".$connection->connect_error);
            }
        $reserve1 = $_POST['column1'];
        $id = $_POST['column2'];
        $sql = "UPDATE testing1 SET reserve = '$reserve1' WHERE id = '$id'";
        $result = $connection->query($sql);

if ($result=== TRUE) {
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