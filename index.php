<?php
include "./config/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <!-- fontawesome icons -->
  <script src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous"></script>
  <!-- fontawesome icons -->

  <!--  google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@500;600&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
  <!--  fonts imports ends here -->

  <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
  <!--  header  -->
  <?php include "./Components/Header.php"; ?>
  <?php include "./Components/Welcome.php" ?>
  <!--  header ends -->
</body>

</html>