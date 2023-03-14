<?php
include "./config/conn.php";
include "./config/session.php";

function urlfetcher()
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


$user_to = "";
$user_id = urlfetcher();
$sql1 = "SELECT userNameReg from `user` WHERE id= $user_id";
$res1 = mysqli_query($conn, $sql1);
if ($res1) {
    while ($row = $res1->fetch_assoc()) {
        $GLOBALS['user_to'] = $row['userNameReg'];
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
                    if ($res1) {
                        echo '<script>alert("Requested Successfully *")</script>';
                    }
                } else {
                    echo '<script>alert("Request Already Exists !")</script>';
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
    <script src="https://kit.fontawesome.com/8dc03a4776.js" crossorigin="anonymous"></script>
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    include "./Components/Header.php";
    include "./Components/NavbarResponsive.php";
    ?>

    <!--  myEditform -->

    <section class="d-flex flex-column justify-content-center align-items-center bg-light" style="width:100vw;height:100vh" id="reqCont">
        <div class="container">
            <div class="container bg-info py-4">

                <?php
                if (isset($_SESSION['userName'])) {
                    echo 'The Following is the list of requests made by';
                    echo $_SESSION['userName'];
                } else {
                    echo "<center class='attentionGrabberClass bg-transparent border-0'>User Not Logged In</center>";
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

                                if ($row['user_from'] == $_SESSION['userName']) {

                                    echo "<tr class='table-active'>
                                <td>" . $row['user_to'] . "</td>
                                <td>" . $row['description'] . "</td>
                                <td>" . $row['reqBlood'] . "</td>
                                <td>" . $row['req_date'] . "</td> 
                                <td class='button-group'>
                                        <a href='editRequests.php?" . $row['id'] . "' id='getForm' class='p-3 bg-warning rounded-5 text-decoration-none text-dark text-center' onClick='getRequestModal(" . $row['id'] . ")' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Edit Requests!' >
                                                <i class='fa fa-edit '></i>
                                        </a>
                                        <button type='button' id='getForm' class='border-0 bg-danger rounded-5' onClick='deleteEntry()' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Delete Requests!'>
                                                <i class='fa fa-trash p-3'></i>
                                        </button>
                                </td>
                                </tr>";
                                }
                            }
                        }
                    } else {
                        echo '<tr class="table-danger"><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>';
                    }
                    ?>
                </tbody>
            </table>

            <div class="mt-2 px-3 bg-success py-3 h5 text-white d-flex">
                Getting Current Request Data
                <div class='d-flex justify-content-center align-items-center ms-2 '>
                    <div class="spinner-grow spinner-grow-sm"></div>
                    <div class="spinner-grow spinner-grow-sm"></div>
                    <div class="spinner-grow spinner-grow-sm"></div>
                </div>
            </div>

            <div class="container mt-1 d-flex justify-content-center align-items-center py-2" style="box-shadow:10px 10px 20px rgba(0,0,0,0.2),-5px -5px 20px rgba(0,0,128,0.3);height:45vh">
                <?php
                $user_id = urlfetcher();
                if (isset($_SESSION['userName'])) {
                    if (isset($user_id) && $user_id != 0) {
                        echo '<form action="" method="POST" class="container d-flex flex-column col-sm-6 col-lg-6 bg-white">
                    <div class="container d-flex flex-column">
                        <strong class="h5 text-dark">
                            Welcome ' .  $_SESSION['userName']   .   '
                        </strong>
                        <span class="text-secondary">
                            Are you trying to make a request to
                            ' . $user_to . '
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
                </form>';
                    } else if ($user_id == 0) {
                        echo "<div class='text-secondary h5' >
                                 No One Selected To Make A Request Yet!
                             </div>";
                    }
                } else {
                    echo '<div class="container d-flex justify-content-center align-items-center ErrorPageIllustrationCont"><img src="./assets/loginDenied404.jpg" alt="User Not Logged In" class="col-sm-10 col-lg-8" ></div>';
                }
                ?>
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
<!-- <script>
    function getRequestModal(id) {
        var modal = document.createElement('div');
        modal.innerHTML = "hello";
    }
</script> -->