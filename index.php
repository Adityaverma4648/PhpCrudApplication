<?php
include "./config/conn.php";
include "./config/session.php";

if(isset($_SESSION['loggedInStatus'])){
   $sql = "SELECT * FROM `user` WHERE userNameReg = '".$_SESSION['userName']."' ";
   $res = mysqli_query($conn,$sql);
   if($res){
        while($row=$res->fetch_assoc()){
          $_SESSION['uniqueId'] = $row['uniqueId']; 
        }
   }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Bank App</title>
  <!--  bootstrap 5 -->
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ---------------------------------------------------------- -->
  <!-- fontawesome icons -->
  <script src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous"></script>
  <!-- fontawesome icons -->
  <link rel="stylesheet" href="style.css">
  <!--  google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@500;600&family=Raleway&family=Roboto&display=swap" rel="stylesheet">

  <!--  fonts imports ends here -->
  <style>
    body::-webkit-scrollbar {
      display: none;
    }

    .resNavbar {
      display: none;
    }
  </style>
</head>

<body>
  <!--  header  -->
  <?php
  include "./Components/Header.php";
  include "./Components/NavbarResponsive.php"
  ?>
  <?php
  include "./Components/Welcome.php";
  include "./Components/Information.php";
  ?>
  <!--  header ends -->
  <!--   body starts -->

  <?php
  include "./Components/BloodCount.php";
  ?>
  <!-- body block ends -->
  <script type="module" src="./scripts/index.js">
  </script>
</body>

</html>