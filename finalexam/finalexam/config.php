<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $message = $conn->real_escape_string($_POST['message']);
    
    $sql = "INSERT INTO string_info (message) VALUES ('$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

