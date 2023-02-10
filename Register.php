<?php
include "./config/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username
    $userNameReg = mysqli_real_escape_string($conn, $_POST["userNameReg"]);
    $ageReg = mysqli_real_escape_string($conn, $_POST["ageReg"]);

    $emailReg = mysqli_real_escape_string($conn, $_POST["emailReg"]);
    $passwordReg = mysqli_real_escape_string($conn, $_POST["passwordReg"]);
    $reg_date = date("Y-m-d H:i:s");

    // checking uniqueness of username
    $sql = "SELECT * FROM user where (userNameReg = '$userNameReg' or emailReg = '$emailReg');";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($emailReg == isset($row['email'])) {
            echo "<small class='text-danger text-center'>Email Already exits*<small>";
            $conn->close();
        }
        if ($userNameReg == isset($row['userNameReg']))
            echo "<small class='text-danger text-center'>Username Already exits*<small>";
    } else {
        $query = "INSERT into `userregisteration`(userNameReg,ageReg,emailReg,passwordReg,reg_date) VALUES('$userNameReg','$ageReg','$emailReg','" . md5($passwordReg) . "','$reg_date')";
        //   checking result
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location:login.php");
            die();
            echo "<small class='text-danger'>Please Login To completely authorize urself</small>";
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
    <title>Register</title>
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
        .text-white {
            color: #fff;
        }

        .bg-success {
            background-color: green;
        }

        #formContRegistration {
            height: 90vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #formContRegistration form {
            padding: 10px 5px;
            height: 60vh;
            width: 35vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #012340;
        }

        #formContRegistration input {
            width: 98%;
            margin: 3px 0px;
            padding: 0.5rem 2px;
            border-radius: 2px;
        }

        .getterButtons {
            padding: 5px 0px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-right: 2px solid blue;
        }
    </style>
</head>

<body>
    <?php include "./Components/Header.php" ?>
    <div id="formContRegistration">
        <form method="POST" id="registraionForm" class="d-flex flex-column py-1 my-1">
            <h2 class="text-white text-center">
                REGISTER
            </h2>
            <input type="text" name="userNameReg" id="userNameReg" placeholder="Enter userName" required="">
            <input type="number" name="ageReg" id="ageReg" placeholder="Enter Age" required="">
            <input type="email" name="emailReg" id="emailReg" placeholder="Enter your email" required="">
            <input type="password" name="passwordReg" id="passwordReg" placeholder="Enter password" required="">
            <span class="d-flex justify-content-between align-items-center container py-2">
                <input type="checkbox" name="showPassword" id="showPassword" class="showPassword bg-success" style="width:10%">
                <small class="text-start text-light" style="width: 90%;">
                    Show password
                </small>
            </span>
            <hr style="background-color: white;color:white;">
            <small class="text-light">
                Please Provide some Additional Info..
            </small>
            <input type="number" name="pinCodeReg" id="pinCodeReg" placeholder="Enter your pin code" required="">
            <input type="text" name="addressReg" id="addressReg" placeholder="Enter address" required="">
            <input type="submit" name="submitReg" value="Register" id="submitReg" class="bg-success border-0 text-white">
        </form>
    </div>

</body>

</html>