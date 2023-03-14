<div class="resNavbar end-0 position-fixed bg-dark d-flex flex-column border-top border-info d-none" style="z-index:999999;height:93vh;width:50vw;margin-top:5.3rem" id="resNavbar">
    <div class="col-sm-12 d-flex justify-content-end align-items-center border-bottom border-secondary">
        <button class="btnCloseRespNavbar border-0 bg-light bg-opacity-50 text-white p-3" onclick="myclosefunction()">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <ul class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <li class="container-fluid py-3 border-bottom border-secondary bg-opacity-50 ">
            <a href="../../PhpCrudApplication/index.php
              " class="container-fluid text-decoration-none bg-danger">
                Home
            </a>
        </li>
        <li class="container-fluid py-3 border-bottom border-secondary bg-opacity-50 ">
            <a href="../../PhpCrudApplication/About.php" class="container-fluid text-decoration-none bg-danger">
                About
            </a>
        </li>
        <li class="container-fluid py-3 border-bottom border-secondary bg-opacity-50 ">
            <a href="../../PhpCrudApplication/Requests.php
              " class="container-fluid text-decoration-none bg-danger">
                Requests
            </a>
        </li>
    </ul>
</div>

<script>
    function myclosefunction() {
        var resNavbar = document.getElementById('resNavbar');
        var cond = resNavbar.classList.contains = 'd-none'
        if (cond) {
            resNavbar.classList.add('d-none');
        } else {
            resNavbar.classList.remove('d-none');
        }
    }
</script>