<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $pname = $_POST['pname'];
        $pgrade = $_POST['pgrade'];
        $price_per_unit = $_POST['price_per_unit'];
        $mfg_date = $_POST['mfg_date'];
        $exp_date = $_POST['exp_date'];

        
        $sql = "INSERT INTO product (pname, pgrade, price_per_unit, mfg_date, exp_date) VALUES (?, ?, ?, ?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssi", $pname, $pgrade, $price_per_unit, $mfg_date, $exp_date);
        
        if ($stmt->execute()) {
            echo "Record added successfully.";
        } else {
            echo "Error adding record: " . $stmt->error;
        }
    } elseif (isset($_POST['update'])) {
        $newpid = $_POST['pid'];
        $newpname = $_POST['newpname'];
        $newpgrade = $_POST['newpgrade'];
        $newprice_per_unit = $_POST['newprice_per_unit'];
        $newmfg_date = $_POST['newmfg_date'];
        $newexp_date = $_POST['newexp_date'];


        $sql = "UPDATE product SET pname=?, pgrade=?, price_per_unit=?, mfd_date=?, exp_date=? WHERE pid=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssssi", $newpname, $newpgrade, $newprice_per_unit, $newmfg_date, $newexp_date, $newpid);
 if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } elseif (isset($_POST['delete'])) {
        $pid =$_POST['pid'];

        $sql = "DELETE FROM product WHERE pid=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $pid);

        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
    } elseif (isset($_POST['read'])) {
        $pid = $_POST['pid'];

        $sql = "SELECT * FROM product WHERE pid=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $pid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "pid: " . $row["pid"] . "<br>";
            echo "pname: " . $row["pname"] . "<br>";
            echo "pgrade: " . $row["pgrade"] . "<br>";
            echo "price_per_unit:".$row["price_per_unit"]."<br>";
            echo "mfg_date: " . $row["mfd_date"] . "<br>";
             echo "exp_date: " . $row["exp_date"] . "<br>";
        } else {
            echo "No record found with the propgradeed ID.";
        }
    } elseif (isset($_POST['view'])) {
        $sql = "SELECT * FROM product";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>product Information</h2>";
            echo "<table border='1'>";
            echo "<tr><th>pid</th><th>pname</th><th>pgrade</th><th>price_per_unit</th><th>mfg_date</th><th>exp_date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["pid"] . "</td>";
                echo "<td>" . $row["pname"] . "</td>";
                echo "<td>" . $row["pgrade"] . "</td>";
                echo "<td>" . $row["price_per_unit"] ."</td>";
                echo "<td>" . $row["mfd_date"] . "</td>";
                echo "<td>" . $row["exp_date"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
    }
}

$connection->close();
?>
