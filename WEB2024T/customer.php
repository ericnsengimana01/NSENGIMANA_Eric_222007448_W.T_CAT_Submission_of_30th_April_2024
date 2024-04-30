<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";

// Insert operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    // Sanitize input data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $cemail = $_POST['cemail'];
    $district = $_POST['district'];
    $sector = $_POST['sector'];
    $cell = $_POST['cell'];
    $village = $_POST['village'];
    
    // Prepare and bind parameters for insertion
    $sql = "INSERT INTO customer (fname, lname, phone, cemail, district, sector, cell, village) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssss", $fname, $lname, $phone, $cemail, $district, $sector, $cell, $village);
    
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
    $newcid = $_POST['cid'];
    $newfname = $_POST['newfname'];
    $newlname = $_POST['newlname'];
    $newphone = $_POST['newphone'];
    $newcemail = $_POST['newcemail'];
    $newdistrict = $_POST['newdistrict'];
    $newsector = $_POST['newsector'];
    $newcell = $_POST['newcell'];
    $newvillage = $_POST['newvillage'];

    // Prepare and bind parameters for update
    $sql = "UPDATE customer SET fname=?, lname=?, phone=?, cemail=?, district=?, sector=?, cell=?, village=? WHERE cid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssssi", $newfname, $newlname, $newphone, $newcemail, $newdistrict, $newsector, $newcell, $newvillage, $newcid);
    
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
    $cid = $_POST['cid'];

    // Prepare and bind parameter for deletion
    $sql = "DELETE FROM customer WHERE cid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $cid);

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
    $cid = $_POST['cid'];
    
    // Prepare and bind parameter for selection
    $sql = "SELECT * FROM customer WHERE cid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display result
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "cid: " . $row["cid"] . "<br>";
        echo "fname: " . $row["fname"] . "<br>";
        echo "lname: " . $row["lname"] . "<br>";
        echo "phone: " . $row["phone"] . "<br>";
        echo "cemail: " . $row["cemail"] . "<br>";
        echo "district: " . $row["district"] . "<br>";
        echo "sector: " . $row["sector"] . "<br>";
        echo "cell: " . $row["cell"] . "<br>";
        echo "village: " . $row["village"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}

// View operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['view'])) {
    // Prepare SQL query to retrieve all customers
    $sql = "SELECT * FROM customer";
    $result = $connection->query($sql);

    // Display result
    if ($result->num_rows > 0) {
        echo "<h2>Customer Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>cid</th><th>fname</th><th>lname</th><th>phone</th><th>cemail</th><th>district</th><th>sector</th><th>cell</th><th>village</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["cid"] . "</td>";
            echo "<td>" . $row["fname"] . "</td>";
            echo "<td>" . $row["lname"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["cemail"] . "</td>";
            echo "<td>" . $row["district"] . "</td>";
            echo "<td>" . $row["sector"] . "</td>";
            echo "<td>" . $row["cell"] . "</td>";
            echo "<td>" . $row["village"] . "</td>";
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
