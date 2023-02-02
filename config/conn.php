<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$db = "PhpCrudApplication";

//   create connection
$conn = new mysqli($serverName, $userName, $password, $db);


//  check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
