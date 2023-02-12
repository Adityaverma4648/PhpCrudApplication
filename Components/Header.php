<!-- <link rel="stylesheet" href="../styles/style.css"> -->
<header class="header The-Black-and-Red-5-hex d-flex flex-column" id="header">
    <!--  navbar  -->
    <nav class="d-flex justify-content-center align-items-center">
        <div class="logoContainer">
            LOGO
        </div>
        <ul class="d-flex justify-content-center align-items-center" style="height:60px">
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
        if (isset($_SESSION['userName'])) {
            echo '<div class="text-white dropdown">
                      <button type="button" class="btn btn-primary dropdown-toggle rounded-0" data-bs-toggle="dropdown">
                            Account
                       </button>
                       <ul class="dropdown-menu bg-dark">
                          <li><a class="dropdown-item text-white" href="additionalData.php">
                            <i class="fa fa-edit"></i>
                            Add Info
                          </a></li>
                          <li><a class="dropdown-item text-white" href="#">
                           <i class="fa fa-bell"></i>
                           Notification
                          </a></li>
                          <li><a class="dropdown-item text-white" href="#">
                          <i class="fa fa-envelope"></i>
                          Mails
                          </a></li>
                        </ul>
                  </div>';
            echo '<div>
                   <a href="./logout.php" class="text-decoration-none text-white p-1">
                   <i class="fa fa-sign-out fa-1x p-2"></i>
                   </a>
                  </div>';
        } else {
            echo '<div>
            <a href="./Login.php">Login</a>
            <a href="./Register.php">Register</a>
            </div>';
        }

        ?>
        <div class="toggleIconContainer text-white">
            <i class="fa fa-menu "></i>
            B
        </div>
    </nav>
    <!--  navbar ends -->
</header>