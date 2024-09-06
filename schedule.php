<!DOCTYPE html>
<html>
<head>
  <title>Doctor Schedule</title>
  <link rel="stylesheet" href="css/font-awesome.css">
  <style>
      html,body{
    margin: 0;
    padding: 0;
    background-color: #fafafa;
    font-family: 'Rubik', sans-serif;
}
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 4; /* Stay on top */
  top: 0;
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
  padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.topbluemargin{
    
            background-color:dodgerblue;
            width: 100%;
            block-size: 60px;
            positon:relative;
            z-index:-1;
}
.image1{
            position:absolute;
            z-index:2;
            top:5px;
            left:5px;
        }
    /* Table styles */
    table {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      cursor: pointer;
    }

    th {
      background-color: #f2f2f2;
    }

    /* Custom status styles */
    .status-available {
      color: green;
      font-weight: bold;
    }

    .status-unavailable {
      color: red;
      font-weight: bold;
    }

    .add-schedule-btn {
      position: fixed;
      top: 10px;
      right: 20px;
      z-index: 999;
    }

    .oval-button {
      display: inline-block;
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 50px;
      text-decoration: none;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .oval-button:hover {
      background-color: #0056b3;
    }

    .oval-button:active {
      background-color: #003c80;
    }
  </style>
  <script>
      
      function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

    function sortTable(columnIndex) {
      var table, rows, switching, i, x, y, shouldSwitch;
      table = document.getElementById("scheduleTable");
      switching = true;

      while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByTagName("TD")[columnIndex];
          y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

          // Check if the column is the Doctor Name column
          if (columnIndex === 0) {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              shouldSwitch = true;
              break;
            }
          } else {
            if (x.innerHTML > y.innerHTML) {
              shouldSwitch = true;
              break;
            }
          }
        }

        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }
  </script>
</head>
<body>
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="testing2.php">Dashboard</a>
            <a href="#">Appointments</a>
            <a href="#">Doctors</a>
            <a href="patient_lists.php">Patients</a>
            <a href="reservation2.php">Reservations</a>
            <a href="MRS%20analysis.html">Analytics</a>
        </div>
        
<div class="container">
                <div class="topbluemargin"></div>
                <span onclick="openNav()">
                <div class="image1"><img id="menuimg" src="blue_menu_bar.png" height="50" width="40" ></div>
</div>
  <h1>Doctor Schedule</h1>

  <!-- Add Schedule button -->
  <div class="add-schedule-btn">
    <a href="add_schedule.php" class="oval-button">Add Schedule</a>
  </div>

  <!-- Place the table code here -->
  <table id="scheduleTable">
    <thead>
      <tr>
        <th onclick="sortTable(0)">Doctor Name</th>
        <th onclick="sortTable(1)">Department</th>
        <th onclick="sortTable(2)">Available Days</th>
        <th onclick="sortTable(3)">Available Time</th>
        <th onclick="sortTable(4)">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = ""; // Use your MySQL password if applicable
$dbname = "testing";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Fetch data from the database
  $stmt = $conn->query("SELECT * FROM doctor_schedule");
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Iterate over the data and generate table rows dynamically
  foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row['doctor_name'] . "</td>";
    echo "<td>" . $row['department'] . "</td>";
    echo "<td>" . $row['available_days'] . "</td>";
    echo "<td>" . $row['available_time'] . "</td>";
    echo "<td>";

    // Check the status and apply appropriate CSS class
    if ($row['status'] == "Available") {
      echo "<span class='status-available'>" . $row['status'] . "</span>";
    } else {
      echo "<span class='status-unavailable'>" . $row['status'] . "</span>";
    }

    echo "</td>";
    echo "</tr>";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>

