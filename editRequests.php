<?php
   include "./config/conn.php";
   include "./config/session.php";
   
     if($_SERVER['REQUEST_METHOD']=="POST"){
         if(isset($_POST['requestUpdation'])){   
            
            function urlFetcher()
            {
                if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                    $url = "https://";
                } else {
                    $url = "http://";
                }
                $url .= $_SERVER['HTTP_HOST'];
                $url .= $_SERVER['REQUEST_URI'];
                $user_id = (int) filter_var($url, FILTER_SANITIZE_NUMBER_INT);
                return $user_id;
            } 
            $_id = urlFetcher();
            echo "<script>alert('.$_id.')</script>";
            $reqBlood = $_POST['reqBlood'];
            $description = $_POST['description'];
            $sql = 'UPDATE `requests` SET reqBlood = "'.$reqBlood.'" ,description = "'.$description.'" WHERE id = '.$_id.'';
            $res = mysqli_query($conn,$sql);
            if($res){
               echo "<script>alert('Updation Successfull')</script>";
               header("Location  :  requests.php");
            }else{
                echo "<script>alert('res was damaged')</script>";
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
    <form method="post" class='container d-flex justify-content-center align-items-center bg-dark text-white' id="editRequestForm" >
        <h5>
            Update your Request to 
        </h5>
        <label for="description" class="container-fluid" >
            <small class="">
                Choose Blood Group for Updation
            </small>
            <select class="container py-2 px-2" name="reqBlood" required>
                 <option Value="A+">A +ve</option>
                 <option Value="A-">A -ve</option>
                 <option Value="B+">B +ve</option>
                 <option Value="B-">B -ve</option>
                 <option Value="O+">O +ve</option>
                 <option Value="O-">O -ve</option>
                 <option Value="AB+">AB +ve</option>
                 <option Value="AB-">AB -ve</option>
            </select>
        </label>
        <label for="description" class="container-fluid mt-1">
            <small class="">
                Write your new description here
            </small>
            <input type="text" class="container py-2" name="description" placeholder="please Update Description here" required>
            </input>
        </label>
        <div class="container-fluid d-flex justify-content-end align-items-center mt-1">
              <input type="submit" class="py-2 col-sm-2" name="requestUpdation" value="Update">
        </div>

    </form>
</body>

</html>