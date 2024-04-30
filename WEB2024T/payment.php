<?php 
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";

// Insert operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    // Sanitize input data
     $payid = $_POST['payid'];
    $paydate = $_POST['paydate'];
    $pamount = $_POST['pamount'];
    $pmethod = $_POST['pmethod'];
    $orid = $_POST['orid'];
    $paystatus = $_POST['paystatus'];
    $cid = $_POST['cid'];
    $phone = $_POST['phone'];
    
    // Prepare and bind parameters for insertion
    $sql = "INSERT INTO payment (paydate, pamount,pmethod, orid, pay_status, cid, phone) VALUES (?, ?,?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssi", $paydate, $pamount,$pmethod, $orid, $paystatus, $cid, $phone);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

// Update operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Sanitize input data
    $newpayid = $_POST['payid'];
    $newpaydate = $_POST['newpaydate'];
    $newpamount = $_POST['newpamount'];
    $newpmethod = $_POST['newpmethod'];
    $neworid = $_POST['neworid'];
    $newpay_status = $_POST['newpaystatus'];
    $newcid = $_POST['newcid'];
    $newphone = $_POST['newphone'];

    // Prepare and bind parameters for update
    $sql = "UPDATE payment SET paydate=?, pamount=?, pmethod=?, orid=?, pay_status=?, cid=?, phone=? WHERE payid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssssssi", $newpaydate, $newpamount, $newpmethod, $neworid, $newpay_status, $newcid, $newphone, $newpayid);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

// Delete operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Sanitize input data
    $payid = $_POST['payid'];

    // Prepare and bind parameter for deletion
    $sql = "DELETE FROM payment WHERE payid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $payid);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

// Read operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Sanitize input data
    $payid = $_POST['payid'];
    
    // Prepare and bind parameter for selection
    $sql = "SELECT * FROM payment WHERE payid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $payid);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display result
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "payid: " . $row["payid"] . "<br>";
        echo "paydate: " . $row["paydate"] . "<br>";
        echo "pamount: " . $row["pamount"] . "<br>";
        echo "pmethod: " . $row["pmethod"] . "<br>";
        echo "orid: " . $row["orid"] . "<br>";
        echo "pay_status: " . $row["pay_status"] . "<br>";
        echo "cid: " . $row["cid"] . "<br>";
        echo "phone: " . $row["phone"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}

// View operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['view'])) {
    // Prepare SQL query to retrieve all payments
    $sql = "SELECT * FROM payment";
    $result = $connection->query($sql);

    // Display result
    if ($result->num_rows > 0) {
        echo "<h2>Payment Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>payid</th><th>paydate</th><th>pamount</th><th>pmethod</th><th>orid</th><th>pay_status</th><th>cid</th><th>phone</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["payid"] . "</td>";
            echo "<td>" . $row["paydate"] . "</td>";
            echo "<td>" . $row["pamount"] . "</td>";
            echo "<td>" . $row["pmethod"] . "</td>";
            echo "<td>" . $row["orid"] . "</td>";
            echo "<td>" . $row["pay_status"] . "</td>";
            echo "<td>" . $row["cid"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }
}

// Close connection
$connection->close();
?>
