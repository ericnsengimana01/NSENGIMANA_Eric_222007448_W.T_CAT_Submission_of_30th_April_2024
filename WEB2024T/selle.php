<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";

// Create operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $name = $_POST['Name'];
    $contactNumber = $_POST['ContactNumber'];
    $specialization = $_POST['Specialization'];
    $workSchedule = $_POST['WorkSchedule'];
    $dateOfEmployment = $_POST['DateOfEmployment'];
    $emergencyContact = $_POST['EmergencyContact'];

    $sql = "INSERT INTO sell ( sid, sadate,vid, orid, product_name) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssi", $sid, $sdate, $vid, $orid, $product_name);
    
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Record added successfully.";
        header("Refresh:0"); // Refresh the page to display the updated list
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

    elseif (isset($_POST['update'])) {
        $newsid = $_POST['sid'];
        $newsdate = $_POST['newsdate'];
        $newvid = $_POST['newvid'];
        $neworid = $_POST['neworid'];
        $newproduct_name = $_POST['newproduct_name'];

        // Prepare the SQL statement for update
        $sql = "UPDATE sell SET sdate=?, vid=?, orid=?, product_name=? WHERE sid=?";
        $stmt = $connection->prepare($sql);

        // Check if preparing the statement succeeded
        if (!$stmt) {
            echo "Error preparing statement: " . $connection->error;
        } else {
            // Bind parameters to the prepared statement
            $stmt->bind_param("ssssi", $newsdate, $newvid, $neworid, $newproduct_name, $newsid);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Record updated successfully.";
            } else {
                echo "Error updating record: " . $stmt->error;
            }
        }
    } elseif (isset($_POST['delete'])) {
        $sid = $_POST['sid'];

        // Prepare the SQL statement for delete
        $sql = "DELETE FROM sell WHERE sid=?";
        $stmt = $connection->prepare($sql);

        // Check if preparing the statement succeeded
        if (!$stmt) {
            echo "Error preparing statement: " . $connection->error;
        } else {
            // Bind parameters to the prepared statement
            $stmt->bind_param("i", $sid);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . $stmt->error;
            }
        }
    } elseif (isset($_POST['read'])) {
        $sid = $_POST['sid'];

        // Prepare the SQL statement for select
        $sql = "SELECT * FROM sell WHERE sid=?";
        $stmt = $connection->prepare($sql);

        // Check if preparing the statement succeeded
        if (!$stmt) {
            echo "Error preparing statement: " . $connection->error;
        } else {
            // Bind parameters to the prepared statement
            $stmt->bind_param("i", $sid);

            // Execute the statement
            $stmt->execute();

            // Get result
            $result = $stmt->get_result();

            // Check if there are rows returned
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "sid: " . $row["sid"] . "<br>";
                    echo "sdate: " . $row["sdate"] . "<br>";
                    echo "vid: " . $row["vid"] . "<br>";
                    echo "orid: " . $row["orid"] . "<br>";
                    echo "Product_name: " . $row["product_name"] . "<br>";
                }
            } else {
                echo "No record found with the provided ID.";
            }
        }
    } elseif (isset($_POST['view'])) {
        // Prepare the SQL statement for select all
        $sql = "SELECT * FROM sell";
        $result = $connection->query($sql);

        // Check if there are rows returned
        if ($result->num_rows > 0) {
            echo "<h2>Sell Information</h2>";
            echo "<table border='1'>";
            echo "<tr><th>sid</th><th>sdate</th><th>vid</th><th>orid</th><th>product_name</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["sid"] . "</td>";
                echo "<td>" . $row["sdate"] . "</td>";
                echo "<td>" . $row["vid"] . "</td>";
                echo "<td>" . $row["orid"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
    }

$connection->close();
?>
