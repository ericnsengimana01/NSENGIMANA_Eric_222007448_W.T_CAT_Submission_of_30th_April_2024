<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";

// Insert operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    // Sanitize input data
    $vfname = $_POST['vfname'];
    $vlname = $_POST['vlname'];
    $phone = $_POST['phone'];
    $vemail = $_POST['vemail'];
    $district = $_POST['district'];
    $sector = $_POST['sector'];
    $cell = $_POST['cell'];
    $village = $_POST['village'];
    
    // Prepare and bind parameters for insertion
    $sql = "INSERT INTO vendor (vfname, vlname, phone, vemail, district, sector, cell, village) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssss", $vfname, $vlname, $phone, $vemail, $district, $sector, $cell, $village);
    
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
    $newvid = $_POST['vid'];
    $newvfname = $_POST['newvfname'];
    $newlname = $_POST['newvlname'];
    $newphone = $_POST['newphone'];
    $newvemail = $_POST['newvemail'];
    $newdistrict = $_POST['newdistrict'];
    $newsector = $_POST['newsector'];
    $newcell = $_POST['newcell'];
    $newvillage = $_POST['newvillage'];

    // Prepare and bind parameters for update
    $sql = "UPDATE vendor SET vfname=?, vlname=?, phone=?, vemail=?, district=?, sector=?, cell=?, village=? WHERE vid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssssi", $newvfname, $newlname, $newphone, $newvemail, $newdistrict, $newsector, $newcell, $newvillage, $newvid);
    
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
    $vid = $_POST['vid'];

    // Prepare and bind parameter for deletion
    $sql = "DELETE FROM vendor WHERE vid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $vid);

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
    $vid = $_POST['vid'];
    
    // Prepare and bind parameter for selection
    $sql = "SELECT * FROM vendor WHERE vid=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $vid);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display result
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "vid: " . $row["vid"] . "<br>";
        echo "vfname: " . $row["vfname"] . "<br>";
        echo "vlname: " . $row["vlname"] . "<br>";
        echo "phone: " . $row["phone"] . "<br>";
        echo "vemail: " . $row["vemail"] . "<br>";
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
    // Prepare SQL query to retrieve all vendors
    $sql = "SELECT * FROM vendor";
    $result = $connection->query($sql);

    // Display result
    if ($result->num_rows > 0) {
        echo "<h2>Vendor Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>vid</th><th>vfname</th><th>vlname</th><th>phone</th><th>vemail</th><th>district</th><th>sector</th><th>cell</th><th>village</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["vid"] . "</td>";
            echo "<td>" . $row["vfname"] . "</td>";
            echo "<td>" . $row["vlname"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["vemail"] . "</td>";
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
