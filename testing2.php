<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="adminlog.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Dashboard</a>
        <a href="#">Appointments</a>
        <a href="schedule.php">Doctors</a>
        <a href="patient_lists.php">Patients</a>
        <a href="reservation2.php">Reservations</a>
        <a href="MRS%20analysis.html">Analytics</a>
    </div>

    <div class="container">
        <div class="topbluemargin"></div>
        <span onclick="openNav()">
            <div class="image1"><img id="menuimg" src="blue_menu_bar.png" height="50" width="40"></div>
    </div>

    <div class="dropdown" style="float:right;margin-top:-51px; margin-right: 50px;">
        <button onclick="myFunction()" class="dropbtn">Admin <i class="fa fa-caret-down"></i></button>
        <div id="myDropdown" class="dropdown-content" style="float:right;">
            <a href="#">My Profile</a>
            <a href="#">Edit Profile</a>
            <a href="#">Settings</a>
            <a href="loginpage.php">Sign Out</a>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <div class="card">
                <div style="text-align:left;float:left;margin-left:10px;margin-top:10px;"><img id="row1" src="row1.PNG" height="75" width="75"></div>
                <p style="padding-top:20px; padding-right: 20px;">
                    <font size="+2">233</font>
                <p style="padding-top:0px; padding-right: 20px;">
                    <font size=4>Requests</font>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <div style="text-align:left; float:left;margin-left:10px;margin-top:10px;"><img id="row2" src="row2.PNG" height="75" width="75"></div>
                <p style="padding-top:20px; padding-right: 20px;">
                    <font size="+2">23</font>
                <p style="padding-top:0px; padding-right: 20px;">
                    <font size="4">Operators</font>
                </p>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <div style="text-align:left; float:left;margin-left:10px;margin-top:10px;"><img id="row3" src="row3.PNG" height="75" width="75"></div>
                <p style="padding-top:20px; padding-right: 20px;">
                    <font size="+2">50</font>
                <p style="padding-top:0px; padding-right: 20px;">
                    <font size="4">Doctors</font>
                </p>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <div style="text-align:left;float:left;margin-left:10px;margin-top:10px;"><img id="row4" src="row4.PNG" height="75" width="75"></div>
                <p style="padding-top:20px; padding-right: 20px;">
                    <font size="+2">13</font>
                <p style="padding-top:0px; padding-right: 20px;">
                    <font size="4">Technicians</font>
                </p>
            </div>
        </div>
    </div>
    <div class="table-wrapper" style="height:200px;overflow-y:scroll;display:inline-block;margin-top:40px;">
        <table id="userTable" class="table" style="width:1000px;margin-left:110px;background:white;z-index:4;">
            <thead>
                <tr>
                    <th colspan="7" style="text-align:left;">Upcoming Appointments</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Patient Room</th>
                    <th>Priority</th>
                    <th>Department</th>
                    <th>Operation Needed</th>
                    <th>Reserve</th>
                </tr>
            </thead>
            <tbody>
                <?php
            include 'db1_connection.php';
            $connection = OpenCon();    
            $sql = "SELECT id,name,patient_room,priority,reserve,operation_needed,department FROM testing1";
            $result = $connection->query($sql);
            
            while($row = $result->fetch_assoc()){
                $colid = $row["id"];
                $colname = $row["name"];
                $colptrm = $row["patient_room"];
                $colpri = $row["priority"];
                $coldep = $row["department"];
                $colopr = $row["operation_needed"];
                $colres = $row["reserve"];
                
                if($colres==NULL){
                echo "<tr>";
                echo "<td>$colid</td>";
                echo "<td>$colname</td>";
                echo "<td>$colptrm</td>";
                echo "<td>$colpri</td>";
                echo "<td>$coldep</td>";
                echo "<td>$colopr</td>";
                echo "<td>";
                echo "<button type='button' class='details-button' onclick='showDetails(\"$colid\", \"$colname\")'>Details</button>";
                echo "</td>";
                echo "</tr>";
                }
            }
            CloseCon($connection);
            ?>
            </tbody>
        </table>
    </div>

    <div class="table-wrapper othertable-wrapper" style="height:400px;overflow-y:scroll;display:inline-block;margin-top:35px;right:25px;">
        <table class="table2" style="width:300px;background:white;">
            <thead>
                <tr>
                    <th colspan="3" style="text-align:left;">Doctors</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
            include 'db2_connection.php';
            $connection = OpenCon2();    
            
            $sql = "SELECT * FROM doctors";
            $result = $connection->query($sql);
            
            while($row = $result->fetch_assoc()){
                $i_d = $row["Id"];
                $name = $row["Name"];
                $live_status = $row["Status"];
                echo "<tr>";
                echo "<td>$i_d</td>";
                echo "<td>$name</td>";
                echo "<td>";
                if($live_status =='Online')
                {
                    echo '<span class="greendot"></span>';
                }
                else if($live_status=='Working')
                {
                    echo '<span class="yeldot"></span>'; 
                }
                else{
                    echo '<span class="reddot"></span>';
                }
                echo "</td>";
                echo "</tr>";
            }
            CloseCon2($connection);
            ?>
            </tbody>
        </table>
    </div>

    <div class="table-wrapper" style="height:200px;overflow-y:scroll;display:inline-block;margin-top:75px;">
        <table id="userTable" class="table" style="width:1000px;margin-left:110px;background:white;z-index:4;">
            <thead>
                <tr>
                    <th colspan="7" style="text-align:left;">Placed Appointments</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Patient Room</th>
                    <th>Department</th>
                    <th>Operation Needed</th>
                    <th>Operation Theater</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
            include 'db3_connection.php';
            $connection = OpenCon3();    
            $sql = "SELECT id,name,patient_room,theater,reserve,operation_needed,department FROM testing1";
            $result = $connection->query($sql);
            
            while($row = $result->fetch_assoc()){
                $colid = $row["id"];
                $colname = $row["name"];
                $colptrm = $row["patient_room"];
                $coldep = $row["department"];
                $colopr = $row["operation_needed"];
                $colres = $row["reserve"];
                $colthr = $row["theater"];
                
                if($colres!=NULL){
                echo "<tr>";
                echo "<td>$colid</td>";
                echo "<td>$colname</td>";
                echo "<td>$colptrm</td>";
                echo "<td>$coldep</td>";
                echo "<td>$colopr</td>";
                echo "<td>$colres</td>";
                echo "<td>$colthr</td>";
                echo "</tr>";
                }
            }
            CloseCon3($connection);
            ?>
            </tbody>
        </table>
    </div>

</body>

</html>