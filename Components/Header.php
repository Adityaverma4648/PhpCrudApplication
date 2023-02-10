<!-- <link rel="stylesheet" href="../styles/style.css"> -->
<header class="header The-Black-and-Red-5-hex" id="header">
    <!--  navbar  -->
    <nav class="d-flex justify-content-center align-items-center">
        <div class="logoContainer">
            LOGO
        </div>
        <ul style="height:40px">
            <li>
                <a href="../../PhpCrudApplication/index.php" class="text-decoration-none">
                    <i class="fa fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="text-decoration-none">
                    About
                </a>
            </li>
            <li>
                <a href="#" class="text-decoration-none">
                    AvailableBloodGroups
                    <i class="fa fa-caret-down"></i>

                </a>
            </li>
            <li>
                <a href="#" class="text-decoration-none">
                    <i class="fa fa-blood-drop"></i>
                    DonateBlood
                </a>
            </li>
            <li>
                <a href="#" class="text-decoration-none">
                    <i class="fa fa-phone"></i>
                    call
                </a>
            </li>
        </ul>
        <?php
        if (!$userName) {
            echo '<div>
            <a href="./Login.php">Login</a>
            <a href="./Register.php">Register</a>
            </div>';
        } else {
            echo '<a href="./config/logout.php" class="text-decoration-none text-white px-1">
            <i class="fa fa-sign-out"></i>LogOut
            </a>';
        }

        ?>
        <div class="toggleIconContainer">
            B
        </div>
    </nav>
    <!--  navbar ends -->
</header>