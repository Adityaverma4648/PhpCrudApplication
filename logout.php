<?php
session_unset();
unset($_SESSION['userName']);
// Destroy session
session_destroy();
// Redirecting To Home Page
header("Location:Login.php");
exit;
