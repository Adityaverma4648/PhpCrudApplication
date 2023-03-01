<div class="resNavbar col-sm-2 end-0 position-fixed bg-dark d-flex flex-column border-top border-info d-none" style="z-index:999999;height:93vh;width:50vw;margin-top:4.0rem" id="resNavbar">
    <div class="col-sm-12 d-flex justify-content-end align-items-center border-bottom border-secondary">
        <button class="btnCloseRespNavbar border-0 bg-light bg-opacity-50 text-white p-3" onclick="myclosefunction()">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="col-sm-12 d-flex flex-column justify-content-center align-items-center">
        <div class="container-fluid py-3 border-bottom border-secondary bg-opacity-50 resNavbarCustLi">
            <a href="../../PhpCrudApplication/index.php
              " class="text-decoration-none bg-danger resNavbarLink">
                Home
            </a>
        </div>
        <div class="container-fluid py-3 border-bottom border-secondary bg-opacity-50 resNavbarCustLi">
            <a href="../../PhpCrudApplication/About.php" class="text-decoration-none bg-danger resNavbarLink">
                About
            </a>
        </div>
        <div class="container-fluid py-3 border-bottom border-secondary bg-opacity-50 resNavbarCustLi">
            <a href="../../PhpCrudApplication/Requests.php
              " class="text-decoration-none bg-danger resNavbarLink">
                Requests
            </a>
        </div>
    </div>
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