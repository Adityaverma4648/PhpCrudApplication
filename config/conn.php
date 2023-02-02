<?php
$serverName = "localhost";
$userName = "root";
$password = "";

//   create connection
$conn = new mysqli($serverName, $userName, $password);


//  check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection established";
}
