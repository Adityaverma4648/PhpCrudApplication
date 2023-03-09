<?php
include "./config/conn.php";
include "./config/session.php";
$userName = $_SESSION['userName'];
$sql = "SELECT userNameReg,emailReg,passwordReg FROM `user`";
$res = mysqli_query($conn, $sql);
if ($res) {
    while ($row = $res->fetch_assoc()) {
        if ($row['userNameReg'] == $userName) {
            $userEmail =  $row['emailReg'];
            $passwordReg = $row['passwordReg'];
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($POST['savingUpdation'])) {
        $userNameUpdation = $_POST['userNameUpdation'];
        $userEmailUpdation = $_POST['userEmailUpdation'];

        $current_user = $_SESSION['userName'];
        $sql = "UPDATE `user` SET userNameReg = $userNameUpdation , emailReg $userEmailUpdation WHERE userNameReg = $current_user";
        $res = mysqli_query($conn, $sql) or die("conn error");
        if ($res) {
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
    <title>Profile</title>
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
        li button:hover {
            color: rgba(255, 255, 255, 0.7);
        }

        .fetchedBlock {
            height: 60vh;
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh;">
    <?php
    include "./Components/Header.php";
    include "./Components/NavbarResponsive.php";
    ?>
    <section class="mt-5 container d-flex justify-content-center align-items-center bg-dark border border-secondary">
        <div class="col-sm-2 d-flex flex-column justify-content-between align-items-center border-end border-secondary" style="height:80vh;">
            <ul class="container-fluid d-flex flex-column justify-content-between align-items-center py-2" style="overflow:hidden">
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light" onclick="fetchProfileBlocks('editProfile')">
                        Edit Profile
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light" onclick="fetchProfileBlocks('changePassword')">
                        Change Password
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light" onclick="fetchProfileBlocks('emailNotification')">
                        Email Notification
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light" onclick="fetchProfileBlocks('profileSecurity')">
                        Privacy and Security
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light" onclick="fetchProfileBlocks('loginActivity')">
                        Login Activity
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light" onclick="fetchProfileBlocks('help')">
                        Help
                    </button>
                </li>

            </ul>
            <div class="container text-center text-danger py-2 d-flex flex-column" style="overflow:hidden">
                LOGO
                <span class="border-top border-secondary" style="font-size:10px">
                    Control settings for connected experiences across Instagram, the Facebook app and Messenger, including story and post sharing and logging in.
                </span>
            </div>
        </div>
        <div class=" col-sm-10 d-flex flex-column justify-content-end" id="fetchBlockHere">
        </div>
    </section>
    <script>
        function editProfile() {
            var content = `<div class="fetchedBlock container text-white">
                            <form method = "post" >
                                 <div>
                                     <?php
                                        echo $_SESSION["userName"];
                                        ?>
                                 </div>
                                 <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Name
                                      </h5>
                                     <input class="py-2 px-1" name="userNameUpdation" placeholder="<?php echo $userName ?>"></input>
                                     <small>
                                          Help people discover your account by using the name you're known by: either your full name, nickname, or business name.
                                          <br>
                                          You can only change your name twice within 14 days.
                                     </small>

                                 </div>
                                  <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Email
                                      </h5>
                                     <input class="py-2 px-1" name="userEmailUpdation" placeholder="<?php echo $userEmail ?>"></input>
                                     <small>
                                          Help people discover your account by using the name you're known by: either your full name, nickname, or business name.
                                          <br>
                                          You can only change your name twice within 14 days.
                                     </small>

                                 </div>
                                 <input class="my-1 bg-success px-1 py-2 border-0 text-white" type="submit" value="Save Changes" name="savingUpdation"></input>
                            </form>     
                           </div>`;
            return content;
        }

        function changePassword() {
            var content = `<div class="fetchedBlock container text-white">
                            <form method = "POST" >
                                 <div>
                                     <?php
                                        echo $_SESSION["userName"];
                                        ?>
                                 </div>
                                 
                                 <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Old Password
                                      </h5>
                                      <div class="container-fluid">
                                         <input class="py-2 px-1 col-sm-11" name="userNameUpdation" placeholder="<?php echo "Previous Password : ";
                                                                                                                    echo md5($passwordReg); ?>"></input>
                                         <button type="button" class="border-0 px-2 py-2">
                                             <i class="fa fa-eye"></i>
                                         </button>

                                      </div>
                                 </div>
                                  <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         New Password
                                      </h5>
                                     <div class="container-fluid">
                                         <input class="py-2 px-1 col-sm-11" name="userNameUpdation" placeholder="<?php echo "New Password : "; ?>"></input>
                                         <button type="button" class="border-0 px-2 py-2">
                                             <i class="fa fa-eye"></i>
                                         </button>
                                      </div>
                                       <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Confirm New Password
                                      </h5>
                                     <div class="container-fluid">
                                         <input class="py-2 px-1 col-sm-11" name="userNameUpdation" placeholder="<?php echo "Confirm New Password :"; ?>"></input>
                                         <button type="button" class="border-0 px-2 py-2">
                                             <i class="fa fa-eye"></i>
                                         </button>

                                      </div>
                                 </div>
                                 <div class="py-2 col-sm-2 d-flex justify-content-center align-items-center">
                                 <input class="my-1 bg-success px-1 py-2 border-0 text-white" type="submit" value="Save Changes" name="changePasswordBtn"></input>                                 
                                 </div>

                            </form>     
                           </div>`;
            return content;
        }

        function loginActivity() {
            var content = `<div class="container-fluid">
                           <table class="table table-striped table-bordered table-light">
                              <thead>
                                     <tr class="table-danger">
                                        <td><strong>S.No</strong></td>
                                        <td><strong>UserName</strong></td> 
                                        <td><strong>Session Start</strong></td> 
                                     </tr>
                              </thead>
                              <tbody>
                                 <?php

                                    $sql = "SELECT * from `login`";
                                    $res = mysqli_query($conn, $sql);
                                    if ($res) {
                                        while ($row = $res->fetch_assoc()) {
                                            if ($row['username'] == $_SESSION['userName']) {
                                                echo '<tr class="table-success"> <td>' . $row["id"] . '</td><td>' . $row["username"] . '</td><td>' . $row["loginDate"] . '</td></tr> ';
                                            }
                                        }
                                    }
                                    ?>
                                 
                              </tbody>
                           </table>
                          </div>`;
            return content;
        }

        function fetchProfileBlocks(myId) {
            var fetchBlockHere = document.getElementById('fetchBlockHere');
            var mybody = "";
            if (myId == "editProfile") {
                mybody = editProfile();
            } else if (myId === undefined) {
                mybody = editProfile();
            } else if (myId === "") {
                mybody = editProfile();
            } else if (myId === undefined) {
                mybody = editProfile();
            } else if (myId === "changePassword") {
                mybody = changePassword();
            } else if (myId === "loginActivity") {
                mybody = loginActivity();

            }

            fetchBlockHere.innerHTML = mybody;
        }
        fetchProfileBlocks("");
    </script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userNameUpdation = $_POST['userNameUpdation'];
        $userEmailUpdation = $_POST['userEmailUpdation'];
        if (isset($savingUpdationEditProfile)) {
            if ($userNameUpdation && $userEmailUpdation) {

                $sql = "UPDATE `user` SET userNameReg = $userNameUpdation,$userEmailUpdation";
                $res = mysqli_query($conn, $sql);
                if ($res)
                    echo "<script>alert('Updated')</script>";
                else
                    echo "CouldNot Update !";
            }
        }
        if (isset($changePasswordBtn)) {
            $previousPassword = $passwordReg;
        }
    }


    ?>

</body>

</html>