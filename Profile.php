<?php
include "./config/conn.php";
include "./config/session.php";
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
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php
    include "./Components/Header.php";
    ?>
    <section class="row d-flex mt-5">
        <div class="col-sm-2 px-1 bg-warning d-flex flex-column justify-content-between align-items-center border-end border-secondary" style="height:94vh;">
            <ul class="container-fluid d-flex flex-column justify-content-between align-items-center py-2">
                <li class="container-fluid border-bottom border-dark py-4">
                    <button type="button" class="bg-transparent border-0" onclick="fetchProfileBlocks('editProfile')">
                        Edit Profile</button>
                </li>
                <li class="container-fluid border-bottom border-dark py-4">
                    <button type="button" class="bg-transparent border-0" onclick="fetchProfileBlocks('changePassword')">
                        Change Password</button>
                </li>
                <li class="container-fluid border-bottom border-dark py-4">
                    <button type="button" class="bg-transparent border-0" onclick="fetchProfileBlocks('emailNotification')">
                        Email Notifications</button>
                </li>
                <li class="container-fluid border-bottom border-dark py-4">
                    <button type="button" class="bg-transparent border-0" onclick="fetchProfileBlocks('profileSecurity')">
                        Privacy and Security</button>
                </li>
                <li class="container-fluid border-bottom border-dark py-4">
                    <button type="button" class="bg-transparent border-0" onclick="fetchProfileBlocks('loginActivity')">
                        Login Activity</button>
                </li>
                <li class="container-fluid border-bottom border-dark py-4">
                    <button type="button" class="bg-transparent border-0" onclick="fetchProfileBlocks('help')">
                        Help
                    </button>
                </li>

            </ul>
            <span class="text-danger py-2 ">
                LOGO
            </span>
        </div>
        <div class="col-sm-10 d-flex flex-column" id="fetchBlockHere">
        </div>
    </section>
    <script>
        // function fetchProfileBlocks(myId) {
        //     var fetchBlockHere = document.getElementById('fetchBlockHere');
        //     var changePassword = document.createElement("div");
        //     changePassword.setAttribute("id", "changePasssword")
        //     changePassword.append("hello from chnageePassword")

        //     fetchBlockHere.innerHTML = myId;
        // }
    </script>

</body>

</html>