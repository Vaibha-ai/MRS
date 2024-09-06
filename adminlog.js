function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function showDetails(column1Value, column2Value) {
        // Print the row details to the console
        alert("Column 1: " + column1Value);
        alert("Column 2: " + column2Value);
    
        insertData(column1Value);
        sendinfo(column1Value, column2Value);
      function insertData(column1Value) {
        var xhr = new XMLHttpRequest();
        var url = "insert.php"; // Replace with the actual PHP script that performs the insert operation
        var params = "column1=" + encodeURIComponent(column1Value);

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
    function sendinfo(column1Value, column2Value){
        var encodedColid = encodeURIComponent(column1Value);
        var encodedColname = encodeURIComponent(column2Value);
    // Construct the URL with the query parameters
    var url = 'appointments.php?colid=' + encodedColid + '&colname=' + encodedColname;
    // Redirect to the details page
    window.location.href = url;
    }
    }



