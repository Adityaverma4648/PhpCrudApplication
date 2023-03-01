<header class="container-fluid bg-dark header d-flex flex-column py-2 position-fixed top-0" style="z-index:999999" id="header">
  <!--  navbar  -->
  <nav class="NAVBAR container d-flex justify-content-center align-items-center">
    <div class="col-lg-1 col-sm-1 h3 text-white d-flex justify-content-center align-items-center">
      <a href="../../PhpCrudApplication//index.php" class="text-decoration-none text-white">
        LOGO
      </a>
    </div>
    <div class="col-sm-6 col-lg-6 d-flex flex-wrap justify-content-end align-items-center" style="height:100%" id="mynavbar">
      <li style="list-style: none;">
        <a class="text-decoration-none px-3 mx-2" href="../../PhpCrudApplication/index.php">
          Home
        </a>
      </li>
      <li style="list-style: none;">
        <a class="text-decoration-none px-3 mx-2" href="../../PhpCrudApplication/About.php">
          About
        </a>
      </li>
      <li style="list-style: none;">
        <a class="text-decoration-none px-3 mx-2" href="../../PhpCrudApplication//Requests.php">
          Requests
        </a>
      </li>
    </div>
    <?php
    if (isset($_SESSION['userName'])) {
      echo '<div class="col-lg-3 col-sm-3 d-flex justify-content-center align-items-center><div class="dropdown">
                      <button type="button" class="btn btn-outline-info dropdown-toggle rounded-0 " data-bs-toggle="dropdown">
                            ' . $_SESSION['userName'] . '
                       </button>
                       <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item text-info border-bottom border-info" href="Profile.php">
                            <i class="fa fa-user"></i>
                            Profile
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
            <div class="text-decoration-none text-white px-4 py-2 mx-1 bg-primary dropdown">
              <a href="./Login.php" class="text-decoration-none bg-transparent border-0 text-white">
                Login
              </a> 
            </div>
             <div class="text-decoration-none text-white px-4 py-2 mx-1 bg-danger dropdown">
              <a href="./Register.php" class="text-decoration-none bg-transparent border-0 text-white">
                Register
              </a> 
            </div>
          
            </div>';
    }

    ?>
    <div class="mx-2 d-flex justify-content-center align-items-center">
      <button class="bg-transparent text-white border-0 myToggleBtn" type="button" onclick="myResponsiveNavbar()">
        <i class="fa fa-bars fa-2x text-white"></i>
      </button>
    </div>
  </nav>
</header>

<script>
  function myResponsiveNavbar() {
    var mynavbar = document.getElementById('mynavbar');
    var resNavbar = document.getElementById('resNavbar');
    resNavbar.classList.toggle('d-none');
  }
</script>