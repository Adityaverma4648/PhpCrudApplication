<?php
   include "./config/conn.php";
   include "./config/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!--  google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@500;600&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
<!--  fonts imports ends here -->
<!-- fontawesome icons -->
<script src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous"></script>
<!-- fontawesome icons -->
<link rel="stylesheet" href="./style.css">
    <style>
         #editRequests{
            height: 100vh;
            width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
         }
         #editRequestForm{ 
            height: 60vh;
            width: 45vw;
            display: flex;
            flex-direction: column;
         }
    </style>
</head>

<body id="editRequests" >
     <?php
        include './Components/Header.php';
        include './Components/NavbarResponsive.php';
     ?>
    <form action="" class='container d-flex justify-content-center align-items-center bg-dark' id="editRequestForm" >
        <label for="descriptionUpdate">
            <textarea type="text" name="descriptionUpdate" placeholder="please Update Description here">
            </textarea>
        </label>
        <label for="descriptionUpdate">
            <textarea type="text" name="descriptionUpdate" placeholder="please Update Description here">
            </textarea>
        </label>

    </form>
</body>

</html>