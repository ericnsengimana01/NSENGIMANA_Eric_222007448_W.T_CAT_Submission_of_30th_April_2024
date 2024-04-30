<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO product_order(ordate, pid, pquantity,orprice,cid,order_status) VALUES (?, ?, ?, ?,?,?)");
    $stmt->bind_param("ssssss", $ordate, $pid, $pquantity,$orprice,$cid, $order_status);
    // Set parameters and execute
    $ordate = $_POST['ordate'];
    $pid = $_POST['pid'];
    $pquantity = $_POST['pquantity'];
    $orprice = $_POST['orprice'];
    $cid = $_POST['cid'];
     $order_status = $_POST['order_status'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>
