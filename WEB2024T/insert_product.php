<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO product (pname, pgrade, price_per_unit, mfd_date, exp_date) VALUES (?, ?, ?, ?,?)");
     $stmt->bind_param("ssssi", $pname, $pgrade, $price_per_unit, $mfg_date, $exp_date);
    // Set parameters and execute
    $pname = $_POST['pname'];
        $pgrade = $_POST['pgrade'];
        $price_per_unit = $_POST['price_per_unit'];
        $mfg_date = $_POST['mfg_date'];
        $exp_date = $_POST['exp_date'];
   
    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>
