<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";
// Check if the form is submitted for insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    // Prepare and bind the parameters for insertion
    $stmt = $connection->prepare("INSERT INTO product_order (ordate, pid, pquantity, orprice, cid, order_status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $ordate, $pid, $pquantity, $orprice, $cid, $order_status);
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

// Update operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Sanitize input data
    $neworid = $_POST['orid'];
    $newordate = $_POST['newordate'];
    $newpid = $_POST['newpid'];
    $newpquantity = $_POST['newpquantity'];
    $neworprice = $_POST['neworprice'];
    $newcid = $_POST['newcid'];
    $neworder_status = $_POST['neworder_status'];

    // Prepare and bind parameters for update
    $stmt = $connection->prepare("UPDATE product_order SET ordate=?, pid=?, pquantity=?, orprice=?, cid=?, order_status=? WHERE orid=?");
    $stmt->bind_param("ssssssi", $newordate, $newpid, $newpquantity, $neworprice, $newcid, $neworder_status, $neworid);
    
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
    $orid = $_POST['orid'];

    // Prepare and bind parameter for deletion
    $stmt = $connection->prepare("DELETE FROM product_order WHERE orid=?");
    $stmt->bind_param("i", $orid);

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
    $orid = $_POST['orid'];
    
    // Prepare and bind parameter for selection
    $stmt = $connection->prepare("SELECT * FROM product_order WHERE orid=?");
    $stmt->bind_param("i", $orid);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display result
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "orid: " . $row["orid"] . "<br>";
        echo "ordate: " . $row["ordate"] . "<br>";
        echo "pid: " . $row["pid"] . "<br>";
        echo "pquantity: " . $row["pquantity"] . "<br>";
        echo "orprice: " . $row["orprice"] . "<br>";
        echo "cid: " . $row["cid"] . "<br>";
        echo "order_status: " . $row["order_status"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}

// View operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['view'])) {
    // Prepare SQL query to retrieve all orders
    $sql = "SELECT * FROM product_order";
    $result = $connection->query($sql);

    // Display result
    if ($result->num_rows > 0) {
        echo "<h2>Product Order Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>orid</th><th>ordate</th><th>pid</th><th>pquantity</th><th>orprice</th><th>cid</th><th>order_status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["orid"] . "</td>";
            echo "<td>" . $row["ordate"] . "</td>";
            echo "<td>" . $row["pid"] . "</td>";
            echo "<td>" . $row["pquantity"] . "</td>";
            echo "<td>" . $row["orprice"] . "</td>";
            echo "<td>" . $row["cid"] . "</td>";
            echo "<td>" . $row["order_status"] . "</td>";
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
