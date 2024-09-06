<!DOCTYPE html>
<html>
<head>
  <title>Patient List</title>
      <link rel="stylesheet" type="text/css" href="style2.css">
      <script src="script.js"></script>
  <style>
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

    tr:nth-child(even) {
      background-color: #f9f9f9; /* Alternate row background color */
    }

    tr:hover {
      background-color: #ddd; /* Hover row background color */
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
</head>
<body>
      <div class="add-schedule-btn">
    <a href="add_patient.php" class="oval-button">Add Patient</a>
  </div>
      <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="testing2.php">Dashboard</a>
    <a href="#">Appointments</a>
    <a href="schedule.php">Doctors</a>
    <a href="#">Patients</a>
    <a href="reservations.php">Reservations</a>
    <a href="MRS%20analysis.html">Analytics</a>
  </div>
    
      <div class="container">
    <div class="topbluemargin"></div>
    <span onclick="openNav()">
      <div class="image1"><img id="menuimg" src="blue_menu_bar.png" height="50" width="40"></div>
    </span>
  </div>
    
  <h1>Patient List</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Age</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Email</th>
    </tr>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "testing";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT ID, Name, Age, Address, Phone, Email FROM patients";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["ID"] . "</td>";
          echo "<td>" . $row["Name"] . "</td>";
          echo "<td>" . $row["Age"] . "</td>";
          echo "<td>" . $row["Address"] . "</td>";
          echo "<td>" . $row["Phone"] . "</td>";
          echo "<td>" . $row["Email"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No patient information found.</td></tr>";
      }

      $conn->close();
    ?>
  </table>
</body>
</html>
