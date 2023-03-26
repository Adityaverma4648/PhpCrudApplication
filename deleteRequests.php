<?php
       include "./config/conn.php";
       include "./config/session.php";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST['DeleteConfirmation'])){
             function urlFetcher()
             {
                if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                    $url = "https://";
                } else {
                    $url = "http://";
                }
                $url .= $_SERVER['HTTP_HOST'];
                $url .= $_SERVER['REQUEST_URI'];
                $user_id = (int) filter_var($url,      FILTER_SANITIZE_NUMBER_INT);
                return $user_id;
              } 
       $_id  = urlFetcher();
       $sql = "DELETE FROM `requests` WHERE id=".$_id."";
       $res = mysqli_query($conn,$sql);
       if($res){
        header('Location:Requests.php');
       }else{
        echo "<script>alert('CouldNot Delete Requests!')</script>";
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
    <title>
        DeleteRequests:
        <?php
              echo $user_id;
        ?>
    </title>
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
</head>
<?php
    include "./Components/Header.php";
 ?>
<body class="container-fluid d-flex justify-content-center align-items-center" style="height:100vh;">
    <form method="post" class="d-flex justify-content-center align-items-center border border-dark p-3 bg-dark">
     <label for="DeleteConfirmation" class="container d-flex flex-column text-danger justify-content-center align-items-center" >
        <small>
            Are You confirm you want to delete this requests!
        </small>
        <input type="submit" class="bg-danger text-white border-0 col-sm-12 my-4 py-2 px-2" value="Delete" style="font-weight:600" name="DeleteConfirmation" >
          <small>
            Deletion is permanent and cannot be unDone!
          </small>
     </label> 
    </form>
</body>
</html>