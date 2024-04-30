<?php
// Include the database connection file
require_once "databaseconnection.php/databaseconnection1.php";

// Handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $fname  = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
   
    // Preparing SQL query
    $sql = "INSERT INTO user (Firstname, Lastname, Username, gender, Email, Telephone, Password) 
    VALUES ('$fname','$lname','$username','$gender','$email','$telephone','$password')"; // Added a closing single quote here

    // Executing SQL query
    if ($connection->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.html"); // Redirect to home page after successful login
    } else {
        // Displaying error message if query execution fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Closing database connection
$connection->close();
?>
