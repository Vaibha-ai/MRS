<?php
include 'db1_connection.php';
if(isset($_POST['submit']) &&!empty($_POST['datetime'])){
    $connection = OpenCon();  
    if($connection){
        $datetime = $connection->real_escape_string($_POST['datetime']); 
        $id = $_GET['colid'];
        $sql = "UPDATE testing1 SET theater = '$datetime' WHERE id = '$id'";
        $result = $connection->query($sql);
        if(!$result)
            echo "Error: ".$connection->error;  
        CloseCon($connection);  
    }
    else
    {
        echo "Error: Unable to establish connection";
    }
            
}
else
{
    echo "<script>alert('Nope');</script>";
}
    ?>