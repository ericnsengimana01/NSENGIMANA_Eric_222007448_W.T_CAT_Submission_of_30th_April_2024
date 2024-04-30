<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO payment (paydate, pamount, pmethod, orid, pay_status, cid, phone) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $paydate, $pamount, $pmethod, $orid, $paystatus, $cid, $phone);
    
    // Set parameters and execute
    $paydate = $_POST['paydate'];
    $pamount = $_POST['pamount'];
    $pmethod = $_POST['pmethod'];
    $orid = $_POST['orid'];
    $paystatus = $_POST['pay_status'];
    $cid = $_POST['cid'];
    $phone = $_POST['phone'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$connection->close();
?>
