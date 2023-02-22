<?php
session_start();

session_unset();
session_destroy();

unset($_SESSION['userName']);
$_SESSION['loggedInStatus'] = false;

header("location: Login.php");
exit;
