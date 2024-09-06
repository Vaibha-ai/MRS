<!DOCTYPE html>
<html>
<head>
  <title>Add Patient</title>
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
    <h1>Add Patient</h1>

    <form action="insert_patient.php" method="POST">
      <div class="form-group">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="age" class="form-label">Age:</label>
        <input type="number" name="age" id="age" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="address" class="form-label">Address:</label>
        <input type="text" name="address" id="address" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="phone" class="form-label">Phone:</label>
        <input type="tel" name="phone" id="phone" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>
    </form>
      <button type="submit" class="submit-btn" onclick="updatePatient();">Add Patient</button>
  </div>
</body>
</html>

