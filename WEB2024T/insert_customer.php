<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO customer (fname, lname,phone, cemail, district, sector, cell, village) VALUES (?, ?, ?, ?, ?,?,?,?)");
     $stmt->bind_param("ssssssss", $fname, $lname,$phone, $cemail, $district, $sector, $cell, $village);
    
    // Set parameters and execute
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $cemail = $_POST['cemail'];
    $district = $_POST['district'];
    $sector = $_POST['sector'];
    $cell = $_POST['cell'];
    $village = $_POST['village'];
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>
