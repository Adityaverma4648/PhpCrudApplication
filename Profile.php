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

function userNameFetcher($conn){
    $sql = "SELECT * FROM `user` WHERE uniqueId = '".$_SESSION['uniqueId']."' ";
    $res = mysqli_query($conn,$sql);
    if($res){
         while($row=$res->fetch_assoc()){
           $currentUserName = $row['userNameReg']; 
         }
    }
    return $currentUserName;
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
                        <i class="fa fa-edit mx-1"></i>
                        <small class="profileButtonNames" >
                        EditProfile
                        </small>
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light d-flex text-center" onclick="fetchProfileBlocks('changePassword')">
                         <i class="fa fa-key mx-1"></i>
                        <small class="profileButtonNames" >
                           ChangePassword
                        </small>
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light d-flex text-center" onclick="fetchProfileBlocks('emailNotification')">
                    <i class="fa fa-envelope-o mx-1"></i>
                        <small class="profileButtonNames" >
                           EmailNotifications
                        </small>
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light d-flex" onclick="fetchProfileBlocks('profileSecurity')">
                      <i class="fa fa-user-secret mx-1"></i>
                        <small class="profileButtonNames" >
                           Privacy&Security
                        </small>
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light d-flex" onclick="fetchProfileBlocks('loginActivity')">
                    <i class="fa fa-database mx-1"></i>
                        <small class="profileButtonNames" >
                           LoginActivity
                        </small>
                    </button>
                </li>
                <li class="container-fluid border-bottom border-secondary py-4">
                    <button type="button" class="bg-transparent border-0 py-2 text-light d-flex" onclick="fetchProfileBlocks('help')">
                    <i class="fa fa-fa fa-handshake-o mx-1"></i>
                        <small class="profileButtonNames" >
                           HelpAndSupport
                        </small>
                    </button>
                    </button>
                </li>

            </ul>
        </div>
        <div class=" col-sm-10 d-flex flex-column justify-content-end" id="fetchBlockHere">
        <?php
           if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['savingUpdation'])) {
                $userNameUpdation = $_POST['userNameUpdation'];
                $userEmailUpdation = $_POST['userEmailUpdation'];
                $profilePicture = $_POST['profilePicture'];
                $current_user = $_SESSION['userName'];
                $sql = "UPDATE `user` SET userNameReg = '".$userNameUpdation."' , emailReg =  '".$userEmailUpdation."', profilePicture = '".$profilePicture."' WHERE userNameReg = '".$current_user."'";
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    echo "<script>
                            alert('SuccessFully Updated');
                          </script>";
                }else{
                    echo "error";
                }
            }
        }
        ?>
        </div>
       

    </section>
   
    <script>
        function editProfile() {
            var content = `<div class="fetchedBlock container text-white">
                            <form method = "post" >
                                 <div class="text-info h5 font-weight-bold mb-2" >
                                     <?php
                                        echo userNameFetcher($conn);
                                        ?>
                                 </div>
                                 <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Name
                                      </h5>
                                     <input type="text" class="py-2 px-1" name="userNameUpdation" placeholder="Chnage UserName" required></input>
                                     <small>
                                          Help people discover your account by using the name you're known by: either your full name, nickname, or business name.
                                     </small>

                                 </div>
                                  <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Email
                                      </h5>
                                     <input type="email" class="py-2 px-1" name="userEmailUpdation" placeholder="Change Email" required></input>
                                     <small>
                                          Help people discover your account by using the name you're known by: either your full name, nickname, or business name.
                                     </small>
                                 </div>
                                 <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Profile Picture
                                      </h5>
                                     <input type="text" class="py-2 px-1" name="profilePicture" placeholder="Eg: https://myPic.com"></input>
                                     <small>
                                          Add Some Avatar Makes It Easier For People To Identify You! 
                                     </small>
                                 </div>
                                 <div class="container d-flex justify-content-end align-items-center">
                                 <input class="my-1 bg-success px-1 py-2 border-0 text-white" type="submit" value="Save Changes" name="savingUpdation"></input> 
                                 </div>
                            </form>     
                           </div>`;
            return content;
        }

        function changePassword() {
            var content = `<div class="fetchedBlock container text-white">
                            <form method = "post" >
                                 <div class="h5 text-info my-2" >
                                     <?php
                                        echo userNameFetcher($conn);
                                        ?>
                                 </div>
                                 
                                 <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Old Password
                                      </h5>
                                      <div class="container-fluid">
                                         <input class="py-2 px-1 col-sm-11" name="oldPassword" placeholder="Previous Password"></input>
                                         <button type="button" class="border-0 px-2 py-2" onclick="passwordToggle(event)">
                                             <i class="fa fa-eye"></i>
                                         </button>

                                      </div>
                                 </div>
                                  <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         New Password
                                      </h5>
                                     <div class="container-fluid">
                                         <input class="py-2 px-1 col-sm-11" name="newPassword" placeholder="New Password"></input>
                                         <button type="button" class="border-0 px-2 py-2" onclick="passwordToggle(event)">
                                             <i class="fa fa-eye"></i>
                                         </button>
                                      </div>
                                       <div class="d-flex flex-column">
                                      <h5 class="text-danger">
                                         Confirm New Password
                                      </h5>
                                     <div class="container-fluid">
                                         <input class="py-2 px-1 col-sm-11" name="confirmNewPassword" placeholder="Confirm New Password :"></input>
                                         <button type="button" class="border-0 px-2 py-2" onclick="passwordToggle(event)">
                                             <i class="fa fa-eye"></i>
                                         </button>
                                      </div>
                                 </div>
                                 <div class="container py-2 d-flex justify-content-end align-items-center">
                                 <input class="my-1 bg-success px-1 py-2 border-0 text-white" type="submit" value="Save Changes" name="changePasswordBtn"></input>                                 
                                 </div>

                            </form>     
                           </div>`;
            return content;
        }

        function loginActivity() {
            var content = `<div class="container-fluid table-responsive loginActivity p-1" style="over-flow : scroll;height:80vh;">
                           <table class="table table-striped table-bordered table-light">
                              <thead>
                                     <tr class="table-danger">
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
                                                echo '<tr><td>' . $row["username"] . '</td><td>' . $row["loginDate"] . '</td></tr> ';
                                            }
                                        }
                                    }
                                    ?>
                                 
                              </tbody>
                           </table>
                          </div>`;
            return content;
        }

        function privacySecurity(){
            var content = `<div class='d-flex justify-content-center align-items-center'><?php include'./Components/underConstruction.php' ?></div>`;
            return content;
        }
     
        function emailNotification(){
            var content = `<div class='d-flex justify-content-center align-items-center'><?php include'./Components/underConstruction.php' ?></div>`;
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
            } else if (myId === "changePassword") {
                mybody = changePassword();
            } else if (myId === "loginActivity") {
                mybody = loginActivity();
            } else if (myId === "profileSecurity") {
                mybody = privacySecurity();
            } else if (myId === "emailNotification") {
                mybody = emailNotification();
            }

            fetchBlockHere.innerHTML = mybody;
        }
        fetchProfileBlocks("");

        function passwordToggle(event){
            event.target.innerHTML = "";
            var content = `<i class="fa fa-heart"></i>`;
            event.target.innerHTML = content;
        }
    </script>
</body>

</html>