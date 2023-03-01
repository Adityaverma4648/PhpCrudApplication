<?php
include "./config/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username
    $user_type = mysqli_real_escape_string($conn, $_POST["loginRoles"]);
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
            echo "<script>alert('Email Already exits*')</script>";
            $conn->close();
        }
        if ($userNameReg == isset($row['userNameReg']))
            echo "<script>alert('Username Already exits*')</script>";
    } else {
        $uniqueId = uniqid();
        $query = "INSERT into `user`(uniqueId,user_type,userNameReg,emailReg,passwordReg,addressReg,city,district,state,phoneNumber,category,reg_date) VALUES('$uniqueId','$user_type','$userNameReg','$emailReg','" . md5($passwordReg) . "','$addressReg','$city','$district','$state','$phoneNumber','$category','$reg_date')";
        //   checking result
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location:login.php");
            die();
        } else {
            echo "<script>'Something Went Wrong'</script>";
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
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    include "./Components/Header.php";
    include "./Components/NavbarResponsive.php";
    ?>
    <div id="formContRegistration">
        <form method="POST" id="registraionForm" class="d-flex flex-column py-1 my-1">
            <div class="container-fluid d-flex justify-content-center align-items-center py-1 text-white">
                <div class="h5 px-1">
                    Register As
                </div>
                <select name="loginRoles" id="loginRoles" class="col-sm-8 py-2 bg-transparent text-white">
                    <option value="Doctor" class="border-1 border-bottom bottom-dark text-dark">Doctor</option>
                    <option value="Blood Bank Organization" class="border-1 border-bottom bottom-dark text-dark">Blood Bank Organization</option>
                    <option value="Donator" class="border-1 border-bottom bottom-dark text-dark">Blood Donator</option>
                    <option value="Reciever" class="border-1 border-bottom bottom-dark text-dark">Blood Reciever</option>
                    <option value="Management Memeber" class="border-1 border-bottom bottom-dark text-dark">Management Memeber</option>
                </select>
            </div>
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
            <div class="col-sm-12 py-1 d-flex justify-content-center align-items-center" id="category">
                <label for="category" class="col-sm-5 px-1 d-flex flex-column justify-content-center align-items-center text-white border-end border-white">
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

    <!--  form alteration -->
    <script>
        var selectRoles = document.getElementById("loginRoles");

        loginRoles.addEventListener("change", (event) => {
            var category = document.getElementById('category');
            if (event.target.value == "Donator") {
                category.innerHTML = `<label for="phoneNumber" class="container-fluid d-flex flex-column justify-content-center align-items-center">
                    <small class="text-white">
                        Enter Phone Number
                    </small>
                    <input type="number" placeholder="Enter your phone Number" name="phoneNumber" class="container">
                </label>`;
            } else if (event.target.value == "Reciever") {
                category.innerHTML = `<label for="phoneNumber" class="container-fluid d-flex flex-column justify-content-center align-items-center">
                    <small class="text-white">
                        Enter Phone Number
                    </small>
                    <input type="number" placeholder="Enter your phone Number" name="phoneNumber" class="container">
                </label>`;
            } else {
                category.
                innerHTML = `<label for="category" class="col-sm-5 px-1 d-flex flex-column justify-content-center align-items-center text-white border-end border-white">
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
                </label>`;
            }
        })
    </script>

</body>

</html>