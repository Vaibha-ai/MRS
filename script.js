/*eslint-env es6*/
/*const document: Document = document as Document;*/
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function showOp(column1Value,column2Value) {
        // Print the row details to the console
        //alert("Column 1: " + column1Value + "Id: " + column2Value);
        //alert("Id: " + column2Value);
        
       insertOpData(column1Value,column2Value);
      function insertOpData(column1Value,column2Value) {
        var xhr = new XMLHttpRequest();
        var url = "insertOp.php"; // Replace with the actual PHP script that performs the insert operation
        var params = "column1=" + encodeURIComponent(column1Value) + "&column2=" + encodeURIComponent(column2Value);

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the PHP script if needed
                console.log(xhr.responseText);
            }
        };

        xhr.send(params);
    }
    }

function toggle(){
    var blur = document.getElementById('blur');
    blur.classList.toggle('active')
    var popup = document.getElementById('popup');
    popup.classList.toggle('active')
    
}


function updateDatabase() {
    var id1 = document.getElementById("id").value;
    var surgeon = document.getElementById("surgeon").value;
    var surgAssist = document.getElementById("surg_assist").value;
    var anesthetist = document.getElementById("anes").value;
    var technologist = document.getElementById("surg_tech").value;
    var circNurse = document.getElementById("circ_nurse").value;
    // Send the data using AJAX
    //alert(id1);
    $.ajax({
        type: "POST",
        url: "doctor-select.php",
        data: {
            id: id1,
            surgeon: surgeon,
            surg_assist: surgAssist,
            anes: anesthetist,
            surg_tech: technologist,
            circ_nurse: circNurse
        }
    });
}
function updatePatient() {
  var name = document.getElementById("name").value;
  var age = document.getElementById("age").value;
  var address = document.getElementById("address").value;
  var phone = document.getElementById("phone").value;
  var email = document.getElementById("email").value;

  $.ajax({
    type: "POST",
    url: "insert_patient.php",
    data: {
      name: name,
      age: age,
      address: address,
      phone: phone,
      email: email,
    },
    success: function (response) {
      // Handle the response from the server
      alert('Record added Successfully!'); // Show an alert with the response message
    },
    error: function (xhr, status, error) {
      // Handle errors, if any
      console.error(error);
    },
  });
}

function addSchedule() {
  var doctor_name = document.getElementById("doctor_name").value;
  var department = document.getElementById("department").value;
  var available_days = document.getElementById("available_days").value;
  var available_time = document.getElementById("available_time").value;
  var status = document.getElementById("status").value;

  $.ajax({
    type: "POST",
    url: "insert_schedule.php",
    data: {
      doctor_name: doctor_name,
      department: department,
      available_days: available_days,
      available_time: available_time,
      status: status
    },
    success: function (response) {
      // Handle the response from the server
      alert('Record added Successfully!'); // Show an alert with the response message
    },
    error: function (xhr, status, error) {
      // Handle errors, if any
      console.error(error);
    },
  });
}
