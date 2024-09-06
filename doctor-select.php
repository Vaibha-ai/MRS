<?php
include('df5_connection.php');

//$id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
$id = $_POST['id'];
//$id = '5532';
$surgeon = filter_input(INPUT_POST, "surgeon", FILTER_VALIDATE_INT);
$surg_assist = filter_input(INPUT_POST, "surg_assist", FILTER_VALIDATE_INT);
$anes = filter_input(INPUT_POST, "anes", FILTER_VALIDATE_INT);
$surg_tech = filter_input(INPUT_POST, "surg_tech", FILTER_VALIDATE_INT);
$circ_nurse = filter_input(INPUT_POST, "circ_nurse", FILTER_VALIDATE_INT);

$connection = OpenCon5();

// Update query for each field
$sqlSurgeon = "UPDATE employee SET reserve='$id' WHERE id='$surgeon'";
$sqlSurgAssist = "UPDATE employee SET reserve='$id' WHERE id='$surg_assist'";
$sqlAnes = "UPDATE employee SET reserve='$id' WHERE id='$anes'";
$sqlSurgTech = "UPDATE employee SET reserve='$id' WHERE id='$surg_tech'";
$sqlCircNurse = "UPDATE employee SET reserve='$id' WHERE id='$circ_nurse'";
$updateres = "UPDATE reservations SET surgeon_id = '$surgeon', surg_assist_id = '$surg_assist', anest_id = '$anes' , tech_id = '$surg_tech', circ_id = '$circ_nurse' WHERE patient_id = '$id'";
// Execute each query
if (mysqli_query($connection, $sqlSurgeon)) {
    // Surgeon update successful
} else {
    // Handle error if the update fails
    echo "Error updating Surgeon: " . mysqli_error($connection);
}

if (mysqli_query($connection, $sqlSurgAssist)) {
    // Surgical assistant update successful
} else {
    echo "Error updating Surgical Assistant: " . mysqli_error($connection);
}

if (mysqli_query($connection, $sqlAnes)) {
    // Anesthetist update successful
} else {
    echo "Error updating Anesthetist: " . mysqli_error($connection);
}

if (mysqli_query($connection, $sqlSurgTech)) {
    // Surgical technician update successful
} else {
    echo "Error updating Surgical Technician: " . mysqli_error($connection);
}

if (mysqli_query($connection, $sqlCircNurse)) {
    // Circulating nurse update successful
} else {
    echo "Error updating Circulating Nurse: " . mysqli_error($connection);
}

if (mysqli_query($connection, $updateres)) {
    // Circulating nurse update successful
} else {
    echo "Error updating Circulating Nurse: " . mysqli_error($connection);
}


// Close the database connection
CloseCon5($connection);
?>
