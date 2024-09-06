<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <style>
.form-inline {
  display: flex;
  flex-flow: row wrap;
  align-items: center;
    justify-content: center;
    top:30px;
    position:relative;
}

/* Add some margins for each label */
.form-inline label {
  margin: 5px 10px 5px 0;
}

/* Style the input fields */
.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

/* Style the submit button */
.form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
}

.form-inline button:hover {
  background-color: royalblue;
}

/* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }

  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}

.table-container {
  width: 100%;
  margin: 20px 0;
}

.userTable {
  width: 1119px;
    margin-left:61px;
    position:relative;
      border-collapse: collapse;
    left:100px;
    top:52px;
}

.userTable th,
.userTable td {
  padding: 8px;
  text-align: center;
}

.userTable th {
  background-color: #6c7ae0;
  color: white;
}
      
      .userTable td{
          border:none;
      }

  </style>
  <script src="script.js"></script>
</head>

<body>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="testing2.php">Dashboard</a>
    <a href="#">Appointments</a>
    <a href="schedule.php">Doctors</a>
    <a href="patient_lists.php">Patients</a>
    <a href="reservations.php">Reservations</a>
    <a href="MRS%20analysis.html">Analytics</a>
  </div>

  <div class="container">
    <div class="topbluemargin"></div>
    <span onclick="openNav()">
      <div class="image1"><img id="menuimg" src="blue_menu_bar.png" height="50" width="40"></div>
    </span>
  </div>

  <form class="form-inline" action="" method="POST">
    <label for="dep" >Department:</label>
    <select id="dep" name="dep" style="  vertical-align: middle;margin: 5px 10px 5px 0;padding: 10px;background-color: #fff;border: 1px solid #ddd;">
      <option value="Abdominal">Abdominal</option>
      <option value="Trauma">Trauma</option>
      <option value="Pediatric">Pediatric</option>
      <option value="Vascular">Vascular</option>
      <option value="Thoracic">Thoracic</option>
      <option value="Plastic">Plastic</option>
      <option value="Cardiac">Cardiac</option>
    </select>
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" placeholder="YYYY-MM-DD">
    <button type="submit" name="submit" value="submit" id="submit">Submit</button>
  </form>
<div class="table-container">
  <table id="userTable" class="userTable">
    <thead> 
      <tr>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">ID</th>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">First Name</th>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">Operation</th>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">Operation Theater</th>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">Surgeon</th>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">Assist. Surgeon</th>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">Anesthetist</th>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">Technologist</th>
        <th style="text-align:center;background-color:#6c7ae0;color:white;">Circulating Nurse</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'db1_connection.php';
      if (isset($_POST['submit'])) {
        $connection = OpenCon();
        if ($connection) {
          $dep = $connection->real_escape_string($_POST['dep']);
          $datetime = $connection->real_escape_string($_POST['date']);
          $sql = "SELECT
  testing1.id,
  testing1.name,
  testing1.operation_needed,
  testing1.reserve,
  MAX(CASE WHEN employee.id LIKE '11%' THEN employee.name END) AS `Surgeon`,
  MAX(CASE WHEN employee.id LIKE '12%' THEN employee.name END) AS `Assistant Surgeon`,
  MAX(CASE WHEN employee.id LIKE '21%' THEN employee.name END) AS `Anesthetist`,
  MAX(CASE WHEN employee.id LIKE '31%' THEN employee.name END) AS `Technologist`,
  MAX(CASE WHEN employee.id LIKE '41%' THEN employee.name END) AS `Circulating Nurse`
FROM
  testing1
INNER JOIN
  employee ON testing1.id = employee.reserve
WHERE
testing1.theater LIKE '%$datetime%' AND testing1.department = '$dep' 
GROUP BY testing1.id, testing1.name, testing1.operation_needed, testing1.reserve;";
          $result = $connection->query($sql);
          while ($row = $result->fetch_assoc()) {
            $colid = $row["id"];
            $colname = $row["name"];
            $colopr = $row["operation_needed"];
            $colres = $row["reserve"];
            $colsur = $row["Surgeon"];
            $colassist = $row["Assistant Surgeon"];
            $colanes = $row["Anesthetist"];
            $coltech = $row["Technologist"];
            $colcir = $row["Circulating Nurse"];
            if ($colres != NULL) {
              echo "<tr>";
              echo "<td>$colid</td>";
              echo "<td>$colname</td>";
              echo "<td>$colopr</td>";
              echo "<td>$colres</td>";
              echo "<td>$colsur</td>";
              echo "<td>$colassist</td>";
              echo "<td>$colanes</td>";
              echo "<td>$coltech</td>";
              echo "<td>$colcir</td>";
              echo "</tr>";
            }
          }
          if (!$result)
            echo "Error: " . $connection->error;
          CloseCon($connection);
        } else {
          echo "<script>alert('Error: Unable to establish connection');</script>";
        }
      }
      ?>
    </tbody>
  </table>
    </div>
  <button type="button" style = "border:none;outline:none;background-color:#fafafa;position:fixed;top:93px;left:1064px;" onclick="PrintTable()"><img src = "printout.png" style="height: 39px;
    width: 39px;"></button>

  <script type="text/javascript">
function PrintTable() {
  var printWindow = window.open('', '', 'height=600,width=800');
  printWindow.document.write('<html><head><title>Table Contents</title>');
  printWindow.document.write('<style type="text/css">');
  printWindow.document.write('.userTable { width: 100%; border-collapse: collapse; }');
  printWindow.document.write('.userTable th, .userTable td { padding: 8px; text-align: center; border: none; }');
  printWindow.document.write('.userTable th { background-color: #6c7ae0; color: white; }');
  printWindow.document.write('</style>');
  printWindow.document.write('</head>');
  printWindow.document.write('<body>');
  printWindow.document.write(document.getElementById('userTable').outerHTML);
  printWindow.document.write('</body>');
  printWindow.document.write('</html>');
  printWindow.document.close();
  printWindow.print();
}

  </script>

</body>

</html>
