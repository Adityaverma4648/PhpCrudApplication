<?php
include "./config/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username
    $userNameReg = mysqli_real_escape_string($conn, $_POST["userNameReg"]);
    $emailReg = mysqli_real_escape_string($conn, $_POST["emailReg"]);
    $passwordReg = mysqli_real_escape_string($conn, $_POST["passwordReg"]);
    $addressReg = mysqli_real_escape_string($conn, $_POST["addressReg"]);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

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
        $uniqueId = uniqid();
        $query = "INSERT into `user`(uniqueId,userNameReg,emailReg,passwordReg,addressReg,city,district,state,phoneNumber,category,reg_date) VALUES('$uniqueId','$userNameReg','$emailReg','" . md5($passwordReg) . "','$addressReg','$city','$district','$state','$phoneNumber','$category','$reg_date')";
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
        .text-white {
            color: #fff;
        }

        .bg-success {
            background-color: green;
        }

        #formContRegistration {
            height: 94vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('https://cdn.wallpapersafari.com/6/89/vWyE2K.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
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
                REGISTER ORG
            </h2>
            <input type="text" name="userNameReg" id="userNameReg" placeholder="Enter userName | organizational name" required="">

            <input type="email" name="emailReg" id="emailReg" placeholder="Enter your email | organizational email" required="">
            <div class="col-sm-12 d-flex px-1">
                <div class="col-sm-11">
                    <input type="password" name="passwordReg" id="passwordReg" placeholder="Enter password" required="">
                </div>
                <div class="col-sm-1 text-white d-flex justify-content-center align-items-center px-1">
                    <i class="fa fa-eye"></i>
                </div>
            </div>

            <!-- <hr style="background-color: white;color:white;"> -->
            <small class="text-light">
                Please Provide some Additional Info..
            </small>
            <input type="number" name="pinCodeReg" id="pinCodeReg" placeholder="Enter your pin code" required="">
            <div class=".col-sm-12 d-flex">
                <label for="city" class="col-sm-4 px-1">
                    <input type="text" name="city" placeholder="city" required>
                </label>
                <label for="district" class="col-sm-4 px-1">
                    <input type="text" name="district" placeholder="district" required>
                </label>
                <label for="state" class="col-sm-4 px-1">
                    <input type="text" name="state" placeholder="state" required>
                </label>
            </div>
            <div class="col-sm-12 py-1 d-flex justify-content-center align-items-center">
                <label for="category" class="col-sm-5 px-1 d-flex flex-column justify-content-center align-items-center text-white border-end border-white ">
                    <small>
                        Select the category of your category
                    </small>
                    <select type="category" name="category" placeholder="Enter category" class="container py-2">
                        <option value="Government">Government</option>
                        <option value="Private">Private</option>
                        <option value="Charity">Charity</option>
                    </select>
                </label>
                <label for="phoneNumber" class="col-sm-5 d-flex flex-column justify-content-center align-items-center">
                    <small class="text-white">
                        Enter Phone Number
                    </small>
                    <input type="number" placeholder="Enter your phone Number" name="phoneNumber" class="container">
                </label>
            </div>
            <input type="text" name="addressReg" placeholder="Enter Address" required>

            <input type="submit" name="submitReg" value="Register" id="submitReg" class="bg-success border-0 text-white">
        </form>
    </div>

</body>

</html>