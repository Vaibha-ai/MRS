<!DOCTYPE html>
<html>
<head>
  <title>Add Schedule</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script.js"></script>
  <style>
    body {
      background-color: #fff;
      color: #000;
      font-family: Arial, sans-serif;
      background-image: url('hospital.jpeg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
   
    .container {
      max-width: 600px;
      margin: 80px auto 0; /* Center the container and add top margin */
      padding: 20px;
      background-color: #fff;
      opacity: 0.9;
    }
   
    .form-group {
      margin-bottom: 20px;
    }
   
    .form-label {
      font-weight: bold;
    }
   
    .form-control {
      width: 100%;
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
   
    .submit-btn {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 4px;
      border: none;
      cursor: pointer;
    }
   
    .submit-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Add Schedule</h1>

    <form action="insert_schedule.php" method="POST">
      <div class="form-group">
        <label for="doctor_name" class="form-label">Doctor Name:</label>
        <input type="text" name="doctor_name" id="doctor_name" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="department" class="form-label">Department:</label>
        <input type="text" name="department" id="department" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="available_days" class="form-label">Available Days:</label>
        <input type="text" name="available_days" id="available_days" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="available_time" class="form-label">Available Time:</label>
        <input type="text" name="available_time" id="available_time" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="status" class="form-label">Status:</label>
        <input type="text" name="status" id="status" class="form-control" required>
      </div>
    </form>
      <button type="submit" class="submit-btn" onclick="addSchedule();">Add Schedule</button>
  </div>
</body>
</html>

