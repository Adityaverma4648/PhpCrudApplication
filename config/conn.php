<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$db = "PhpCrudApplication";

//   create connection
$conn = new mysqli($serverName, $userName, $password, $db) or die("Connection failed: " . $conn->connect_error);
