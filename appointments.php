<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="gantt.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   
    
</head>
<body>
<div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="testing2.php">Dashboard</a>
            <a href="#">Appointments</a>
            <a href="schedule.php">Doctors</a>
            <a href="patient_lists.php">Patients</a>
            <a href="reservation2.php">Reservations</a>
            <a href="MRS%20analysis.html">Analytics</a>
        </div>
        
<div class="container">
                <div class="topbluemargin"></div>
                <span onclick="openNav()">
                <div class="image1"><img id="menuimg" src="blue_menu_bar.png" height="50" width="40" ></div>
</div>
<div class="patient_details"><p>
    <?php
    $id = $_GET['colid'];
            include 'db4_connection.php';
            $connection = OpenCon4();    
            $sql = "SELECT * FROM testing1 WHERE id = $id";
            $result = $connection->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="patient-box">';
    echo '<h2 class="detail-heading">Patient Details:</h2>';
    echo '<div class="detail"><span class="label">Id:</span> ' . $row["id"] . '</div>';
    echo '<div class="detail"><span class="label">Name:</span> ' . $row["name"] . '</div>';
    echo '<div class="detail"><span class="label">Patient Room:</span> ' . $row["patient_room"] . '</div>';
    echo '<div class="detail"><span class="label">Priority:</span> ' . $row["priority"] . '</div>';
    echo '<div class="detail"><span class="label">Department:</span> '. $row["department"] . '</div>';
    echo '<div class="detail"><span class="label">Operation:</span> '. $row["operation_needed"] . '</div>';
    echo '</div>';
}
    CloseCon4($connection);
            ?>
</p>
</div>


<?php
    $id1 = $_GET['colid'];
echo '<div class="container2" id="blur"><div class="grid-container">
    <div class="grid-item"><button type="button" class="op op1" id="op1" onclick="showOp(\'OP1\', ' . $id1 . ');toggle();">OP1</button></div>
    <div class="grid-item"><button type="button" class="op op2" id="op2" onclick="showOp(\'OP2\', ' . $id1 . ');toggle();">OP2</button></div>
    <div class="grid-item"><button type="button" class="op op3" id="op3" onclick="showOp(\'OP3\', ' . $id1 . ');toggle();">OP3</button></div> 
    <div class="grid-item"><button type="button" class="op op4" id="op4" onclick="showOp(\'OP4\', ' . $id1 . ');toggle();">OP4</button></div>
    <div class="grid-item"><button type="button" class="op op5" id="op5" onclick="showOp(\'OP5\', ' . $id1 . ');toggle();">OP5</button></div>
    <div class="grid-item"><button type="button" class="op op6" id="op6" onclick="showOp(\'OP6\', ' . $id1 . ');toggle();">OP6</button></div>  
</div></div>';
?>
    
  <div class="container3" style="position:relative;right:172px;top:-535px;float:right;">
    <h2>Select a Date and Time</h2>
    <form method="POST" action="">
      <label for="datetime"></label>
      <input type="text" id="datetime" name="datetime" readonly="readonly">
      
      <br><br>
      
      <input type="submit" name="submit" value="Submit" id="submitButton">
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr('#datetime', {
      enableTime: true,
      dateFormat: 'Y-m-d H:i',
      time_24hr: true
    });

    window.addEventListener('DOMContentLoaded', function() {
      flatpickr('#datetime', {
        enableTime: true,
        dateFormat: 'Y-m-d H:i',
        time_24hr: true
      }).open();
    });
  </script>
    
<?php
include 'db1_connection.php';
if(isset($_POST['submit']) && !empty($_POST['datetime'])){
    $connection = OpenCon();  
    if($connection){
        $datetime = $connection->real_escape_string($_POST['datetime']); 
        $id = $_GET['colid'];
        $sql1 = "UPDATE testing1 SET theater = '$datetime' WHERE id = '$id';";
        $result1 = $connection->query($sql1);
        $sql2 = "INSERT INTO reservations (patient_id, time_date) VALUES ('$id', '$datetime');";
        $result2 = $connection->query($sql2);
        if(!$result1 || !$result2)
            echo "Error: ".$connection->error;  
        CloseCon($connection);  
    }
    else
    {
        echo "<script>alert('Error: Unable to establish connection');</script>";
    }
            
}
    ?>

<div id="chart"></div>
<script src="gantt.js"></script>
<script src="initialize-gantt.js"></script>
    
    <div id="popup">

    
    <div class="form-outline" style="position:relative;top:-400px;display:block;">
        
    <form name="form1" id="formd1" action="doctor-select.php" method ="post" style="z-index:-1;">
        
    <input type="hidden" id="id" value="<?php $id1 = $_GET['colid'];echo $id1; ?>">
        
    <h2 style="position: absolute;left: 107px;top: 414px;display: table-row-group;">Surgeon</h2><select id="surgeon" name="surgeon" class="form-select" style="position:relative;right:-110px;top:481px;">
        <option value="">--Select--</option>
        <?php  
                include('df5_connection.php');
        $id1 = $_GET['colid'];
        $connection = OpenCon5();
        $department1 = '';
        $time = '';
        $query = "SELECT department,theater FROM testing1 WHERE id = '$id1'";
        $result = $connection->query($query);
        
    while($row = $result->fetch_assoc()){
        $department1 = $row['department'];
        $time = $row['theater'];
    }
        
        $sql = "SELECT * FROM employee WHERE id LIKE '11%' AND department = '$department1'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $doc_name = $row["name"];
            $doc_id = $row["id"];
            $check_query = "SELECT * FROM reservations WHERE time_date = '$time' AND surgeon_id = '$doc_id'";
            $check_result = mysqli_query($connection,$check_query);
            if(mysqli_num_rows($check_result)==0){
            echo "<option value='$doc_id'>$doc_name</option>";
            }
        }
        CloseCon5($connection);
?>

    </select>
             <h2 style="position:relative;left:384px;top:384px;display:table-row-group;">Surgical Assistant</h2>
            <select id="surg_assist" name="surg_assist" class="form-select" style="position:relative;right:-441px;top:407px;">
        <option value="">--Select--</option>
                <?php  
                                include('df5_connection.php');
        $connection = OpenCon5();
        $sql = "SELECT * FROM employee WHERE id LIKE '12%' AND department = '$department1'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $doc_name = $row["name"];
            $doc_id = $row["id"];
            $check_query = "SELECT * FROM reservations WHERE time_date = '$time' AND surg_assist_id = '$doc_id'";
            $check_result = mysqli_query($connection,$check_query);
            if(mysqli_num_rows($check_result)==0){
            echo "<option value='$doc_id'>$doc_name</option>";
            }
        }
        CloseCon5($connection);
                ?>
    </select>
            <h2 style="position:relative;left:92px;top:490px;display:table-row-group;">Anesthetist</h2>
        <select id = "anes" name="anes" class="form-select" style="position:relative;right:-107px;top:508px;">
        <option value="">--Select--</option>
        <?php  
        $connection = OpenCon5();
        $sql = "SELECT * FROM employee WHERE id LIKE '21%'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $doc_name = $row["name"];
            $doc_id = $row["id"];
            $check_query = "SELECT * FROM reservations WHERE time_date = '$time' AND anest_id = '$doc_id'";
            $check_result = mysqli_query($connection,$check_query);
            if(mysqli_num_rows($check_result)==0){
            echo "<option value='$doc_id'>$doc_name</option>";
            }
        }
        CloseCon5($connection);
        ?>
    </select>
        <h2 style="position:relative;left:418px;top:411px;display:table-row-group;">Technologist</h2>
        <select id="surg_tech" name="surg_tech" class="form-select" style="position:relative;right:-440px;top:432px;">
        <option value="">--Select--</option>
        <?php  
                            include('df5_connection.php');
        $connection = OpenCon5();
        $sql = "SELECT * FROM employee WHERE id LIKE '31%'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $doc_name = $row["name"];
            $doc_id = $row["id"];
            $check_query = "SELECT * FROM reservations WHERE time_date = '$time' AND tech_id = '$doc_id'";
            $check_result = mysqli_query($connection,$check_query);
            if(mysqli_num_rows($check_result)==0){
            echo "<option value='$doc_id'>$doc_name</option>";
            }
        }
        CloseCon5($connection);
        ?>
    </select>
        <h2 style="position:relative;left:69px;top:509px;display:table-row-group;">Circulating Nurse</h2>
        <select id="circ_nurse" name="circ_nurse" class="form-select" style="position:relative;right:-106px;top:526px;">
        <option value="">--Select--</option>
        <?php  
                            include('df5_connection.php');
        $connection = OpenCon5();
        $sql = "SELECT * FROM employee WHERE id LIKE '41%'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $doc_name = $row["name"];
            $doc_id = $row["id"];
            $check_query = "SELECT * FROM reservations WHERE time_date = '$time' AND circ_id = '$doc_id'";
            $check_result = mysqli_query($connection,$check_query);
            if(mysqli_num_rows($check_result)==0){
            echo "<option value='$doc_id'>$doc_name</option>";
            }
        }
        CloseCon5($connection);
        ?>
    </select>
        <button type="button" class="op" onclick="toggle();updateDatabase();" style="position:relative;top:501px;right: -337px;z-index:20;">Click</button>
        </form>
    </div>
</div>
    
</body>
</html>