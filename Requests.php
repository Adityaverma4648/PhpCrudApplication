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

$user_id = (int) filter_var($url, FILTER_SANITIZE_NUMBER_INT);

$sql1 = "SELECT userNameReg from `user` WHERE id= $user_id";
$res1 = mysqli_query($conn, $sql1);
if ($res1) {
    while ($row = $res1->fetch_assoc()) {
        $user_to = $row['userNameReg'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_to = $GLOBALS['user_to'];
    $user_from = $_SESSION['userName'];
    $description = $_POST["description"];
    $reqBlood =  $_POST["reqBlood"];
    $req_date = date('Y-m-d H:i:s');

    if (isset($_POST['requestBtn'])) {

        $query = "SELECT * FROM `requests`";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($rows = $result->fetch_assoc()) {

                if ($rows['user_to'] != $user_to && $rows['user_from'] != $user_from) {
                    $sql1 = "INSERT INTO `requests`(user_to,user_from,description,reqBlood,req_date) VALUES('$user_to','$user_from','$description','$reqBlood','$req_date') ";
                    $res1 = mysqli_query($conn, $sql1);
                    if ($res) {
                        echo '<script>alert("Requested Successfully *")</script>';
                    }
                } else {
                    echo '<script>alert("Request Already Exists !")</script>';
                }
            }
        }
    }
}


// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//     not logged in Warning starts here -------  No Data To Show,You Are Not Logged In!
if (!isset($_SESSION['userName'])) {
    echo '<script>alert("No Data To Show,You Are Not Logged In!")</script>';
}
//       auth warrning block ends here
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
    <link src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous">
    </link>
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    include "./Components/Header.php";
    ?>
    <section class="d-flex flex-column justify-content-center align-items-center bg-light" style="width:100vw;height:100vh">
        <div class="container">
            <div class="container bg-info py-4">
                The Following is the list of requests made by
                <?php
                if (isset($_SESSION['userName']))
                    echo $_SESSION['userName'];
                else {
                    echo "User Not Logged In";
                }
                ?>
            </div>
            <table class="table table-light border-dark table-bordered table-striped">
                <thead>
                    <tr class="table-dark text-primary">
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
                    <?php
                    if (isset($_SESSION['userName'])) {
                        $sql = "SELECT * from `requests`";
                        $res = mysqli_query($conn, $sql);
                        if ($res) {
                            while ($row = $res->fetch_assoc()) {
                                echo "<tr class='table-active'>
                                <td>" . $row['user_to'] . "</td>
                                <td>" . $row['description'] . "</td>
                                <td>" . $row['reqBlood'] . "</td>
                                <td>" . $row['req_date'] . "</td> 
                                <td>
                                        <button type='button' id='getForm' class='border-0 bg-warning px-1 py-2' onClick='getRequestModal()'>
                                                <i class='fa fa-edit'></i>
                                                 Edit Request
                                        </button>
                                </td>
                                </tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>

            <div class="mt-2 px-3 bg-success py-3 h5 text-white">
                Getting Current Request Data.....
            </div>

            <div class="container mt-1 d-flex justify-content-center align-items-center py-2" style="box-shadow:10px 10px 20px rgba(0,0,0,0.2);height:45vh">
                <form action="" method="POST" class="container d-flex flex-column col-sm-6 col-lg-6 bg-white">
                    <div class="container d-flex flex-column">
                        <strong class="h5 text-dark">
                            Welcome
                            <?php
                            if (isset($_SESSION['userName'])) {
                                echo $_SESSION['userName'];
                            }
                            ?>
                        </strong>
                        <span class="text-secondary">
                            Are you trying to make a request to
                            <?php
                            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                                $url = "https://";
                            else
                                $url = "http://";
                            $url .= $_SERVER['HTTP_HOST'];
                            $url .= $_SERVER['REQUEST_URI'];

                            $user_id = (int) filter_var($url, FILTER_SANITIZE_NUMBER_INT);
                            $sql1 = "SELECT userNameReg from `user` WHERE id= $user_id";
                            $res1 = mysqli_query($conn, $sql1);
                            $user_to = "";
                            if ($res1) {
                                while ($row = $res1->fetch_assoc()) {
                                    $user_to = $row['userNameReg'];
                                }
                                echo "<strong class='text-dark'>" . $user_to . "</strong>";
                            }

                            ?>
                            for blood sample,please fill in all required data!
                        </span>
                    </div>
                    <label for="blood_group" class="container-fluid d-flex flex-column py-1  border-bottom border-secondary">
                        <strong>
                            Select the required blood group
                        </strong>
                        <select name="reqBlood" id="reqBlood" class="container-fluid py-2 " required>
                            <option value="A+">A +ve</option>
                            <option value="A+">A -ve</option>
                            <option value="B+">B +ve</option>
                            <option value="B-">B -ve</option>
                            <option value="AB+">AB +ve</option>
                            <option value="AB+">AB-ve</option>
                            <option value="O+">O +ve</option>
                            <option value="O-">O -ve </option>
                        </select>
                    </label>
                    <label for="description" class="container-fluid d-flex flex-column py-3">
                        <strong>
                            Enter some small description
                        </strong>
                        <textarea type="text" placeholder="Enter description" name="description" class="py-1" style="height:10vh" required></textarea>
                    </label>

                    <input type="submit" name="requestBtn" class="btn btn-success" value="Make Request">
                </form>

            </div>
        </div>


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