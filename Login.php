<?php
include "./config/conn.php";
include "./config/session.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = mysqli_real_escape_string($conn, $_POST["userName"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);


    $query = "SELECT * FROM `user` WHERE usernameReg = '$userName' AND passwordReg = '" . md5($password) . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['loggedInStatus'] = true;
        $_SESSION['userName'] = $userName;
        $loginDate = date("Y-m-d H:i:s");
        $query = "INSERT into `login` (userName,email,loginDate) VALUES ($userName,$email,$loginDate)";
        header("Location:index.php");
    } else {
        echo "errors";
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
    <link rel="stylesheet" href="./styles/style.css">

    <style>
        body::-webkit-scrollbar {
            display: none;
        }

        #formContLogin {
            height: 94vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('https://img.freepik.com/free-vector/abstract-colorful-shapes-background_23-2148769631.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        #formContLogin form {
            padding: 10px 5px;
            height: 60vh;
            width: 35vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #012340;
        }

        #formContLogin input {
            width: 98%;
            margin: 3px 0px;
            padding: 0.5rem 8px;
            border-radius: 2px;
        }

        .text-white {
            color: #fff;
        }

        .bg-success {
            background-color: green;
        }
    </style>
</head>

<body>
    <?php include "./Components/Header.php" ?>
    <div id="formContLogin">
        <form method="POST" id="loginForm">
            <center>
                <h4 class="text-white">
                    LOGIN
                </h4>
            </center>
            <input type="text" name="userName" id="userName" placeholder="Enter userName | organization name" required>
            <input type="text" name="email" id="email" placeholder="Enter your email | organizational email" required>
            <input type="password" name="password" id="password" placeholder="Enter password" required>
            <input type="checkbox" id="showPasswordCheckbox">
            <input type="submit" name="submit" value="Login" id="submit" class="bg-success border-0 text-white">
        </form>
    </div>
    <script src="./scripts/index.js"></script>
</body>

</html>