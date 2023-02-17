<!-- <link rel="stylesheet" href="../styles/style.css"> -->
<header class="bg-dark header d-flex flex-column py-2" id="header">
    <!--  navbar  -->
    <nav class="container d-flex justify-content-center align-items-center">
        <div class="col-lg-1 col-sm-1 h3 text-white d-flex justify-content-center align-items-center">
            LOGO
        </div>
        <div class="col-lg-8 col-sm-8 d-flex justify-content-end align-items-center px-1">
            <li class="px-2 py-1 mx-1" style="list-style: none;">
                <a href="../../PhpCrudApplication/index.php" class=" bg-transparent text-decoration-none d-flex text-warning">
                    <i class="fa fa-home px-1 mb-2"></i>
                    Home
                </a>
            </li>
            <li class="px-2 py-1 mx-1" style="list-style: none;">
                <a href="../../PhpCrudApplication/index.php" class=" bg-transparent text-decoration-none d-flex text-warning">
                    <i class="fa fa-compass px-1 mb-2"></i>
                    About
                </a>
            </li>
            <li class="px-2 py-1 mx-1" style="list-style: none;">
                <a href="../../PhpCrudApplication/index.php" class=" bg-transparent text-decoration-none d-flex text-warning">
                    <i class="fa fa-home px-1 mb-2"></i>
                    MyRequests
                </a>
            </li>
            <li class="px-2 py-1 mx-1" style="list-style: none;">
                <a href="../../PhpCrudApplication/index.php" class=" bg-transparent text-decoration-none d-flex text-warning">
                    <i class="fa fa-bell px-1 mb-2"></i>
                    Notifications
                </a>
            </li>

        </div>
        <?php
        if (isset($_SESSION['userName'])) {
            $name = $_SESSION['userName'];
            $firstLetter = $name[0];
            echo '<div class="col-sm-2 d-flex justify-content-center align-items-center><div class="dropdown">
                      <button type="button" class="btn btn-info dropdown-toggle rounded-5" data-bs-toggle="dropdown">
                           ' . $firstLetter . '
                       </button>
                       <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item text-info border-bottom border-info" href="additionalData.php">
                            <i class="fa fa-user"></i>
                            Profile
                          </a></li>
                          <li><a class="dropdown-item text-info border-bottom border-info" href="additionalData.php">
                            <i class="fa fa-edit"></i>
                            Add Info
                          </a></li>
                          <li><a class="dropdown-item text-info border-bottom border-info" href="#">
                          <i class="fa fa-envelope"></i>
                          Mails
                          </a></li>
                          <li> 
                            <a href="./logout.php" class="dropdown-item text-decoration-none text-info">
                              <i class="fa fa-sign-out"></i>
                              Sign Out
                            </a>
                          </li>
                        </ul>
                  </div></div>';
        } else {
            echo '<div class="col-lg-2 col-sm-2 d-flex ">
            <a href="./Login.php" class="text-decoration-none text-white px-4 py-2 mx-1 bg-primary">Login</a>
            <a href="./Register.php" class="text-decoration-none text-white px-4 py-2 mx-1 bg-danger">Register</a>
            </div>';
        }

        ?>
        <div class="col-sm-1 toggleMenu text-success d-flex justify-content-center align-items-center">
            <i class="fa fa-bars fa-2x"></i>
        </div>
    </nav>
    <!--  navbar ends -->
</header>