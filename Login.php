<?php
include "./config/conn.php";
include "./config/session.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userName = mysqli_real_escape_string($conn, $_POST["userName"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT * FROM `user` WHERE usernameReg = '$userName' AND passwordReg = '" . md5($password) . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $rows = mysqli_num_rows($result);
    if ($rows == 1) {

        $loginDate = date("Y-m-d H:i:s");
        $loginTime = time();
        $sql = "INSERT into `login` (userName,loginDate,loginTime) VALUES ('$userName','$loginDate','$loginTime')";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $_SESSION['loggedInStatus'] = true;
            $_SESSION['userName'] = $userName;
            $_SESSION['sessionCreated'] = $loginTime;
            header("Location:index.php");
        } else {
            echo '<script> alert("Faced Some Error!") </script>';
        }
    } else {

        echo '<script> alert("Username Or Password Was Wrong!") </script>';
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['guestLogin'])) {
        $userName = 'Guest1';
        $password = 'guestGuest';
        $query = "SELECT * FROM `user` WHERE usernameReg = '$userName' AND passwordReg = '" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $loginDate = date("Y-m-d H:i:s");
            $loginTime = time();
            $sql = "INSERT into `login` (userName,loginDate,loginTime) VALUES ('$userName','$loginDate','$loginTime')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $_SESSION['loggedInStatus'] = true;
                $_SESSION['userName'] = $userName;
                $_SESSION['sessionCreated'] = $loginTime;
                header("Location:index.php");
            } else {
                echo "<script>alert('Guest Login is Non-functional at this moment')</script>";
            }
        } else {
            echo "<script>alert('Guest DoesNot exists')</script>";
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
    <title>Login</title>
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

<body>
    <?php
    include "./Components/Header.php";
    include "./Components/NavbarResponsive.php";
    ?>
    <div class="d-flex flex-column" id="formContLogin">
        <form method="POST" id="loginForm">
            <h5 class="text-white">
                LOGIN
            </h5>
            <input type="text" name="userName" id="userName" placeholder="Enter userName | organization name" required>
            <input type="password" name="password" id="password" placeholder="Enter password" required>
            <div class="container d-flex justify-content-end align-items-center px-3">
                <button type="button" class="btn bg-transparent py-2 border-0">
                    <i class="fa fa-eye text-white"></i>
                </button>
            </div>
            <input type="submit" name="submit" value="Login" id="submit" class="bg-success border-0 text-white">

            <div class="my-2 py-1 ">
                <a href="./Register.php" class="text-danger">
                    <small>
                        Do not have an Account yet..?
                    </small>
                </a>
            </div>

        </form>
        <form class="p-2 d-flex flex-column justify-content-center align-items-center" method="post" id="guestLoginForm">

            <h5 class="container py-2 border-bottom border-secondary d-flex justify-content-end align-items-center">
                Login as Guest
            </h5>
            <small class="container px-2 mb-1 d-flex justify-content-end align-items-center">
                We respect your valuable time :)
            </small>
            <input type="submit" class="container bg-flashy btn btn-info rounded-0" name="guestLogin" value="Login As A Guest"></input>
        </form>

    </div>
    <script>
        function fadeToForget() {
            var warning = document.getElementById('Warning');
            warning.classList.add('fade');
            warning.setTimeout(() => {
                warning.classList.add('d-none');
            }, 1000);
        }
    </script>
</body>

</html>