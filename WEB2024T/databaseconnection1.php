<?php
// Connection details
$host = "localhost";
$user = "admin";
$pass = "222007448";
$database = "product_delivery_app_system";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>