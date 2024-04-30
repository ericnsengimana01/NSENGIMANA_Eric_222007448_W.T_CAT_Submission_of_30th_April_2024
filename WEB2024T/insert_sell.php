<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO sell ( sdate, vid, orid, product_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $sdate, $vid, $orid, $product_name);
    
    // Set parameters and execute
    $sdate = $_POST['sdate'];
    $vid = $_POST['vid'];
    $orid = $_POST['orid'];
    $product_name = $_POST['product_name'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$connection->close();
?>
