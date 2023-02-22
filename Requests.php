<?php
include "./config/conn.php";
include "./config/session.php";
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];

if (!isset($_SESSION['userName'])) {
    echo '<div class="Warning end-0 position-absolute col-sm-3 px-2 py-3 text-danger bg-light d-flex justify-content-evenly align-items-center" style="z-index:9999999999999;margin-top :10vh " id="Warning"><small>No Data To Show,You Are Not Logged In!<small> <button type="button" class="border-2 border-dark bg-transparent p-2" onClick="fadeToForget()"><i class="fa fa-close"></i></button> </div>';
}


if (isset($_SESSION['userName'])) {
    $curr_user = $_SESSION['userName'];
    $sql = "SELECT 	user_to,user_from,reqBlood,description,req_date FROM `requests`";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            if ($row["user_from"] == $_SESSION["userName"]) {
                echo "<tr>
                            <td>" . $row['user_to'] . "</td><td>" . $row['reqBlood'] . "</td><td>" . $row['description'] . "</td><td>" . $row['req_date'] . "</td></tr>";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["requestBtn"])) {
            $user_from = $_SESSION['userName'];
            $user_id = (int) filter_var($url, FILTER_SANITIZE_NUMBER_INT);
            $getName = "SELECT userNameReg FROM `user`";
            $res1 = mysqli_query($conn, $getName);
            if ($res1) {
                while ($row = $res1->fetch_assoc()) {
                    if ($row['id'] = $user_id)
                        $user_to = $row['userNameReg'];
                }
            }

            $reqBlood = $_POST['reqBlood'];
            $description = $_POST['description'];
            $req_date = date("Y-m-d H:i:s");
            // // checking uniqueness of username
            $sql = "SELECT * FROM requests where (user_from = '$user_from' or user_to = '$user_to');";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($user_from == isset($row['user_from']) && $user_to == isset($row['user_to'])) {
                    echo '<div class="Warning end-0 position-absolute col-sm-3 px-2 py-3 text-danger bg-light d-flex justify-content-evenly align-items-center" style="z-index:9999999999999;margin-top :10vh" id="Warning"><small>Already Requested!<small> <button type="button" class="border-2 border-dark bg-transparent p-2" onClick="fadeToForget()"><i class="fa fa-close"></i></button> </div>';
                    $conn->close();
                }
            } else {

                $sql = "INSERT into `requests`(user_from,user_to,reqBlood,description,req_date) VALUES ('$user_from','$user_to','$reqBlood','$description','$req_date')";
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $_SESSION['reqId'] = $user_id;
                    $_SESSION['alreadyRequested'] = true;
                    header('Location : index.php');
                } else {
                    echo "error";
                }
            }
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
    <title>Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--  google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@500;600&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <!--  fonts imports ends here -->
    <!-- fontawesome icons -->
    < src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous"></>
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="./styles/style.css">
</head>
<style>
    section {
        height: 100vh;
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSir3VB0gH99D1h2C9ajSNj_QtRpr4rzFrqkbgFBuL71RKRU34uJCOPIfIV5lrPrB9KLN0&usqp=CAU');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .formCont {
        padding: 1rem;
        height: 50vh;
        background: #c0c0aa;
        background: -webkit-linear-gradient(to right, rgba(28, 239, 255, 0.5), rgba(192, 192, 170, 0.3));
        background: linear-gradient(to right, rgba(28, 239, 255, 0.8), rgba(192, 192, 170, 0.5));
        backdrop-filter: blur(0.5rem);
    }
</style>

<body>
    <?php
    include './Components/Header.php'; ?>
    <section class="d-flex flex-column justify-content-center align-items-center">

        <div class="container">
            <div class="container bg-info py-4">
                The Following is the list of requests made by
                <?php
                if (isset($_SESSION['userName']))
                    echo $_SESSION['userName'];
                ?>
            </div>
            <table class="table table-light border-dark table-bordered table-striped">
                <thead>
                    <tr class="text-primary">
                        <td>
                            REQUESTED USER
                        </td>
                        <td>
                            DESCRIPTION
                        </td>
                        <td>
                            REQUESTED BLOOD SAMPLE
                        </td>
                        <td>
                            REQUESTED DATE
                        </td>
                        <!-- edit Requests -->
                        <td>
                            EDIT REQUEST
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php
                            $user_id = (int) filter_var($url, FILTER_SANITIZE_NUMBER_INT);
                            $sql1 = "SELECT userNameReg from `user` WHERE id= $user_id";
                            $res1 = mysqli_query($conn, $sql1);
                            if ($res1) {
                                while ($row = $res1->fetch_assoc()) {
                                    echo '<div class="text-dark">' . $row['userNameReg'] . '</div>';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            N/A
                        </td>
                        <td>
                            N/A
                        </td>
                        <td>
                            N/A
                        </td>
                        <td class="d-flex justify-content-center align-items-center">
                            <button type="button" id="getForm" class="border-0 bg-warning px-1 py-2">
                                <i class="fa fa-edit"></i>
                                Edit Request
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <form action="" method="POST" class="container formCont d-flex flex-column">
            <small class="text-center">
                Enter the required
            </small>
            <label for="blood_group" class="container-fluid d-flex justify-content-center align-items-center">
                <select name="reqBlood" id="reqBlood" class="container-fluid">
                    <option value="A+">A+</option>
                    <option value="A+">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB+">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </label>
            <label for="description">
                <input type="text" placeholder="Enter description" name="description">
            </label>
            <input type="submit" name="requestBtn" value="Request">
        </form> -->

    </section>
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