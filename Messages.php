<?php
include './config/conn.php';
include './config/session.php';
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message :<?php echo "user_to" ?></title>
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
    <style>
        section {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .messageCont {
            height: 80vh;
            width: 60vw;
        }

        .messageCont div {
            height: 100%;
            display: flex;
            flex-direction: column;

        }
    </style>
</head>
<?php include "./Components/Header.php"; ?>

<body>
    <section class="text-white">
        <div class="container messageCont bg-dark d-flex">
            <div class="col-sm-4 col-lg-2 border-2 border-end border-secondary">
                <div class="py-2 container-fluid">
                    <form action="" method="post">
                        <small class="text-center text-white">
                            Select Organization
                        </small>
                        <select name="selectUser" id="selectUser">
                            <?php
                            $sql = "SELECT usernameReg,emailReg FROM `user`";
                            $res = mysqli_query($conn, $sql);

                            if ($res) {
                                while ($row = $res->fetch_assoc()) {
                                    echo "<option value=" . $row['userNameReg'] . ">
                                            " . $row['userNameReg'] . "
                                    </option>";
                                }
                            }
                            ?>
                        </select>
                    </form>
                </div>
                fetch all user organization...you Added
            </div>
            <div class="col-sm-10 col-lg-2 bg-dark border-secondary d-flex flex-column justify-content-end align-items-center container-fluid">
                <div class="container-fluid user_to_info bg-danger" style="height:75vh;width:100%;">

                </div>
                <div class="container d-flex justify-content-center align-items-center" style="height:5vh">

                    <form action="" class="container-fluid" method="post">
                        <input type="text" place="Write Your Message Here" name="messageCreator" class="col-sm-10">
                        <input type="submit" value="Send" class="col-sm-1 text-dark" name="messageSender">
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>